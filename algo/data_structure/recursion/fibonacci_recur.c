#include<stdio.h>

int fib(int n){
	if(n==0)return 0;
	else if(n==1)return 1;
	else{
		return fib(n-1)+fib(n-2);
	}
}

int main(){
	int key;
    	scanf("%d",&key);
	int sum = fib(key);
	printf("%d",sum);
}
