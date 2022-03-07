#include<stdio.h>
/*
 insert
 1. heapSize+=1
 2. 新增新的值到最後一節點
 3. heapify(heapSize-1)

 heapify(n)
 1. minmax(n)
 	a. 若在maxheap
		I. partner = minPartner(n),找出對應的partner
		II.比較partner與n值大小
			x. 若n大,則maxInsert(n)
			y. 若n小,則交換partner與n值並minIinsert(n)
	b. 若在minheap
		I. partner = maxPartner(n),找出對應partner
		II.比較partner與n值大小
	       		x. 若n大,則交換partner與n值並maxInsert(n)
			y. 若n小,則minInsert(n)

maxInsert與minInsert(n)
n一直與其parent比,直到parent符合(e.g,minInsert,parent小於n值)或parent為1時

 
 minmax(n)
 1. 取高(l = log2n)
 2. 比較n 與 (2^l-1)+2^(l-1)
 	a. 若n大,則在max heap
	b. 若n小,則在min heap

deleteMin()
1. 置換heap[1]與最後一個元素值
2. heapSize-=1
3. minheapify(1)

minheapify(parent)
1. 設定child(child = parent/2)
2. 找出child中最小child(heap[child] and heap[child+1]比較)
3. 最小child與parent值比較
	a. 若parent大,則交換parent與最小child值,並繼續heapify(最小child)
	b. 若parent小,則break

maxheapify(parent)
1. 設定child(child = parent/2)
2. 找出child中最大child
3. 最大child與parent比較
	a. 若parent大,則break
	b. 若parent小,則交換parent與最大child值,並繼續heapify(最大child)
 */
