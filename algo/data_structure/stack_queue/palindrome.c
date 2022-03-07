#include <stdio.h>
#include <string.h>
#include <stdbool.h> 

bool isPalindrome(char *s){
	int len = strlen(s);
	for(int i=0;i<len/2;i++){
		if(s[i]==s[len-i-1])continue;
		else return false;
	}
	return true;
}

int main(){
	char s[100];
	scanf("%s",s);
	if(isPalindrome(s))
		printf("yes");
	else
		printf("no");
}
