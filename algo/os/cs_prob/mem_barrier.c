#include <stdio.h>
int false = 0;
int true = 1;
int turn = 0;
int flag[2] = {0};

int p1(){
	while(1){
		flag[0] = true;
		memory_barrier();
		turn = 1;
		while(flag[1]==true && turn==1){
			//busy wait
			printf("P0 busy wait\n");
		};
		//CS
		printf("P0 enter critical section\n");
		//end of CS
		flag[0] = false;
		printf("P0 exit critical section\n");
	}
}

int p2(){
	while(1){
		flag[1] = true;
		memory_barrier();
		turn = 0;
		while(flag[0]==true && turn==0){
			//busy wait
			printf("P1 busy wait\n");
		};
		//CS
		printf("P1 enter critical section\n");
		//end of CS
		flag[1] = false;
		printf("P1 exit critical section\n");
	}
}
