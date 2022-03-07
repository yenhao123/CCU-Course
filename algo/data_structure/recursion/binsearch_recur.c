#include<stdio.h>
/*
list order : 小到大
key > cur : 走右邊(start,mid-1)
key < cur : 走左邊(mid+1,end)
key = cur : return index
*/

int bin_search(int start,int end,int key,int list[]){
  	if(start>end)
	    return -1;
	
	int mid = (start + end) /2;
	if(list[mid] == key)
	    return mid;
	else if(list[mid]>key)
		return mid = bin_search(start,mid-1,key,list);
	else
	    return mid = bin_search(mid+1,end,key,list);
}

int main(){
	int list[10] = {1,2,3,4,5,6,7,8,9,10};
	int key;
	int index;
	scanf("%d",&key);
	
	if((index = bin_search(0,9,key,list))!=-1){
		printf("find it:index %d",index);
	}else{
	    printf("not found");
	}
}
