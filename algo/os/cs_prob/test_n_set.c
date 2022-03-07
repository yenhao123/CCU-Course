#include<stdio.h>
int true = 1;
int false = 0;
int lock = 0;

void P0(){
	while(true){
		while(test_and_set(&lock));
		//cs
		//exit cs
		lock = false;
	}
}
