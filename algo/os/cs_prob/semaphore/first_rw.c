#include<stdio.h>
semaphore mutex = 1;//防止其他reader進入
semaphore wrt = 1;//防止writer進入
int read_cnt = 0;

void writer(){
	wait(wrt);
	start writing
	signal(wrt);
}

void reader(){
	wait(mutex);//阻擋其他reader進入
	read_cnt+=1;
	if(read_cnt == 1)
		wait(wrt);//等待writer or 阻擋writer進入
	signal(mutex);
	start reading
	wait(mutex);
	read_cnt-=1;
	if(read_cnt == 0)
		signal(wrt);
	signal(mutex);
}
