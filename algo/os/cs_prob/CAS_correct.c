#include<stdio.h>
int true = 1;
int false = 0;
int lock = 0;

/*
ADT
waiting[i] : true,等待進入CS;false,不等待進入CS
lock : 1,有人進入CS;0,無人進入CS
key : CAS回傳值

step
1. 等待進入CS且回傳值設true
2. 不斷check lock是否free(0)
3. 箬free,設成不等待
4. CS
5. 交給下一個人使用CS
6. 若繞完一圈，無人等待，則lock free;否則，交給下一人
*/

void Pi(){
	while(true){
		waiting[i] = true;
		key = true;
		while(waiting[i] && key){
			//key = test_and_set(&lock);
			key = compare_and_swap(&lock,0,1);
		};
		waiting[i] = false;
		//cs
		//exit cs
		int j = (i+1)/n;
		while(j!=i && waiting[j]!=true){
			j = (j+1)/n;
		}
		if(j==i){
			lock = 0;
		}else{
			waiting[j] = false;
		}
	}	
}
