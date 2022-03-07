#include "header.h"

void sort(){
	for(int i=0;i<size;i++){
		int min=i;
		for(int j=i;j<size;j++){
			if(list[j]<list[min]){
				min = j;
			}
		}
		swap(i,min);
	}
}

int main(){
	input();
	sort();	
	output();
}
