#include<stdio.h>
#include<stdlib.h>

/*
 * Goal : 建一條linked list,數列為由小到大,e.g input:(4,6,2,3,8) output:(2,3,4,6,8) 
 * 
 * Objects:
 * 1. struct Node
 * Functions:
 * 1. add()
 * 2. delete()
*/

struct Node{
	int data;
	struct Node* next;
};

typedef struct Node node;

node* add(node* first,int data){

	if(first==NULL){
		node* nNode = malloc(sizeof(node));
		nNode->data = data;
		nNode->next = NULL;
		first = nNode;
		return first;
	}else{
		node* cur = first;
		node *last = NULL;
		while(cur!=NULL){
			if(data<=cur->data){
				//add item
				node* nNode = malloc(sizeof(node));
				nNode->data = data;
				nNode->next = cur;
				//前端add
				if(last==NULL)
					first = nNode;
				else
					last->next = nNode;
				return first;
			}else{
				//尾端add
				if(cur->next==NULL){
					node* nNode = malloc(sizeof(node));
					nNode->data = data;
					nNode->next = NULL;
					cur->next = nNode;
					return first;
				}
				last = cur;
				cur = cur->next;
			}
		}
	}
}

node* delete(node* first,int data){
	node* cur = first;
	node* last = NULL;
	while(cur!=NULL){
		if(cur->data == data){
			//前端delete
			if(last==NULL){
				first = cur->next;
			}else{
				last->next = cur->next;
			}
			free(cur);
			return first;
		}
		last = cur;
		cur = cur->next;
	}
	printf("data:%d not found",data);
	return first;
}

void output(node* first){
	node* cur = first;
	while(cur!=NULL){
		printf("%d ",cur->data);
		cur = cur->next;
	}
}

int main(){
	node* first = malloc(sizeof(node));
	//create
	first = NULL;
	//add example: (16,17) test 尾端add ,(16,15) 前端add,(16,20,18) 一般add
	first = add(first,16);
	first = add(first,20);
	first = add(first,18);
	//delete example: (16) test前端,(20) 一般add
	first = delete(first,16);
	output(first);
}
