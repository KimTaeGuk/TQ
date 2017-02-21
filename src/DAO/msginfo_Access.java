package DAO;
import DBCon.DBCon;

import DTO.MsgInformBean;
import DTO.CommentBean;

import java.sql.*;

public class msginfo_Access {
	DBCon db=new DBCon();
	String sql="";
	
	//메세지 알림기능 삽입
	public void msginfo_ins(CommentBean cbean, String board_id, String comment_date,int count){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="INSERT INTO MSGINFO(board_num, board_id, comment_id, comment_content, comment_date, msgRead, comment_num) VALUES(?,?,?,?,?,0,?)";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, cbean.getBoard_num());
			pstmt.setString(2, board_id);
			pstmt.setString(3, cbean.getComment_id());
			pstmt.setString(4, cbean.getComment_content());
			pstmt.setString(5, comment_date);
			pstmt.setInt(6, count);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
		
	}
	
	//메시지 알림기능 read 변경 ==> 클릭하여 보았을 시 true
	public void msginfoMod_msgRead(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE MSGINFO SET msgRead=1 where board_num=? && comment_num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			
			pstmt.executeUpdate();
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//메시지 삭제
	public void msginfoDel(){
		
	}
	
	
	//메시지보다 번호가 작은 게시판 삭제시 번호 내리기
	public void lowerboard_msginfoDel(){
		
	}
	
	
	//게시판 삭제시 메시지 알림 DB도 삭제
	public void board_msginfoDel(){
		
	}
	
	
	//삭제 후 번호 올려주기
	public void up_msginNum(){
		
	}

}


