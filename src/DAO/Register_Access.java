package DAO;

import java.sql.*;
import DTO.RegisterBean;
import DBCon.DBCon;

public class Register_Access {
	
	DBCon db=new DBCon();
	Connection con=null;
	PreparedStatement pstmt=null;
	String sql=null;
	
	public Register_Access() {}
	
	public void insertMember(RegisterBean registerBean){
		try{
			con=db.connect();
			sql="INSERT INTO member2(id, pw, name) values(?,?,?)";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, registerBean.getRegisterId());
			pstmt.setString(2, registerBean.getRegisterPw());
			pstmt.setString(3, registerBean.getRegisterName());
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt, con);
		}
	}
}
