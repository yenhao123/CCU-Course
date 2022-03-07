#include<stdio.h>

//法一,只允許四個哲學家上餐桌
semaphore chopstick[5] = {1};
semaphore no = 4;//counting semaphore

void dining_1(int i){
	wait(no);
	wait(choptick[i]);
	wait(chopstick[i+1]%5);
	//eating
	signal(chopstick[i+1]%5);
	signal(chopstic[i]);
	signal(no);
}
