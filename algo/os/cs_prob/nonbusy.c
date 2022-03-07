
#include<stdio.h>

typedef struct Semaphore{
	atomic_int value;
	queue q;
}semaphore;

void wait(semaphore s){
	s.value -= 1;
	if(s.value<0){
		add s to s.queue;
		sleep();
	}
}

void signal(semaphore s){
	s.value += 1;
	if(s.value>=0){
		wakeup();
	}
}
