#include<stdio.h>
/*

gloabal
int heapSize = 0;

insert(value) steps
1. heapSize+=1
2. add new value to the last element,設定child為last element位置
3. 設定parent(parent=child/2)
4. 判別parent在min or max層
	a. 在min層,則判斷parent與child值大小
		I. 若child值小,則parent值與child值互換且verifymin(parent)
		II.若child值大,則verifymax(child)
	b. 在max層,則判斷parent與child值大小
		I.若child值大,則parent值與child值互換且verifymax(parent)
		II.若child值小,則verifymin(child)

verifymax(child) steps
1. 設定grandparent(gp = child/4)
2. 比較gp與child
	a. 若child較小,則break
	b. 若child較大,則gp與child值互換,且繼續verifymax(gp)

verifymin(child) steps
1. 設定grandparent(gp = child/4)
2. 比較gp與child
	a. 若child較大,則break
	b. 若child較小,則gp與child值互換,且繼續verifymin(gp)

deleteRoot steps
1. 將root置換成最後一個element
2. heapSize-=1
3. minheapify(root)

minheapify(root) steps
1. 若root無孩子,則break
2. 若root有孩子,無孫子,則令k為最小孩子child,比較child與root值大小
	a. 若root比較小,則break
	b. 若root比較大,則交換root與child值
3. 若root有孩子,有孫子,則令k為最小孫子gdson,比較gdson與root值大小
	a. 若root比較小,則break
	b. 若root比較大,則交換root與gdson值並比較gdson之parent p與root值大小
		I. 若root值大,則交換p與root值並繼續minheapify(root)
		II.若root值小,則繼續minheapify(root)


*/
