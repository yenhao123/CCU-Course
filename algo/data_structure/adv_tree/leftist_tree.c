/*

insert(x)
1. 將x視為一tree A
2. merge(A,B),B為原tree

merge(A,B,new)
1. 比較A.root與B.root哪個值較小
2. 較小之樹，其左子樹，加入new中
3. 當A為較小之樹,merge(A.右子樹,B,new);反之,B
4. 直到A、B為空,check new 是否滿足leftist tree性質(shortest(L(x))<=shortest(R(x)))

delete_min()
1. 設x = root
2. merge(x.左子樹,x.右子樹,new),new為刪除後的樹

 */
