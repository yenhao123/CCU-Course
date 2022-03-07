/*

insert(x)
1. search x位置
2. 插入x,並標示為紅node
3. check 有無連續的紅node(x與x的parent是否皆為紅node)
	I. 是,則check x的uncle顏色
		x. 紅色,則x的parent與uncle改成黑色且x的grandparent改成紅色
		y. 黑色,則rotation
	II.無,break
4. Root改為黑色

Rotation
>與balance tree rotation一樣,差別在父點設為黑node、子點為紅node

*/
