# Readme

## 程式說明

==CPU.v==

功能:把所有函式串接再一起(像IF、ID..)

* input訊號 : clk、rst、SW
* output訊號 : CA~CG、AN
    *  `clk`、`rst`控制cycle與重新計算
    *  `SW`控制顯示器
    *  `AN`控制七段顯示
* 把input值放在`DM[0]`，再去做運算，所以SW要傳進`MEMORY.v` 
* 把output的值放到`DM[1]`、`DM[2]`，所以要傳給top.v輸出值

==INSTRUCTION_FETCH.v==

功能:抓下instruction和計算PC位置

設定
* 在一開始執行或按下按鈕時，給定`instruction`

```
if(rst) begin
    //INSTRUCTION
end
else begin
		if (PC[10:2] <= 8'd125)
			IR <= instruction[PC[10:2]]; 
end

```

==INSTRUCTION_DECODE.v==

功能:把instruction做分析(ex,ALR,sw/load...)

設定
* 原來testbench裡把`REG`預設值的動作移到`ID`來執行

==EXECUTION.v==

功能:把A、B值進行運算

設定
* 無異
 
==MEMORY.v==

功能:計算memory

設定
* 接受到rst時，重新設定`DM[0]`的值，前19位填0後填SW值


==top.v==

功能:設定腳位與得出的值的關係
* input訊號`clk`、`rst`、`DM[1]`、`DM[2]`
* output訊號`AN`、`A~G`
* 第一個block固定位置與判斷七段顯示器該如何顯示
* 第二個block七段顯示器呈現

==Nexys4_DDR.xdc==

功能:開啟 `clock signal`、`button`、`switches`、`segment display`

* clock signal改為clk
* buttion(btnc)改為rst
* switches的0~12當作input
* segment display陽極AN全開、陰極C全開


## 如何控制顯示器

SW可以調整input，按下button顯示值，output即會出現，左邊為最小接近質數，右邊為大接近質數，若要改input重複動作
