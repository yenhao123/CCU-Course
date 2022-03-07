#include<stdio.h>
#include<stdlib.h>
typedef struct Node{
	int data;
	struct Node* link;
}node;

node* insert(node* first,int data){
	if(!first){
		first = malloc(sizeof(node*));
		first->data = data;
		first->link = NULL;
		return first;
	}else{
		node* cur = first;
		node* nnode = malloc(sizeof(node*));
		while(cur->link){
			cur = cur->link;
		}
		nnode->data = data;
		nnode->link = NULL;
		cur->link = nnode;
		return first;
	}
}

void output(node* first){
	node* cur = first;
	while(cur){
		printf("%d ",cur->data);
		cur = cur->link;
	}
	printf("\n");
}

node *invert(node* first){
	node* nnode_cur = NULL;
	node* last = NULL;
	node* cur = first;
	while(cur){
		last = nnode_cur;
		nnode_cur = cur;
		cur = cur->link;
		nnode_cur->link = last;
	}
	return nnode_cur;
}

int main(){
	node* first = NULL;
	first = insert(first,10);
	first = insert(first,20);
	first = insert(first,30);
	first = insert(first,40);
	first = insert(first,50);
	first = insert(first,60);
	output(first);

	node* new_first = invert(first);
	output(new_first);
}
