#include<stdio.h>
#include<stdlib.h>
#define True 1
#define False 0

/*
 所有node插入在head之右孩子,head之左孩子用來讓最左leaf指向
 */ 

typedef struct Node{
	int data;
	int leftThread;
	int rightThread;
	struct Node* leftChild;
	struct Node* rightChild;
}node;

node* createHead(){
	node* first = malloc(sizeof(node));
	first->leftThread = True;
	first->leftChild = NULL;
	first->rightThread = False;
	first->rightChild = NULL;
	return first;
}

node* addNode(node* first,int value){
	node* newnode = malloc(sizeof(node));
	newnode->data = value;

	node* cur = first->rightChild;
	if(cur == NULL){
		first->rightChild = newnode;
		newnode->leftThread = True;
		newnode->leftChild = first;
		newnode->rightThread = True;
		newnode->rightChild = first;
		return first;
	}else{
		//找插入地方 & 插入
		while(cur!=NULL){
			//往左node or 右node
			if(cur->data > value){
				if(!cur->leftThread){
					cur = cur->leftChild;
				}else{
					newnode->leftThread = True;
					newnode->leftChild = cur->leftChild;
					newnode->rightThread = True;
					newnode->rightChild = cur;
					cur->leftThread = False;
					cur->leftChild = newnode;
					return first;
				}
			}else{
				if(!cur->rightThread){
					cur = cur->rightChild;
				}else{
					newnode->leftThread = True;
					newnode->leftChild = cur;
					newnode->rightThread = True;
					newnode->rightChild = cur->rightChild;
					cur->rightThread = False;
					cur->rightChild = newnode;
					return first;
				}
			}
		}
		
	}
}

node* leftmost(node* cur){
	if(cur->rightThread == True){
		return cur->rightChild;
	}else{
		cur = cur->rightChild;
		while(cur->leftThread!=True){
			cur = cur->leftChild;
		}
		return cur;
	}
}

void inorderTBT(node* first){
	node* cur = leftmost(first);
	while(cur!=first){
		printf("%d ",cur->data);
		cur = leftmost(cur);
	}
}

int main(){
	//創立head
	node* first = createHead();
	//加入data
	int input;
	while(1){
		scanf("%d",&input);
		if(input == -1)break;
		first = addNode(first,input);
	}
	//印出
	inorderTBT(first);
}
