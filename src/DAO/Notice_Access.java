package DAO;

import java.sql.PreparedStatement;
import java.sql.*;
import java.util.ArrayList;

import DBCon.DBCon;
import DTO.NoticeBean;

public class Notice_Access {
	DBCon db=new DBCon();
	String sql="";
	
	
	//////////////////////////////////////////////////////////////////////////
	/////////////////////////////////공지사항 수 세기////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	public int notice_count(){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		int cnt=0;
		
		try{
			sql="SELECT COUNT(*) FROM NOTICE";
			
			pstmt=con.prepareStatement(sql);
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
	
	////////////////////////////////////////////////////////////////////////
	///////////////////////////////조회 수 올리기////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	
	public void notice_cnt_up(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE NOTICE SET COUNT=COUNT+1 WHERE NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			
			pstmt.executeUpdate();
			
		} catch(Exception e){
			e.printStackTrace();
		} finally {
			db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////////삽입///////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void notice_ins(NoticeBean noticebean, int count){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="INSERT INTO NOTICE(NUM, COUNT, ID, TITLE, CONTENT, kategory, DATE) VALUES(?,?,?,?,?,?,NOW())";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, count);
			pstmt.setInt(2, 0);
			pstmt.setString(3, noticebean.getNotice_id());
			pstmt.setString(4, noticebean.getNotice_title());
			pstmt.setString(5, noticebean.getNotice_content());
			pstmt.setString(6, noticebean.getNotice_kategory());

			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);;
		}
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////////수정///////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void notice_mod(NoticeBean noticebean, int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE NOTICE SET TITLE=?, CONTENT=? WHERE NUM=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, noticebean.getNotice_title());
			pstmt.setString(2, noticebean.getNotice_content());
			pstmt.setInt(3, num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////////삭제///////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void notice_del(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="DELETE FROM NOTICE WHERE NUM=?";

			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			pstmt.executeUpdate();
			
			del_up(num);
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//////////////////////////////////////////////////////////////////
	///////////////////////////삭제 후 num 올리기//////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void del_up(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE NOTICE SET NUM=NUM-1 WHERE NUM>?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
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

	public ArrayList<NoticeBean> Notice_list(){
		
		ArrayList<NoticeBean> list=new ArrayList<NoticeBean>();
		
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="SELECT * FROM NOTICE";
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				NoticeBean noticebean=new NoticeBean();
				
				noticebean.setNotice_num(rs.getInt("num"));
				noticebean.setNotice_count(rs.getInt("COUNT"));
				noticebean.setNotice_id(rs.getString("ID"));
				noticebean.setNotice_title(rs.getString("TITLE"));
				noticebean.setNotice_content(rs.getString("CONTENT"));
				noticebean.setNotice_kategory(rs.getString("KATEGORY"));
				noticebean.setNotice_date(rs.getString("DATE"));
				
				list.add(noticebean);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return list;
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////View Page////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	public NoticeBean notice_view(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		NoticeBean noticebean=null;
		
		try{
			sql="SELECT * FROM NOTICE WHERE NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				noticebean=new NoticeBean();
				
				noticebean.setNotice_num(rs.getInt("NUM"));
				noticebean.setNotice_count(rs.getInt("COUNT"));
				noticebean.setNotice_id(rs.getString("ID"));
				noticebean.setNotice_title(rs.getString("TITLE"));
				noticebean.setNotice_content(rs.getString("CONTENT"));
				noticebean.setNotice_date(rs.getString("DATE"));
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
		
		return noticebean;
	}
}
