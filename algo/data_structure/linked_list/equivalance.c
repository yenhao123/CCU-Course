#include<stdio.h>
#include<stdlib.h>
#define MAX_SIZE 24
#define false 0
#define true 1

typedef struct Node{
	int data;
	struct Node* link;
}node;

int main(){
	node* seq[MAX_SIZE];
	int record[MAX_SIZE];
	int number;
	int i=-1,j=-1;
	//init
	printf("equivalcance number:");
	scanf("%d",&number);
	for(int i=0;i<MAX_SIZE;i++){
		seq[i] = NULL;
		record[i] = true;
	}

	//phase 1
	printf("enter a pair of equivalance:(-1-1 will quit)");
	scanf("%d %d",&i,&j);
	while(i>=0){
		printf("%d %d",i,j);
		node* nnode1 = malloc(sizeof(node*));
		nnode1->data = j;nnode1->link = seq[i];seq[i] = nnode1;
		if(i!=j){
			node* nnode2 = malloc(sizeof(node*));
			nnode2->data = i;nnode2->link = seq[j];seq[j] = nnode2;
		}
		printf("enter a pair of equivalance:(-1-1 will quit)");
		scanf("%d %d",&i,&j);
	}
/*
	for(i=0;i<number;i++){
		node* cur = seq[i];
		while(cur){
			printf("%d relation:%d\n",i,cur->data);
			cur = cur->link;
		}
	}
*/
	printf("\n\n");
	//phase 2	
	for(i=0;i<number;i++){
		if(!record[i])continue;
		printf("input a new class:%d ",i);
		record[i] = false;
		node* cur = seq[i];
		node* top = NULL;
		node* temp = NULL;
		while(1){
			while(cur){
				if(record[cur->data]){	
					printf("%d ",cur->data);	
					record[cur->data] = false;
					temp = cur->link;
					cur->link = top;
					top = cur;
					cur = temp;
				}else{
					cur = cur->link;
				}
			}
			if(!top)break;
			cur = seq[top->data];top = top->link;
		
		}
	}
}
