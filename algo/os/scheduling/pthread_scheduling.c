#include <stdio.h>
#include <pthread.h>


void *runner(void *param){
	for(int i=0;i<7;i++){
		printf("%d ",i);
	}
	pthread_exit(0);
}

int main(){	
	int i,scope;
	pthread_t tid[5];
	pthread_attr_t attr;
	
	pthread_attr_init(&attr);
	
	if(pthread_attr_getscope(&attr,&scope)!=0)
		fprintf(stderr,"Ubable to get scheduling scope\n");
	else{
		if(scope == PTHREAD_SCOPE_PROCESS) 
			printf("PTHREAD_sCOPE_PROCESS");
		else if(scope == PTHREAD_SCOPE_SYSTEM)		
			printf("PTHREAD_SCOPE_SYSTEM");
		else
			fprintf(stderr,"Illegal scope value");
	}
	pthread_attr_setscope(&attr,PTHREAD_SCOPE_PROCESS);
	for(i=0;i<5;i++)
		pthread_create(&tid[i],&attr,runner,NULL);
	for(i=0;i<5;i++)
		pthread_join(tid[i],NULL);
}
