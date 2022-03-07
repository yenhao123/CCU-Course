#include<stdio.h>
#include<stdlib.h>

/*
與b tree差異
所有data都放在leaf中

insert(x) steps
>無

split steps
>後半段的node2需包含中點m/2


delete(x) steps
>尋找x放入node時,不只在leaf甚至在內部節點也可能出現x,
>所以所有出現x的節點都刪除並check underflow

underflow steps
>無

rotation
>當右兄弟有足夠node
>令右兄弟最小值為k,第二小值為y,將右兄弟之parent值改成y,原node改成k
>當左兄弟有足夠node
>令左兄弟最大值為k,第二大值為y,將左兄弟之parent改成y,原node改成k

combine
>只將兄弟兩個child合併在一起
*/
