#include "header.h"

void sort(){
	for(int i=0;i<size-1;i++){
		for(int j=i;j<size;j++){
			if(list[i]>list[j]){
				swap(i,j);
			}
		}	
	}
}

int main(){
	input();
	sort();
	output();
}
