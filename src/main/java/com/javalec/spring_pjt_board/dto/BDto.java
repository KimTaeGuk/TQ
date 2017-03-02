package com.javalec.spring_pjt_board.dto;

import java.security.Timestamp;

public class BDto {

	int bid;
	String bName;
	String bTitle;
	String bContent;
	String bDate;
	int bHit;
	int bGroup;
	int bStep;
	int bindent;
	
	public BDto(){}
	
	public BDto(int bId, String bName, String bTitle,String bContent,String bDate, int bHit, int bGroup, int bStep, int bIndent){
		this.bid=bId;
		this.bName=bName;
		this.bTitle=bTitle;
		this.bContent=bContent;
		this.bDate=bDate;
		this.bHit=bHit;
		this.bGroup=bGroup;
		this.bStep=bStep;
		this.bindent=bIndent;
	}

	public int getBid() {
		return bid;
	}

	public void setBid(int bid) {
		this.bid = bid;
	}

	public String getbName() {
		return bName;
	}

	public void setbName(String bName) {
		this.bName = bName;
	}

	public String getbTitle() {
		return bTitle;
	}

	public void setbTitle(String bTitle) {
		this.bTitle = bTitle;
	}

	public String getbContent() {
		return bContent;
	}

	public void setbContent(String bContent) {
		this.bContent = bContent;
	}

	public String getbDate() {
		return bDate;
	}

	public void setbDate(String bDate) {
		this.bDate = bDate;
	}

	public int getbHit() {
		return bHit;
	}

	public void setbHit(int bHit) {
		this.bHit = bHit;
	}

	public int getbGroup() {
		return bGroup;
	}

	public void setbGroup(int bGroup) {
		this.bGroup = bGroup;
	}

	public int getbStep() {
		return bStep;
	}

	public void setbStep(int bStep) {
		this.bStep = bStep;
	}

	public int getBindent() {
		return bindent;
	}

	public void setBindent(int bindent) {
		this.bindent = bindent;
	}
}
