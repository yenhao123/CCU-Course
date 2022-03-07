module MEMORY(
	clk,
	rst,
	XM_MemtoReg,
	XM_RegWrite,
	XM_MemRead,
	XM_MemWrite,
	ALUout,
	XM_RD,
	XM_MD,
	SW,

	MW_MemtoReg,
	MW_RegWrite,
	MW_ALUout,
	MDR,
	MW_RD
);
input clk, rst, XM_MemtoReg, XM_RegWrite, XM_MemRead, XM_MemWrite;

input [12:0] SW;
input [31:0] ALUout;
input [4:0] XM_RD;
input [31:0] XM_MD;


output reg MW_MemtoReg, MW_RegWrite;
output reg [31:0]	MW_ALUout, MDR;
output reg [4:0]	MW_RD;

//data memory
reg [31:0] DM [0:31];
reg [31:0] i;

always @(posedge clk or posedge rst)
	if (rst) begin
		MW_MemtoReg 		<= 1'b0;
		MW_RegWrite 		<= 1'b0;
		MDR					<= 32'b0;
		MW_ALUout			<= 32'b0;
		MW_RD				<= 5'b0;
		DM[0]				<= {19'd0, SW[12:0]};
		for(i = 1; i < 32; i = i + 1) DM[i] = 32'd0;
	end
	else if(XM_MemWrite) begin
	   DM[ALUout[6:0]] <= XM_MD;
	   MW_MemtoReg     <=1'b0;
	   MW_RegWrite     <=1'b0;
	   MDR             <= MDR;
	   MW_ALUout       <= ALUout;
       MW_RD           <= XM_RD;
	end
	else begin // XM_MemRead
		MW_MemtoReg 		<= XM_MemtoReg;
		MW_RegWrite 		<= XM_RegWrite;
		MDR					<= DM[ALUout[6:0]];
		MW_ALUout			<= ALUout;
		MW_RD 				<= XM_RD;
	end

endmodule
