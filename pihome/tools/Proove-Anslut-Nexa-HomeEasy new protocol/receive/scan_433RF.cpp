#include <wiringPi.h>
#include <iostream>
#include <stdio.h>
#include <sys/time.h>
#include <time.h>
#include <stdlib.h>
#include <sched.h>
#include <sstream>

using namespace std;

// GPIO pin for receiver
int pin;

// Logging
void log(string a){
    // Uncomment to get verbose output
    cout << a << endl;
}

// Function long to string
string longToString(long mylong){
    string mystring;
    stringstream mystream;
    mystream << mylong;
    return mystream.str();
}

// Force realtime
void scheduler_realtime() {
    struct sched_param p;
    p.__sched_priority = sched_get_priority_max(SCHED_RR);
    if( sched_setscheduler( 0, SCHED_RR, &p ) == -1 ) {
    perror("Failed to switch to realtime scheduler.");
    }
}

// Force standard
void scheduler_standard() {
    struct sched_param p;
    p.__sched_priority = 0;
    if( sched_setscheduler( 0, SCHED_OTHER, &p ) == -1 ) {
    perror("Failed to switch to normal scheduler.");
    }
}

// Pulse counting
int pulseIn(int pin, int level, int timeout)
{
   struct timeval tn, t0, t1;
   long micros;
   gettimeofday(&t0, NULL);
   micros = 0;
   while (digitalRead(pin) != level)
   {
      gettimeofday(&tn, NULL);
      if (tn.tv_sec > t0.tv_sec) micros = 1000000L; else micros = 0;
      micros += (tn.tv_usec - t0.tv_usec);
      if (micros > timeout) return 0;
   }
   gettimeofday(&t1, NULL);
   while (digitalRead(pin) == level)
   {
      gettimeofday(&tn, NULL);
      if (tn.tv_sec > t0.tv_sec) micros = 1000000L; else micros = 0;
      micros = micros + (tn.tv_usec - t0.tv_usec);
      if (micros > timeout) return 0;
   }
   if (tn.tv_sec > t1.tv_sec) micros = 1000000L; else micros = 0;
   micros = micros + (tn.tv_usec - t1.tv_usec);
   return micros;
}

// Main program
int main (int argc, char** argv)
{
    scheduler_realtime();
    
    string command;
    pin = atoi(argv[1]);
    // Detect WiringPi library
    if(wiringPiSetup() == -1)
    {
        log("WiringPi not found. Exiting.");
        return -1;
    }else{
	log("WiringPi found. Continue.");
    }
    pinMode(pin, INPUT);
    log("GPIO pin configured.");
    log("Listening ...");
    
    for(;;)
    {
	int i = 0;
	unsigned long t = 0;
	int prevBit = 0;
	int bit = 0;
	
        unsigned long sender = 0;
        bool group=false;
        bool on =false;
        unsigned long recipient = 0;
	
	t = pulseIn(pin, LOW, 1000000);
	log(longToString(t));
	while((t < 2400 || t > 2800)){
	    t = pulseIn(pin, LOW,1000000);
	    //if (t>80) {
	    //	log(longToString(t));
	    //}
	}
	log("Long latch deteced.");
	while(i < 64)
	{
	    t = pulseIn(pin, LOW, 1000000);
	    cout << "t = " << t << endl;
	    
            if(t > 180 && t < 420)
	    {
		bit = 0;
	    }
	    
            else if(t > 1000 && t < 1480)
	    {
		bit = 1;
	    }
	    else
	    {
		i = 0;
		break;
	    }
	    
	    
	    if(i % 2 == 1)
	    {
		if((prevBit ^ bit) == 0)
		{
		    i = 0;
		    break;
		}

		if(i < 53)
		{
		    sender <<= 1;
		    sender |= prevBit;
		}      
		else if(i == 53)
		{
		    group = prevBit;
		}
		else if(i == 55)
		{
		    on = prevBit;
		}
	    
		else
		{
		    recipient <<= 1;
		    recipient |= prevBit;
		}
	    }

	    prevBit = bit;
	    ++i;
    }
    
    if(i>0){
    
	log("------------------------------");
	log("Signal detected...");
	cout << "sender " << sender << endl;
	
	command.append(longToString(sender));
	if(group)
	{
	    command.append(" on");
	    cout << "group command" << endl;
	}
	else
	{
	    command.append(" off");
	    cout << "no group" << endl;
	}

	if(on)
	{
	    command.append(" on");
	    cout << "on" << endl;
	}
	else
	{
	    command.append(" off");
	    cout << "off" << endl;
	}
	command.append(" "+longToString(recipient));
	cout << "recipient " << recipient << endl;
    }else{
	log("Nothing found...");
    }
    
	delay(3000);
    }
    
    scheduler_standard();
}