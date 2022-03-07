#include "header.h"

void sort(){
	for(int i=1;i<size;i++){
		int j,temp = list[i];
		for(j=i;temp<list[j-1]&&j>0;j--){
			list[j] = list[j-1];
		}
		list[j] = temp;
	}
}

int main(){
	input();
	sort();
	output();
}
