#include<stdio.h>
semaphore mutex = 1;//for mutual exclusion
semaphore empty = n;
semaphore full = 0;

void producer(){
	produce an item to variable p;
	wait(full);
	wait(mutex);
	add p to buffer
	signal(mutex);
	signal(full);
}

void consumer(){
	wait(empty);
	wait(mutex);
	retrieve an item from buffer
	signal(mutex);
	signal(full);
}
