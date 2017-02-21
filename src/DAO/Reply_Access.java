package DAO;
import java.sql.*;
import java.util.ArrayList;
import DBCon.DBCon;
import DTO.ReplyBean;


public class Reply_Access {
	DBCon db=new DBCon();
	String sql="";
	
	//////////////////////////////////////////////////////////////////////
	/////////////////////////////���뙎湲� �닽�옄 �꽭湲�///////////////////////////////
	////////////////////////////////////////////////////////////////////
	
	public int reply_count(ReplyBean replybean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		int cnt=0;
		
		try{
			sql="SELECT COUNT(*) FROM REPLY WHERE BOARD_NUM=? && COMMENT_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, replybean.getBoard_num());
			pstmt.setInt(2, replybean.getComment_num());
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				cnt=rs.getInt(1);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		return cnt;
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////2李� �뙎湲��궫�엯//////////////////////////////
	////////////////////////////////////////////////////////////////

	public void reply_insert(ReplyBean replybean, int count){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="INSERT INTO REPLY (BOARD_NUM, COMMENT_NUM, REPLY_NUM, REPLY_ID, REPLY_CONTENT, REPLY_DATE) VALUES (?,?,?,?,?,NOW())";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, replybean.getBoard_num());
			pstmt.setInt(2, replybean.getComment_num());
			pstmt.setInt(3, count);
			pstmt.setString(4, replybean.getReply_id());
			pstmt.setString(5, replybean.getReply_content());
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
	}	
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////2李� �뙎湲��궘�젣//////////////////////////////
	////////////////////////////////////////////////////////////////
		
	//////////////////////////寃뚯떆�뙋 �궘�젣 �떆/////////////////////////////
	public void board_reply_delete(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM REPLY WHERE BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//////////////////////////寃뚯떆�뙋 踰덊샇蹂대떎 �옉�� 寃뚯떆�뙋 �궘�젣 �떆/////////////////////////////
	
	public void lowerboard_reply_del(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE REPLY SET BOARD_NUM=BOARD_NUM-1 WHERE BOARD_NUM>?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	
	///////////////////////////�뙎湲� �궘�젣 �떆/////////////////////////////
	public void comment_reply_delete(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM REPLY WHERE BOARD_NUM=? && COMMENT_NUM=?";
			
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
	
	
	public void reply_delete(int board_num, int comment_num, int reply_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM REPLY WHERE BOARD_NUM=? && COMMENT_NUM=? && REPLY_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			pstmt.setInt(3, reply_num);
			
			pstmt.executeUpdate();
			
			replyNum_Up(board_num, comment_num, reply_num);
			
		}	catch(Exception e){
			
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	/////////////////////�궘�젣 �썑 comment_num �삱由ш린///////////////////////
	///////////////////////////////////////////////////////////////

	public void replyNum_Up(int board_num, int comment_num, int reply_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try {
			sql="UPDATE REPLY SET REPLY_NUM=REPLY_NUM-1 WHERE BOARD_NUM=? && COMMENT_NUM=? && REPLY_NUM > ?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			pstmt.setInt(3, reply_num);
			
			pstmt.executeUpdate();
		
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
			
		}
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////2李� �뙎湲��닔�젙//////////////////////////////
	////////////////////////////////////////////////////////////////

	public void reply_modify(ReplyBean replybean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE REPLY SET REPLY_CONTENT=? WHERE BOARD_NUM=? && COMMENT_NUM=? && REPLY_NUM = ?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, replybean.getReply_content());
			pstmt.setInt(2, replybean.getBoard_num());
			pstmt.setInt(3, replybean.getComment_num());
			pstmt.setInt(4, replybean.getReply_num());
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	//////////////////////2李� �뙎湲��닔�젙�븷 �븣 �궡�슜 媛��졇�삤湲�////////////////////////
	///////////////////////////////////////////////////////////////
	
	public void reply_modifyText(ReplyBean replybean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;		
		try{
			sql="SELECT REPLY_CONTENT FROM REPLY WHERE BOARD_NUM=? && COMMENT_NUM=? && REPLY_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, replybean.getBoard_num());
			pstmt.setInt(2, replybean.getComment_num());
			pstmt.setInt(3, replybean.getReply_num());
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				replybean.setReply_content(rs.getString(1));
			}
			
		}	catch(Exception e){
			
		}	finally {
				db.close(rs, pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////List Page////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public ArrayList<ReplyBean> reply_list(int board_num, int comment_num){
		ArrayList<ReplyBean> list=new ArrayList<ReplyBean>();
		
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="SELECT * FROM REPLY WHERE BOARD_NUM=? && COMMENT_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				ReplyBean bean=new ReplyBean();
				
				bean.setBoard_num(rs.getInt("BOARD_NUM"));
				bean.setComment_num(rs.getInt("COMMENT_NUM"));
				bean.setReply_num(rs.getInt("REPLY_NUM"));
				bean.setReply_id(rs.getString("REPLY_ID"));
				bean.setReply_content(rs.getString("REPLY_CONTENT"));
				bean.setReply_date(rs.getString("REPLY_DATE"));
				
				list.add(bean);
			}
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return list;
	}
}
