package DAO;

import java.sql.*;
import DBCon.DBCon;
import DTO.RegisterBean;
import DTO.LoginBean;

public class Register_Access {
	DBCon db=new DBCon();
	String sql="";
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////회 원 가 입///////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	
	public void Register_insert(RegisterBean RegisterBean){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		String birth=RegisterBean.getRegister_year()+"."+RegisterBean.getRegister_month()+"."+RegisterBean.getRegister_day();
		
		try{
			sql="insert into buyer(ID, PW, NAME, BIRTH) values(?,?,?,?)";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setString(1, RegisterBean.getRegister_id());
			pstmt.setString(2, RegisterBean.getRegister_pw());
			pstmt.setString(3, RegisterBean.getRegister_name());
			pstmt.setString(4, birth);
			
			pstmt.execute();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
			
		}
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////ID 중복 검사/////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	
	public RegisterBean Chk_id(String register_id){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		RegisterBean register_bean=new RegisterBean();
		
		try{
			sql="SELECT * FROM BUYER WHERE ID=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, register_id);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				register_bean.setRegister_id(rs.getString("ID"));

			}	else {
				
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt,con);
		}
		
		return register_bean;
	}
	
	/////////////////////////////////////////////////////////////////////////
	////////////////////////////////I D 찾 기/////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	public RegisterBean Search_id(String search_name, String search_birth){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		RegisterBean search_bean=new RegisterBean();
		
		try{
			sql="SELECT * FROM BUYER WHERE NAME=? && BIRTH=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, search_name);
			pstmt.setString(2, search_birth);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				search_bean.setRegister_id(rs.getString("ID"));
			}	else {
				
			}
			
		}	catch(Exception e) {
				e.printStackTrace();
		}	finally {
			
		}
		
		return search_bean;
	}

	/////////////////////////////////////////////////////////////////////////
	////////////////////////////////P W 찾 기/////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	public RegisterBean Search_pw(String search_name, String search_id,String search_birth){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		RegisterBean search_bean=new RegisterBean();
		
		try{
			sql="SELECT * FROM BUYER WHERE NAME=? && BIRTH=? && ID=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, search_name);		//NAME
			pstmt.setString(2, search_birth);		//BIRTH
			pstmt.setString(3, search_id);			//ID
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				search_bean.setRegister_pw(rs.getString("PW"));
			}	else {
				
			}
			
		}	catch(Exception e) {
				e.printStackTrace();
		}	finally {
			
		}
		
		return search_bean;
	}
}
