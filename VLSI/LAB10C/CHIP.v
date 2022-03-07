//------------------------------------------------------//
//- VLSI 2011                                           //
//-                                                     //
//- Lab10c: Verilog Behavior-Level                      //
//------------------------------------------------------//

module  CHIP(
    CLK,
    RESET,
    IN_VALID,
    IN_DATA,
    OUT_VALID,
    OUT_DATA_X,
    OUT_DATA_Y,
    OUT_DATA_SUM
    );

//input port
input   CLK;
input   RESET;
input   IN_VALID;
input   [7:0]IN_DATA;

//output port
output  OUT_VALID;
output  [3:0]OUT_DATA_X;
output  [3:0]OUT_DATA_Y;
output  [15:0]OUT_DATA_SUM;

/////////////////////////////////
//design your code there/////////
/////////////////////////////////
reg [4:0]count = 1;
reg [4:0]in_use = 0;
reg [5:0]idx= 0;
reg [4:0]i = 0;
reg [1:0]OUT_VALID;
reg [8:0]dis[0:24];

reg [15:0]OUT_SUM = 0;
reg [3:0]OUT_X = 0;
reg [3:0]OUT_Y = 0;

reg INPUT_OK=0;
reg RESET_OK=0;

assign OUT_DATA_SUM = OUT_SUM;
assign OUT_DATA_X = OUT_X;
assign OUT_DATA_Y = OUT_Y;
//////////////////
//	RESET	//
//////////////////
always @ (posedge RESET,negedge OUT_VALID) begin
	for(i = 0;i < 25;i = i + 1) 
		dis[i] <= 9'b0;
	count <= 1;
	idx <= 0;
	OUT_SUM <= 0;
	OUT_X <= 0;
	OUT_Y <= 0;
	OUT_VALID <= 0;
	INPUT_OK <= 0;
	RESET_OK <= 1;
	$display("OUTVALID=%d",OUT_VALID);
end
//////////////////
//	RESET	//
//////////////////

//////////////////
//	input	//
//////////////////
always @ (posedge CLK) begin
	if(IN_VALID) begin
		//$diplay("e");
		//$display("count=%d",count);
		in_use = count;
		if(count == 24) begin
			dis[count] = 0;
			//$display("N");
		end

		else if(count < 5) begin
			dis[count] = dis[in_use-1] + IN_DATA;
			//$display("count=%d");
		end

		else if(count > 4 && count < 25) begin
			if(!(count % 5)) begin
				dis[count] = dis[in_use-5] + IN_DATA;
			end

			else begin
				dis[count] = (dis[in_use-1] > dis[in_use-5] ) ? (dis[in_use-5] + IN_DATA) : (dis[in_use-1] + IN_DATA);			
			end	
		end
		count = count + 1;
		//$display("dis[%d]=%d",count-1,dis[count-1]);	
	end
end

always @ (negedge IN_VALID) begin
	INPUT_OK <= 1;
end
//////////////////////////
//	input end	//
//////////////////////////

//////////////////
//	output	//
//////////////////
always @ (posedge CLK) begin
	if(!IN_VALID && INPUT_OK && RESET_OK) begin
		OUT_VALID <= 1;
	//	$display("idx=%d",idx);
	//	$display("dis[now+1]=%d dis[now+5]=%d",dis[idx+1],dis[idx+5]);
		if(idx%5 == 4) begin
			OUT_SUM <= OUT_SUM + dis[idx+5];
			OUT_X <= OUT_X + 0;
			OUT_Y <= OUT_Y + 1;
			idx <= idx + 5;
		end
		else if(idx > 19) begin
			OUT_SUM <= OUT_SUM + dis[idx+1];
			OUT_X <= OUT_X + 1;
			OUT_Y <= OUT_Y + 0;
			idx <= idx + 1;
						
		end
		else begin
			OUT_SUM <= (dis[idx + 1] > dis[idx + 5]) ? dis[idx + 5]: dis[idx + 1];
			OUT_X <= (dis[idx + 1] > dis[idx + 5]) ? (OUT_DATA_X + 0) : (OUT_DATA_X + 1);		
			OUT_Y <= (dis[idx + 1] > dis[idx + 5]) ? (OUT_DATA_Y + 1) : (OUT_DATA_Y + 0);
			idx <= (dis[idx + 1] > dis[idx + 5]) ? (idx + 5) : (idx + 1);
		end		
	//	$display("OUT_X=%d OUT_Y=%d OUT_SUM=%d",OUT_X,OUT_Y,OUT_SUM);
	//	$display("outcount=%d",out_count);	
		if(OUT_X == 4 && OUT_Y ==4) begin
			OUT_VALID <=0;
		end	
	end
end
//////////////////////////
//	output end	//
//////////////////////////
endmodule
