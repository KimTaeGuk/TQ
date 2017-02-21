package DAO;
import java.sql.*;
import java.io.*;
import DBCon.DBCon;
import DTO.LoginBean;

public class Login_Access {
	DBCon db=new DBCon();
	String sql="";
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////濡쒓렇�씤 泥섎━///////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	public LoginBean Login_proc(String login_id,String login_pw){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		LoginBean login_bean=null;
		
		try{
			login_bean=new LoginBean();
			sql="SELECT * FROM BUYER WHERE ID=? && PW=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, login_id);
			pstmt.setString(2, login_pw);
			rs=pstmt.executeQuery();
					
			if(rs.next()){
				login_bean.setLogin_id(rs.getString("ID"));
				login_bean.setLogin_pw(rs.getString("PW"));
				login_bean.setLogin_photo_identification(rs.getString("photo_identification"));
			}
		}	catch(Exception e) {
				e.printStackTrace();
		}	finally {
				db.close(pstmt,con);
		}
		return login_bean;
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////�뙋留ㅼ옄 泥섎━///////////////////////////////////
	////////////////////////////////////////////////////////////////////////

	public LoginBean Seller_login(LoginBean loginbean,String login_id,String login_pw){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="SELECT * FROM SELLER WHERE ID=? && PW=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, login_id);
			pstmt.setString(2, login_pw);
			rs=pstmt.executeQuery();
					
			if(rs.next()){
				loginbean.setLogin_id(rs.getString("ID"));
				loginbean.setLogin_pw(rs.getString("PW"));
			}
		}	catch(Exception e) {
				e.printStackTrace();
		}	finally {
				db.close(pstmt,con);
		}
		return loginbean;
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////�쉶 �썝 �깉 �눜///////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public void login_del(String id, String pw){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		String fileName=null;
		try{
			sql="SELECT PHOTO_IDENTIFICATION FROM BUYER WHERE ID=? && PW=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, id);
			pstmt.setString(2, pw);
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				fileName=rs.getString(1);
			}
			String realPath="D:\\WorkSpace_Tae\\PortPolio\\WebContent\\upload\\";
			File f=new File(realPath+fileName);
			
			if(f.exists()){
				f.delete();
			}
			
			sql="DELETE FROM BUYER WHERE ID=? && PW=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, id);
			pstmt.setString(2, pw);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////�쉶 �썝 蹂� 寃�///////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public void login_modify(LoginBean loginbean) {
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE BUYER SET NAME=?,photo_identification=? WHERE ID=? && PW=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, loginbean.getLogin_name());
			pstmt.setString(2, loginbean.getLogin_photo_identification());
			pstmt.setString(3, loginbean.getLogin_id());
			pstmt.setString(4, loginbean.getLogin_pw());
		
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt, con);
		}
	}
	
	public String photo_mod(String id){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		String result=null;
		
		try{
			sql="select photo_identification from buyer where id=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1,id);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				result=rs.getString(1);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(rs, pstmt, con);
		}
		return result;
	}

}
