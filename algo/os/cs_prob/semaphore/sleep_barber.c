#include<stdio.h>
#define true 1
#define false 0

semaphore customer = 0;//barber sleep case for no customers
semaphore barber = 0;//custormer sleep case for busy barber
int waiting = 0;//wating chair上的客人數
semaphore waiting_mtx = 1;//對waiting最互管理

void barber(){
	while(true){
		wait(customer);
		wait(waiting);
		waiting -= 1;
		signal(barber);
		signal(waiting);
		//理髮
	}
}

void cus(){
	wait(waiting_mtx);
	if(waiting < n){
		waiting += 1;
		signal(wating_mtx);
		signal(custormer);
		wait(barber);
		//被理髮
	}else{
		signal(waiting_mtx);
	}
}
