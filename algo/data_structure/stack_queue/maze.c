#include <stdio.h>
#include <stdlib.h>
struct Element{
	int row;
	int col;
	int parentRow;
	int parentCol;
};

typedef struct Element element;


/*maze info
maze:迷宮
endRow,endCol:終點
mark:紀錄已走過的點
stack:儲存哪些element可以走

steps
1. stack pop出一point
2. 判別point的neighbor point(e.g上下左右)兩件事
	a. 是不是終點，是停下
	b. 有無被阻擋,無則加入stack中
*/
int maze[4][5] = {
	{1,0,1,1,0},
	{1,1,1,0,1},
	{0,1,0,1,0},
	{1,1,1,1,1}
};
int endRow = 3,endCol = 4;

int mark[4][5] = {0};

element stack[500];
int top = 0;
int maxStackSize = 500;

int isempty(){
	if(top==0)return 1;
	return 0;
}

int isfull(){
	if(top==maxStackSize)return 1;
	return 0;
}

void push(element e){
	if(isfull()){
		printf("stack is full");
		exit(0);
	}
	stack[top++] = e;
}

element pop(){
	if(isempty()){
		printf("stack is empty!Could not delete any elements");
		exit(0);
	}
	return stack[--top];
}

/*
cur:顯示最終的path
*/
element cur[500];
int curSize = 0;

void checkCur(element e){
	if(curSize == 500){
		printf("over cur array size");
		exit(0);
	}else	cur[curSize++] = e;
}

int find_maze_path(){
	int nextrow,nextcol;
	element s;
	s.row = 0;
	s.col = 0;
	s.parentRow = -1;
	s.parentCol = -1;
	push(s);
	while(!isempty()){
		element e = pop();
		//printf("\(%d,%d\) -> ",e.row,e.col);
		checkCur(e);
		for(int i=0;i<4;i++){
			//設定鄰居(上下左右)
			if(i==0){
				nextrow = e.row-1;
				nextcol = e.col;
			}else if(i==1){
				nextrow = e.row+1;
				nextcol = e.col;
			}else if(i==2){
				nextrow = e.row;
				nextcol = e.col-1;
			}else if(i==3){
				nextrow = e.row;
				nextcol = e.col+1;
			}
			
			element newe;
			newe.row = nextrow;
			newe.col = nextcol;
			newe.parentRow = e.row;	
			newe.parentCol = e.col;
			//check
			if(maze[nextrow][nextcol]==1 && nextrow == endRow && nextcol == endCol){
				checkCur(newe);
				return 1;
			}
			else if(maze[nextrow][nextcol]==1 && mark[nextrow][nextcol]==0){
				mark[nextrow][nextcol] = 1;
				push(newe);
			}
		}
	}
	return 0;
}

int main(){
	int res = find_maze_path();
	
	if(res == 1){
		printf("Find it!\n");
		element e = cur[curSize-1];
		while(e.row != 0 && e.col != 0){
			printf("\(%d,%d) <- ",e.row,e.col);
			for(int i=0;i<curSize;i++){
				if(cur[i].row == e.parentRow && cur[i].col == e.parentCol){
					e = cur[i];
					break;
				}
			}
		}
		printf("\(%d,%d)\n",0,0);
	}else{
		printf("Not found\n");
	}
}
