#include<stdio.h>

int bin_search(int s,int e,int key,int *list){
	while(s<=e){
		int mid = (s+e)/2;
		if(key==list[mid])
		    return mid;
		else if(key>list[mid])
		    s = mid+1;
		else
		    e = mid-1;
	}
	return -1;
}

int main(){

   	int list[10] = {1,2,3,4,5,6,7,8,9,10};
 	int key;
    	scanf("%d",&key);
    	int index = bin_search(0,9,key,list);
	if(index!=-1)
	    printf("find it,index:%d",index);
	else
	    printf("not found");
}
