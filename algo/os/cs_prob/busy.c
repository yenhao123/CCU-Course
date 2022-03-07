#include<stdio.h>

typedef struct Semaphore{
	atomic_int value;
}semaphore;

void wait(semaphore s){
	while(s.value<=0);
	s.value -= 1;
}

void signal(semaphore s){
	s.value += 1;
}
