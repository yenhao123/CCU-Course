#include<stdio.h>
int main(){
	int a = 5;
	int* b = &a;
	a = 3;
	printf("%d",*b);
}
