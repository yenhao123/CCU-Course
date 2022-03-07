.data
msgb1:.asciiz "The small prime is "
msgb2:.asciiz"The big prime is "
space:.asciiz"\n"
inputa:.asciiz "The number= "
.text
.globl main
main:
	### scanf in mars std
	li $v0,4
	la $a0,inputa 
	syscall		# do sys call : print string(4)
	li $v0,5 #read int(5)
	syscall
	add $t1,$v0,$zero  #t1,number
	##############
	## find_prime Var + jmp
	add $t2,$t1,1  #Small
	sub $t3,$t1,1 #Big
	j find_small_prime
	##############
#找最大與最小質數
find_small_prime:
	## is_prime Var + jmp
	sub $t2,$t2,1
	add $t4,$zero,2	# i=2
	div $t5,$t2,2
	add $t5,$t5,1
	j is_small_prime
	##############
	
is_small_prime:
	beq $t2,$zero,find_big_prime
	beq $t4,$t5,find_big_prime
	# p % i
	rem $t6,$t2,$t4
	beq $t6,$zero,find_small_prime
	
	add $t4,$t4,1
	j is_small_prime

find_big_prime:
	
	add $t3,$t3,1
	add $t4,$zero,2	# i=2
	div $t5,$t3,2
	add $t5,$t5,1
	j is_big_prime
	##############
	
is_big_prime:
	beq $t4,$t5,shown #if(i == p/2)
	
	rem $t6,$t3,$t4 #  p%i
	beq $t6,$zero,find_big_prime
	
	add $t4,$t4,1
	j is_big_prime

shown:
	### print string + int std
	li $v0,4 #print string(4)
	la $a0,msgb1
	syscall
	add $a0,$zero,$t2
	li $v0,1 #print int(1)
	syscall
	##############
	### plus space
	addi $v0, $zero, 4 # print_string syscall 
    	la $a0, space  # load address of the string 
    	syscall 
    	##############
	### print string + int std
	li $v0,4 #print string(4)
	la $a0,msgb2
	syscall
	add $a0,$zero,$t3
	li $v0,1 #print int(1)
	syscall
	##############
	li $v0,10 #return
	syscall
	
	
