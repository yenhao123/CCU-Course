#include<stdio.h>
int true = 1;
int false = 0;
int lock = 0;

void P0(){
	while(true){
		while(compare_and_swap(&lock,0,1));
		//cs
		//exit cs
		lock = false;
	}	
}
