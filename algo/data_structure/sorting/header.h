#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int list[1024];
int size = 0;

void input(){
	char line[1024];	
	char delim[2] = " ";
	char* token;
	
	FILE* fp = fopen("input","r");
	fgets(line,1024,fp);
	line[strlen(line)-1] = '\0';
	token = strtok(line,delim);
	while(token != NULL){
		//printf("%s ",token);
		list[size++] = atoi(token);
		token = strtok(NULL,delim);
	}
}

void output(){
	for(int i=0;i<size;i++){
		printf("%d ",list[i]);
	}
}

void swap(int i,int j){
	int temp = list[i];
	list[i] = list[j];
	list[j] = temp;
}
