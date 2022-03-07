#include<stdio.h>

void wait(s){
    while(s<=0);
    s-=1;
}

void signal(s){
    s+=1;
}
