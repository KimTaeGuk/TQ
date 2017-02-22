package DAO;
import DBCon.DBCon;

import DTO.MsgInformBean;
import DTO.CommentBean;

import java.sql.*;

public class msginfo_Access {
	DBCon db=new DBCon();
	String sql="";
	
	//硫��몄� ��由쇨린�� �쎌��
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
	
	//硫���吏� ��由쇨린�� read 蹂�寃� ==> �대┃���� 蹂댁���� �� true
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
	
	// 댓글 알림 삭제
	public void msginfoDel(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM msginfo WHERE board_num=? && comment_num=?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			
			pstmt.executeUpdate();
			
			up_msginNum(board_num,comment_num);
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt, con);
		}
	}
	
	// 게시판 삭제시 댓글 알림 삭제
	public void board_msginfoDel(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM msginfo WHERE board_num=?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt, con);
		}
	}
	
	//낮은 게시판 삭제시 번호 올려주기
	public void lowerboard_msginfoDel(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE msginfo SET BOARD_NUM=BOARD_NUM-1 WHERE BOARD_NUM>?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}		
	}	
	
	//삭제 시 번호 올려주기
	public void up_msginNum(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE msginfo SET comment_num=comment_num-1 WHERE board_num=? && comment_num>?";
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

}


