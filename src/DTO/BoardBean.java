package DTO;

public class BoardBean {
	
	// 게시판 
	private int board_num;			//
	private int board_count;		//
	private int board_star;			//
	private String board_id;		//
	private String board_title;		//
	private String board_content;	//
	private String board_kategory;	//
	private String board_date;		//
	
	//Getter & Setter
	public String getBoard_date() {
		return board_date;
	}

	public void setBoard_date(String board_date) {
		this.board_date = board_date;
	}
	public int getBoard_num() {
		return board_num;
	}

	public void setBoard_num(int board_num) {
		this.board_num = board_num;
	}

	public int getBoard_count() {
		return board_count;
	}

	public void setBoard_count(int board_count) {
		this.board_count = board_count;
	}
	public int getBoard_star() {
		return board_star;
	}

	public void setBoard_star(int board_star) {
		this.board_star = board_star;
	}
	public String getBoard_id() {
		return board_id;
	}
	public void setBoard_id(String board_id) {
		this.board_id = board_id;
	}
	public String getBoard_title() {
		return board_title;
	}

	public void setBoard_title(String board_title) {
		this.board_title = board_title;
	}
	
	public String getBoard_content() {
		return board_content;
	}
	public void setBoard_content(String board_content) {
		this.board_content = board_content;
	}
	public String getBoard_kategory() {
		return board_kategory;
	}
	public void setBoard_kategory(String board_kategory) {
		this.board_kategory = board_kategory;
	}
}
