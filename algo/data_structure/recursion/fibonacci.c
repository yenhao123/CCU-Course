#include<stdio.h>

int fib(int n){
	if(n==0)return 0;
	else if(n==1)return 1;
	else{
		int pre_prev=0,prev=1,cur=0;
		for(int i=2;i<=n;i++){
			cur = pre_prev + prev;
			pre_prev = prev;
			prev = cur;
		}
		return cur;
	}
}

int main(){
	int key;
    	scanf("%d",&key);
	int sum = fib(key);
	printf("%d",sum);
}
