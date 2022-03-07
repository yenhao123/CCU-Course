#include "header.h"
void merge(int s,int m,int e){
	//配置左右邊list
	int l_size = m-s+1;
	int r_size = e-m;
	int l[l_size],l_num=0;
	int r[r_size],r_num=0;
	for(int i=0;i<l_size;i++){
		l[i] = list[s+i];
	}
	for(int i=0;i<r_size;i++){
		r[i] = list[m+1+i];
	}
	
	int l_cur = 0,r_cur = 0;
	for(int cur=s;cur<=e;cur++){
		//判別是否有list full
		if(l_cur==l_size){
			list[cur] = r[r_cur++];
			continue;
		}else if(r_cur==r_size){
			list[cur] = l[l_cur++];
			continue;
		}
		
		//sort
		if(l[l_cur]<=r[r_cur]){
			list[cur] = l[l_cur++];
		}else{
			list[cur] = r[r_cur++];
		}
	}

}

void merge_sort(int s,int e){
	if(s<e){
		int m = (s+e)/2;
		merge_sort(s,m);
		merge_sort(m+1,e);
		merge(s,m,e);
	}
}

int main(){
	input();
	merge_sort(0,size-1);
	output();
}
