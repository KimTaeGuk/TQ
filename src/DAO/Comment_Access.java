package DAO;
import java.sql.*;
import java.util.ArrayList;
import DBCon.DBCon;
import DTO.CommentBean;
import DAO.Reply_Access;
import DTO.MsgInformBean;

public class Comment_Access {
	DBCon db=new DBCon();
	String sql="";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////1 차 댓 글 //////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	//////////////////////////////////////////////////////////////////////////
	//////////////////////////////////댓글 수 세기////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	public int comment_count(CommentBean commentbean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		int cnt=0;
		
		try{
			sql="SELECT COUNT(*) FROM COMMENT where board_num=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, commentbean.getBoard_num());
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				cnt=rs.getInt(1);
			}
		}	catch (Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		return cnt;
	}
		
	///////////////////////////////////////////////////////////////////
	///////////////////////////1차 댓글삽입//////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void comment_insert(CommentBean commentbean,int count, int comment_depth){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="insert into comment(board_num,comment_num,comment_id,comment_depth,comment_content,comment_date) values(?,?,?,?,?,NOW())";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, commentbean.getBoard_num());
			pstmt.setInt(2, count);
			pstmt.setString(3, commentbean.getComment_id());
			pstmt.setInt(4, comment_depth);
			pstmt.setString(5, commentbean.getComment_content());
		
			pstmt.executeUpdate();
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
			db.close(rs, pstmt, con);
		}
	}
	
	//////////////////////////////////////////////////////////////////////////
	///////////////////////////작성한 게시판 번호 출력//////////////////////////////
	////////////////////////////////////////////////////////////////////////

	public ArrayList<Integer> Id_BoardNum(String id){
		ArrayList<Integer> result=new ArrayList<Integer>();
		
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="select num from board where id=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, id);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				result.add(rs.getInt(1));
			}
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return result;
	}
	
	//////////////////////////////////////////////////////////////////////////
	//////////////////////////////댓글 알림 기능 출력//////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	public ArrayList<MsgInformBean> msg_inform(ArrayList<Integer> num){
		ArrayList<MsgInformBean> msgInfo=new ArrayList<MsgInformBean>();
		String board_id=null;
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			for(int i: num){
				sql="select id from board where num=?";
				pstmt=con.prepareStatement(sql);
				pstmt.setInt(1, i);
				rs=pstmt.executeQuery();
				
				if(rs.next()){
					board_id=rs.getString(1);
				}
				
					sql="select * from comment where board_num=? && comment_id!=?";
					pstmt=con.prepareStatement(sql);
					pstmt.setInt(1,i);
					pstmt.setString(2, board_id);
					rs=pstmt.executeQuery();
						
					while(rs.next()){
						MsgInformBean msgbean=new MsgInformBean();
						
						msgbean.setBoard_id(board_id);
						msgbean.setBoard_num(rs.getInt("board_num"));
						msgbean.setComment_content(rs.getString("comment_content"));
						msgbean.setComment_date(rs.getString("comment_date"));
						msgbean.setComment_id(rs.getString("comment_id"));
						
						msgInfo.add(msgbean);
					}
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		return msgInfo;
	}
	
	///////////////////////////////////////////////////////////////////
	///////////////////////////1차 댓글수정//////////////////////////////
	/////////////////////////////////////////////////////////////////
	
	public void comment_modify(CommentBean commentbean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE comment set comment_content=? where comment_num=? && board_num=? && comment_depth=1";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, commentbean.getComment_content());		
			pstmt.setInt(2, commentbean.getComment_num());				
			pstmt.setInt(3, commentbean.getBoard_num());				
			
			pstmt.executeUpdate();

		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	//////////////////////1차 댓글수정할 때 내용 가져오기////////////////////////
	///////////////////////////////////////////////////////////////
	
	public CommentBean comment_modifyText(int board_num,int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		CommentBean commentbean=new CommentBean();
		
		try{
			sql="select * from comment where board_num=? && comment_num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			pstmt.setInt(2, comment_num);
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				commentbean.setBoard_num(rs.getInt("board_num"));
				commentbean.setComment_content(rs.getString("comment_content"));
				commentbean.setComment_id(rs.getString("comment_id"));
				commentbean.setComment_num(rs.getInt("comment_num"));
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return commentbean;
		
	}
	
	
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////1차 댓글삭제//////////////////////////////
	////////////////////////////////////////////////////////////////
	
	//////////////////////////게시판 삭제 시/////////////////////////////
	public void board_comment_delete(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try {			
			sql="DELETE FROM COMMENT WHERE BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//////////////////////////게시판 번호보다 작은 게시판 삭제 시/////////////////////////////
	
	public void lowerboard_comment_delete(int board_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET BOARD_NUM=BOARD_NUM-1 WHERE BOARD_NUM>?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, board_num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	public void comment_delete(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			Reply_Access RA=new Reply_Access();
			RA.comment_reply_delete(board_num, comment_num);

			sql="DELETE FROM COMMENT WHERE BOARD_NUM=? && COMMENT_NUM=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1,board_num);
			pstmt.setInt(2, comment_num);
			
			pstmt.executeUpdate();
						
			CommentNum_Up(board_num, comment_num);
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);;
		}
	}
	
	/////////////////////////////////////////////////////////////////
	/////////////////////삭제 후 comment_num 올리기///////////////////////
	///////////////////////////////////////////////////////////////
	
	public void CommentNum_Up(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET COMMENT_NUM=COMMENT_NUM-1 WHERE COMMENT_NUM>? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////List Page////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public ArrayList<CommentBean> comment_list(int board_num){
		ArrayList<CommentBean> list=new ArrayList<CommentBean>();
		
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="SELECT * FROM COMMENT WHERE BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, board_num);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				CommentBean bean=new CommentBean();
				
				bean.setComment_id(rs.getString("COMMENT_ID"));
				bean.setComment_content(rs.getString("COMMENT_CONTENT"));
				bean.setComment_like(rs.getInt("Like_cnt"));
				bean.setComment_hate(rs.getInt("Hate_cnt"));
				
				list.add(bean);
			}
			
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return list;
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////좋아요 / 싫어요 기능 구현 /////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	/////////////////////////////////////////////////////////////////
	////////////////////////////좋아요 기능//////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void CommentLike_Up(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET Like_cnt=Like_cnt+1 WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	////////////////////////////싫어요 기능//////////////////////////////
	////////////////////////////////////////////////////////////////

	public void CommentHate_Up(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET Hate_cnt=Hate_cnt+1 WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}

	//////////////////////////////////////////////////////////////////////////
	///////////////////////////////좋아요 개수 파악/////////////////////////////////
	////////////////////////////////////////////////////////////////////////

	public int Comment_Like_cnt(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		CommentBean commentbean=new CommentBean();
		
		int Like_cnt=0;
		
		try{
			sql="SELECT LIKE_CNT FROM COMMENT WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				Like_cnt=rs.getInt(1);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return Like_cnt;
	}

	//////////////////////////////////////////////////////////////////////////
	///////////////////////////////싫어요 개수 파악/////////////////////////////////
	///////////////////////////////////////////////////.////////////////////

	public int Comment_Hate_cnt(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		CommentBean commentbean=new CommentBean();
		
		int hate_cnt=0;
		
		try{
			sql="SELECT HATE_CNT FROM COMMENT WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				hate_cnt=rs.getInt(1);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return hate_cnt;
	}

	
	//////////////////////////////////////////////////////////////////////////
	////////////////////////////////좋 아 요 취 소//////////////////////////////////
	////////////////////////////////////////////////////.////////////////////

	public void CommentLike_Down(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET Like_cnt=Like_cnt-1 WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//////////////////////////////////////////////////////////////////////////
	////////////////////////////////싫 어 요 취 소//////////////////////////////////
	////////////////////////////////////////////////////.////////////////////

	public void CommentHate_Down(int board_num, int comment_num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE COMMENT SET Hate_cnt=Hate_cnt-1 WHERE COMMENT_NUM=? && BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, comment_num);
			pstmt.setInt(2, board_num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
}
