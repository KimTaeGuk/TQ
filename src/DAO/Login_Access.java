package DAO;

import java.sql.*;
import DTO.LoginBean;
import DBCon.DBCon;

public class Login_Access {
	String sql=null;
	Connection con=null;
	PreparedStatement pstmt=null;
	DBCon db=new DBCon();
	
	public LoginBean loginproc(String loginId, String loginPw){
		LoginBean loginBean=new LoginBean();
		ResultSet rs=null;
		
		try{
			con=db.connect();
			sql="SELECT id, pw FROM member2 WHERE id=? && pw=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, loginId);
			pstmt.setString(2, loginPw);
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				loginBean.setLoginId(rs.getString(1));
				loginBean.setLoginPw(rs.getString(2));
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(rs, pstmt, con);
		}
		
		return loginBean;
	}
}
