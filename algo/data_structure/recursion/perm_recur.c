#include<stdio.h>
/*
 permutation
 steps
 1. 決定一字母，放在指定位置
 2. 挪下一個位置
 3. 直到位置到尾端，則停止
 */

void swap(char *a,char *b){
	char temp = *a;
	*a = *b;
	*b = temp;
}

void perm(char list[],int s,int e){

	if(s == e){
		//位置尾端
		for(int i=0;i<e;i++){
			printf("%c ",list[i]);
		}
		printf("\n");
	}else{
		for(int i=s;i<e;i++){
			//決定一個字母，放在指定位置
		    	swap(&list[i],&list[s]);
		    	//往下一個位置
		    	perm(list,s+1,e);
		    	//還原原list
		    	swap(&list[i],&list[s]);
		}
	    }
}

int main(){
	char list[4] = {'a','b','c','d'};
	perm(list,0,4);
}
