#include<stdio.h>

int c = 1;
binary_semaphore mutex = 1;//保證s互斥
binary_semaphore sem = 1;//保證s同步

void wait_c(c){
	wait(mutex);
	c--;
	if(c<0){
		signal(mutex);
		wait(sem);
	}else{
		signal(mutex);
	}
}

void signal_c(c){
	wiat(mutex);
	c++;
	if(c>=0){
		signal(sem);
	}
	signal(mutex);
}
