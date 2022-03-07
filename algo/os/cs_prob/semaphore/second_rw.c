#include<stdio.h>
int readcnt = 0;
semaphore mutex_r = 1;//對readcnt互斥存取
semaphore wrt = 1;//對w/w與r/w做互斥存取
int wrtcnt = 0;
semaphore mutext_w = 1;//對wrtcnt互斥存取
semaphore readTry = 1;//是否可讀，當writer在寫時，會不讓reader進入(let readTry=0)
semaphore low_speed_r = 1;//降低read速度

void reader(){
	wait(low_speed_r);
	wait(readTry);
	wait(mutex_r);
	readcnt+=1;
	if(readcnt == 1)wait(wrt);
	signal(mutex_r);
	signal(readTry);
	signal(low_speed_r);
	//START READING
	wait(mutex_r);
	readcnt-=1;
	if(readcnt == 0)signal(wrt);
	signal(mutext_r);
}

void writer(){
	wait(mutex_w);
	wrtcnt+=1;
	if(wrtcnt == 1)wait(readTry);
	signal(mutex_w);
	wait(wrt);
	//START WRITING
	wait(mutex_w);
	wrtcnt+=1;
	if(wrtcnt == 0)signal(readTry);
	signal(wrt);
	signal(mutex_w);
}
