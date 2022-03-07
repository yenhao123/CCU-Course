#include<stdio.h>

/*
 
 insertNode steps
 1. heap_size+=1
 2. input new value the last element
 3. heapify_inrt(n-1)//從最後一element開始heapify(由下至上)
 
 heapify_inrt(n)
 a. 設定parent
 b. 比較n與parent誰大
 	I. 若parent比n大，則parent與n互換,且繼續heapify_inrt(parent)
 	II.若小，則break

 deleteRoot steps
 1. replace root to the last element
 2. heap_size-=1
 3. heapify_del(0)//從root開始heapify(由上至下)
 
 heapify_del(n)
 a. n的孩子,比較孩子誰大
 b. 大孩子與parent n比誰大
	I. 若parent大,則break
	II.若parent小,則parent與大孩子之值互換且繼續heapify_del(大孩子)
 
 */



