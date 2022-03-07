#include<stdio.h>

/*
 
 insert
 1. 依照bst方式insert
 2. 向上檢查經過的nodes是否符合AVL限制(平衡係數bf介於-1、1間)
 	a. 若發現某一節點無符合AVL限制,則通過AVL buf判斷此node需調整的型態(調整之原node由高至低為A、B、C)
		I. LL型
			x. A->lnode = B->rnode
			y. B->lnode = C & B->lnode = A
		II. LR型
			x. A->lnode = C->rnode
			y. B->rnode = C->lnode
			z. C->lnode = B & C->rnode = A
		III. RR型
			x. A->rnode = B->lnode
			y. B->lnode = A & B->rnode = C
		IV. RL型
			x. A->rnode = C->lnode
			y. B->lnode = C->rnode
			z. C->lnode = A & C->rnode = B
 */
