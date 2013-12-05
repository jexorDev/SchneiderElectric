#include <cmath>
#include <iostream>
using namespace std;
#define WINDOWS

// if using Windows VS
#ifdef WINDOWS 
#include <Windows.h>
#include <gl/GL.h>
#include <gl/GLU.h>
#include <gl/glut.h>
#endif

// if using Mac OS X
#ifdef MAC
#include <OpenGL/gl.h>      
#include <OpenGL/glu.h>     
#include <GLUT/glut.h>      
#endif

// if using Linux
#ifdef LINUX
#include <GL/glut.h>
#endif 

#define Width 500
#define Height 500
#define PI 3.1415f

void Draw();
void Mouse(int, int, int, int);
void Timer(int);
void MyInit();
void Circle();

int oldX, oldY, newX, newY, currX, currY;
bool moveMode=false;

int main(int argc, char** argv)
{
	/* Window title is name of program (arg[0]) */
	
	glutInit(&argc,argv);  // extracts command line options intended for the GLUT library. 
	// Typically, no command line arguments is supplied
	glutInitDisplayMode (GLUT_DOUBLE | GLUT_RGB);  // set to use single frame buffer, RGB color
	
	glutInitWindowSize(500,500); // define the dimension of the window
	glutInitWindowPosition(0,0);  // define the position of the window: upper left corner of the screen
	glutCreateWindow("Gliding circle");   // define the name of the window
	
	glutDisplayFunc(Draw); // Display call back function is "Draw"
	glutMouseFunc(Mouse);
	glutTimerFunc(30, Timer, 100);
	MyInit();   // set window's initial settings : background, transformation matrix, clipping window, etc.
	
	glutMainLoop();  // enter the program main loop waiting for events to occur 

	return 0;
}

void Circle()
{
	GLfloat  radius=2.0;
	GLint	 numOfPoints = 50;
	// draw the solid circle 
	glBegin(GL_TRIANGLE_FAN);
	    glVertex2f(0, 0);  // center point of the fan
	    for (GLint i=0; i<numOfPoints; i++)
	    {
		glVertex2f(radius*cos(i*2*PI/numOfPoints), radius*sin(i*2*PI/numOfPoints));
		glVertex2f(radius*cos((i+1)*2*PI/numOfPoints), radius*sin((i+1)*2*PI/numOfPoints));
	    }
	glEnd();
}

// This function is responsible for drawing things in the window
void Draw()
{
	glClear(GL_COLOR_BUFFER_BIT);
	glPushMatrix();
	glTranslated(currX, currY, 0);
	glScalef(10,10,0);
	Circle();
	glPopMatrix();
	//oldX=newX;	//update coordinates
	//oldY=newY;
	// flush GL buffers, so the things drawn above is reflected on screen immediately 
	glutSwapBuffers();
}

void MyInit()
{
	// set clear color to blue 
	glClearColor (1.0, 1.0, 0.0, 1.0);
	
	// set fill color to yellow 
	glColor3f(0.0, 0.0, 1.0);
	
	/* set up standard orthogonal view with clipping 
	 box as cube of side 2 centered at origin 
	 This is default view and these statement could be removed */
	glMatrixMode (GL_PROJECTION);
	glLoadIdentity ();
	
	// set up the clipping window, left(-1.0), right(1.0), bottom(-1.0), top(1.0), front(-1.0) and back(1.0)
	gluOrtho2D(0, 500, 0, 500);
	glMatrixMode(GL_MODELVIEW);
	glLoadIdentity();

	/*glPushMatrix();
	glTranslated(450, 50, 0);
	glScalef(10,10,0);
	Circle();
	glPopMatrix();*/

	currX=450;
	currY=50;
	oldX=450;
	oldY=50;
}

void Mouse(int button, int state, int x, int y)
{
	if(button==GLUT_LEFT_BUTTON && state==GLUT_DOWN)
	{
		newX=x;
		newY=Height-y;
		cout<<"NEW COORDINATES"<<newX<<" "<<newY<<endl;
		moveMode=true;
		cout<<"MOVE MODE ENTERED"<<endl;
	}
}

void Timer(int t)
{
	//cout<<t;
	if(moveMode==true && t>=0)
	{

		currX=((oldX)+float((100-t)/100.0)*(newX-oldX));
		currY=((oldY)+float((100-t)/100.0)*(newY-oldY));

			//cout<<oldX<<"+"<<(100-t)/100<<"*("<<newX-oldX<<")="<<currX<<endl;
		//cout<<oldX<<" "<<oldY<<endl;

		glutPostRedisplay();
		glutTimerFunc(30, Timer, t-1);
	}
	else if(t<0)
	{
		moveMode=false;
		glutTimerFunc(30, Timer, 100);
		cout<<"MOVE MODE EXITED"<<endl;
		oldX=newX;
		oldY=newY;
	}
	else
		glutTimerFunc(30, Timer, 100);
}