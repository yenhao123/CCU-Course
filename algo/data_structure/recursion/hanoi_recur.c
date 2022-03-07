#include<stdio.h>
int hanoi(int n,char src,char point,char dst){
	if(n==1){
		printf("move disk from %c to %c\n",src,dst);
	}else{
		hanoi(n-1,src,dst,point);
		hanoi(1,src,point,dst);
		hanoi(n-1,point,src,dst);
	}
}
int main(){
	int num;
	scanf("%d",&num);
	hanoi(num,'A','B','C');
}
