#include<stdio.h>
#include<stdlib.h>

/*
insert(x) steps
1. 尋找x需放入的node
2. x放入此node
3. 判斷此node是否overflow
	a. 無,則break
	b. 有,則分裂(split)處理,且在針對父親處理

split steps
1. 將node分成兩段node1、node2,node1放入node中1~(m/2-1)的item,node2放入node中(m/2+1~m)的item
2. 將第m/2的item放入父點

delete(x) steps
1. 尋找x跟放入的node
2. delete x
3. 判斷此node是否underflow(count < m/2-1)
	a. 無,則break
	b. 有,則進行underflow處理


underflow steps
1. rotation
2. 若無法rotation,則combine

rotation
1. 判斷右兄弟有足夠node
	a. 有,將右兄弟之最小值,放至parent,在將parent值,給原node
	b. 無,goto 2
2. 判斷右兄弟無足夠node
	a. 有,將左兄弟之最大值,放至parent,在將parent值,給原node
	b. 無,combine

combine
1. 將parent與兄弟兩個child合併在一起

*/
struct Node;
int m = 3;

typedef struct Item{
	int key;
	struct Item* next;
	struct Node* child0;
	struct Node* child1;
	struct Item* parent;
}item;

typedef struct Node{
	int count;
	item* first;
}node;


node split(node* splitNode){
	node* node1 = malloc(sizeof(node));
	node1->count = splitNode->count/2;
	node* node2 = malloc(sizeof(node));
	if(splitNode->count%2==0)node2->count = splitNode->count;
	else node2->count = splitNode->count - 1;
	item* cur1;
	item* cur2;
	item* mid;
	item* cur = splitNode->first;
	int cur_num = 0;
	while(cur!=NULL){
		if(cur_num<splitNode->count/2){
			if(cur_num==0){
				node1->first = cur;
				cur1 = node1->first;
				cur = cur->next;
				cur_num ++;
				continue;
			}
			cur1->next = cur;
		}else if(cur_num>splitNode->count/2){
			if(cur_num==splitNode->count/2){
				node1->first = cur;
				cur1 = node1->first;
				cur = cur->next;
				cur_num ++;
				continue;
				
			}
			cur2->next = cur;
		}else{
			mid = cur;
			cur = cur->next;
			cur_num ++;
			continue;	
		}
		cur = cur->next;
		cur_num ++;
	}
	




}
