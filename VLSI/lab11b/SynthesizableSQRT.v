//------------------------------------------------------//
//- VLSI 2012                                           //
//-                                                     //
//- Exercise: Design a square root circuit              //
//------------------------------------------------------//
// Square Root

module SQRT(
	RST,
	CLK,
	IN_VALID,
	IN,
	OUT_VALID,
	OUT
);
input CLK;
input RST;
input [15:0] IN;
input IN_VALID;
output [11:0] OUT;
output OUT_VALID;
 
// Write your synthesizable code here
reg OUT_VALID;
reg [25:0]in_use;
reg [4:0] IN_count;
reg [13:0] ans;
reg [11:0] OUT;
reg [25:0] x;
reg [25:0] tmp;
reg [25:0] tmp2;
reg [25:0] tmp3;
reg [25:0] tmp4;
reg [25:0] tmp5;
reg [25:0] tmp6;
reg [25:0] tmp7;
reg [25:0] tmp8;
reg [25:0] tmp9;
reg [25:0] tmp10;
reg [25:0] tmp11;
reg [25:0] tmp12;
reg RST_OK ;
reg IN_OK;
reg OUT_OK ;
//		INPUT		//
always @ (posedge RST) begin
	RST_OK = 1;
	OUT_OK = 0;
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 1) begin
			in_use = IN << 10;
			x = 13'b1_0000_0000_0000;
					
			if(in_use > (x * x)) x[11] = 1;
			else begin
				x[12] = 0;
				x[11] = 1;
			end
		end
	end
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 2) begin
			tmp = x;
			if(in_use > (tmp * tmp)) tmp[10] = 1;
			else begin
				tmp[11] = 0;
				tmp[10] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 3) begin
			tmp2 = tmp;
			if(in_use > (tmp2 * tmp2)) tmp2[9] = 1;
			else begin
				tmp2[10] = 0;
				tmp2[9] = 1;
			end
		end
	end	
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 4) begin
			tmp3 = tmp2;
			if(in_use > (tmp3 * tmp3)) tmp3[8] = 1;
			else begin
				tmp3[9] = 0;
				tmp3[8] = 1;
			end
		end
	end	
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 5) begin
			tmp4 = tmp3;
			if(in_use > (tmp4 * tmp4)) tmp4[7] = 1;
			else begin
				tmp4[8] = 0;
				tmp4[7] = 1;
			end
		end
	end	
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 6) begin
			tmp5 = tmp4;
			if(in_use > (tmp5 * tmp5)) tmp5[6] = 1;
			else begin
				tmp5[7] = 0;
				tmp5[6] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 7) begin
			tmp6 = tmp5;
			if(in_use > (tmp6 * tmp6)) tmp6[5] = 1;
			else begin
				tmp6[6] = 0;
				tmp6[5] = 1;
			end
		end
	end	
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 8) begin
			tmp7 = tmp6;
			if(in_use > (tmp7 * tmp7)) tmp7[4] = 1;
			else begin
				tmp7[5] = 0;
				tmp7[4] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 9) begin
			tmp8 = tmp7;
			if(in_use > (tmp8 * tmp8)) tmp8[3] = 1;
			else begin
				tmp8[4] = 0;
				tmp8[3] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 10) begin
			tmp9 = tmp8;
			if(in_use > (tmp9 * tmp9)) tmp9[2] = 1;
			else begin
				tmp9[3] = 0;
				tmp9[2] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 11) begin
			tmp10 = tmp9;
			if(in_use > (tmp10 * tmp10)) tmp10[1] = 1;
			else begin
				tmp10[2] = 0;
				tmp10[1] = 1;
			end
		end
	end	
end
always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 12) begin
			tmp11 = tmp10;
			if(in_use > (tmp11 * tmp11)) tmp11[0] = 1;
			else begin
				tmp11[1] = 0;
				tmp11[0] = 1;
			end
		end
	end	
end

always @ (posedge CLK) begin
	if(~RST) begin
		if(IN_count == 13) begin
			tmp12 = tmp11;
			if(in_use > (tmp12 * tmp12)) tmp12[0] = 1;
			else begin
				tmp12[0] = 0;
			end
			ans = tmp12;
			if(ans[0] == 1) ans = ans + 1;
			ans = ans >> 1;	
		end
	end	
end


//		INPUT		//
//		OUTPUT		//

always @(posedge CLK) begin
	if(RST)
		OUT_VALID = 1'b0;
	if(IN_count == 14) begin
		OUT = ans;
		OUT_VALID = 1'b1;
	end	
	else begin
		OUT_VALID = 1'b0;
	end
end

always @(posedge CLK) begin
   if(IN_VALID)
	IN_count = 0;
   else
	IN_count = IN_count +1 ;
end
//		OUTPUT		//
endmodule

