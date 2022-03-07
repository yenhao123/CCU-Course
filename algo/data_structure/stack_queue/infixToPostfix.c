#include <stdio.h>
#include <string.h>
#include <stdlib.h>

char stack[100];
int s_num=-1;//top number


//stack func
void push(char c){
	stack[++s_num] = c;
}

char pop(){
	return stack[s_num--];
}

int isEmpty(){
	if(s_num<=-1)return 1;
	else return 0;
}

int isFull(){
	if(s_num>=99)return 1;
	else return 0;
}
//infixToPrefix func needs
int isOperand(char cur){
	if((cur >= 'a' && cur <= 'z') || (cur >='A' && cur <='Z')) return 1;
	else return 0;
}

int Priority(char ch){

	switch(ch)
	{
		case '+':
		case '-':
			return 1;
		case '*':
		case '/':
			return 2;
		case '^':
			return 3;
	}
	return -1;
}

/*
 
infixToPostfix steps
1. meet operands print operand
2. meet with ')' , pop value utils meet with '('
3. meet with '(' , push straight(don't compare with priority)
4. meet operators , compare with the stack top's priority, if top big, print top & continue.else push operator to top 

*/

void infixToPostfix(char* infix){	
	
	int cur = 0;
	while(cur < strlen(infix)){
		if(isOperand(infix[cur])){
			fprintf(stderr,"%c",infix[cur]);
		}
		else if(infix[cur] == ')'){
			while(!isEmpty()){
				char operator = pop(stack);
				if(operator != '('){
					fprintf(stderr,"%c",operator);
				}
				else{
					break;
				}
			}

		}
		else if(infix[cur]=='('){
			if(!isFull())push(infix[cur]);
		}
		else{
			while(!isEmpty()){
				char top = pop();
				if(Priority(top)>=Priority(infix[cur])){
					fprintf(stderr,"%c",top);
				}
				else{
					push(top);
					break;
				}
			}
			if(!isFull()){
				push(infix[cur]);
			}
		}
		cur ++;
	}
	while(!isEmpty()){
		char top = pop();		
		fprintf(stderr,"%c",top);
	}
}


int main(){
	char infix[100];
	scanf("%s",infix);
	infixToPostfix(infix);
	return 0;
}
