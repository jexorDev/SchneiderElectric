--1. Print part numbers and names for all parts.
SELECT Pno, Pname FROM PART;
--2. Print part numbers for parts that either blue or red in color.
SELECT Pno FROM PART WHERE COLOR IN ('Red', 'Blue');
--3. Print all shipment information where the quantity is in the range 300 to 750 inclusive.
SELECT * FROM SHIPMENT WHERE Qty BETWEEN 300 AND 750;
--4. Print supplier names for suppliers who ship P2 or P4.
SELECT Sname FROM SUPPLIER JOIN SHIPMENT ON SUPPLIER.Sno=SHIPMENT.Sno WHERE Pno IN (1, 2);
--5. Print supplier numbers for suppliers who ship at least all those parts shipped by supplier S3.  Do not include S3 in the answer and do not "count".P
SELECT Sno FROM SUPPLIER WHERE NOT EXISTS(
	SELECT Pno FROM SHIPMENT WHERE Sno=3
	EXCEPT
	SELECT Pno FROM SHIPMENT WHERE Sno=SUPPLIER.Sno AND Sno<>3
	);
--6. Print supplier numbers for suppliers who ship at least one type of red part.
SELECT DISTINCT Sno FROM SHIPMENT JOIN PART ON SHIPMENT.Pno=PART.Pno WHERE PART.Color='Red';
--7. Print supplier numbers for suppliers who do not ship any red parts.
SELECT Sno FROM SUPPLIER WHERE NOT EXISTS(
	SELECT Color FROM SHIPMENT 
	JOIN PART ON SHIPMENT.Pno=PART.Pno where SUPPLIER.Sno=SHIPMENT.Sno AND Color='Red'
);
--NULL problem in  querY
--8. Print supplier numbers for suppliers who ship ONLY red parts.
SELECT Sno FROM SUPPLIER WHERE NOT EXISTS(
	SELECT Color FROM SHIPMENT 
	JOIN PART ON SHIPMENT.Pno=PART.Pno 
	WHERE SUPPLIER.Sno=SHIPMENT.Sno
	GROUP BY Color
	HAVING NOT Color='Red'
);
--9. Print supplier names for suppliers who do not currently ship any parts.
SELECT SUPPLIER.Sno FROM SUPPLIER WHERE SUPPLIER.Sno NOT IN (SELECT SHIPMENT.Sno FROM SHIPMENT);
--10. Print supplier names for suppliers who ship at least one part that is also shipped by supplier S2.  Do not include S2 in the answer.
SELECT Sno FROM SUPPLIER WHERE EXISTS(
	SELECT Pno FROM SHIPMENT WHERE Sno=2
	INTERSECT
	SELECT Pno FROM SHIPMENT WHERE SHIPMENT.Sno=SUPPLIER.Sno
) AND Sno<>2;
--11. Print the supplier information by cities in alphabetic order.
SELECT * FROM SUPPLIER ORDER BY City;
--12. Print the shipment information by price in descending numeric order.
SELECT Qty, Price, Sname, Status, SUPPLIER.City, Pname, Color, Weight, PART.City FROM SHIPMENT
JOIN SUPPLIER ON SHIPMENT.Sno=SUPPLIER.Sno 
JOIN PART ON SHIPMENT.Pno=PART.Pno
ORDER BY Price DESC;
--13. Print supplier numbers for suppliers who are located in the same city as supplier S1. Do not include S1 in the answer.
SELECT Sno FROM SUPPLIER WHERE City=(SELECT City FROM SUPPLIER WHERE Sno=1) AND Sno<>1
--14. Print part numbers for all parts shipped by more than one supplier.  You may use a count on this one.
SELECT Pno FROM SHIPMENT GROUP BY Pno HAVING COUNT(SHIPMENT.Pno)>1 ;
--15. Print supplier numbers for suppliers with status value less than the current average status value of all suppliers.
SELECT Status, Sno FROM SUPPLIER AS S1
GROUP BY Status, Sno HAVING Status<(SELECT AVG(Status) FROM SUPPLIER);
--16. Print the total number of suppliers (regardless of whether they are currently shipping any parts)..
SELECT COUNT(Sno) FROM SUPPLIER;
--17. Print the total number of suppliers currently shipping parts.
SELECT COUNT(DISTINCT Sno) FROM SHIPMENT;
--18. Print all the shipment information for the shipment(s) with the highest unit cost.
SELECT Sname, SUPPLIER.City, S.Qty, S.Price, Pname, Color, Weight, PART.City FROM SHIPMENT AS S
JOIN SUPPLIER ON SUPPLIER.Sno=S.Sno
JOIN PART ON PART.Pno=S.Pno
GROUP BY Sname, SUPPLIER.City, S.Qty, S.Price, Pname, Color, Weight, PART.City HAVING Price=(SELECT MAX(Price) FROM SHIPMENT);
--19. Print all the shipment information for the shipment(s) with the highest total cost.

--20. Print all the supplier information for the supplier(s) making the most money.  The supplier money is determined by the sum of all shipment cost.  Each shipment cost is found by the number of units being shipped times the price per unit.
SELECT TOP 1 INFO.Sno,  Sname, Status, City, SUM(INFO.Total)TotalSum from (SELECT Sno, (Qty*Price) AS Total  FROM SHIPMENT)INFO 
JOIN SUPPLIER ON INFO.Sno=SUPPLIER.Sno
GROUP BY INFO.Sno, Sname, Status, City ORDER BY TotalSum DESC;
--21. For each supplier, print the supplier number and how many different parts shipped.  For example, S1 6; S2 2, ...
SELECT Sno, (SELECT COUNT(Pno) FROM SHIPMENT WHERE SUPPLIER.Sno=SHIPMENT.Sno) FROM SUPPLIER 