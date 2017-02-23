package DBCon;

import java.sql.*;

public class DBCon {
	public void DBCon(){}
	
	public Connection connect(){
		Connection con=null;
		try{
			Class.forName("org.gjt.mm.mysql.Driver");
			String url="jdbc:mysql://localhost:3306/xoox1020";
			String user="xoox1020";
			String password="xoxo1020";
			
			con=DriverManager.getConnection(url, user, password);
		}	catch(SQLException se){
				se.printStackTrace();
		}	catch(Exception e){
				e.printStackTrace();
		}
		
		return con;
	}
	
	public void close(PreparedStatement pstmt, Connection con){
		try{
			if(pstmt!=null){pstmt.close();}
			if(con!=null){con.close();}
		}	catch(Exception e){
				e.printStackTrace();
		}
	}
	
	public void close(ResultSet rs, PreparedStatement pstmt, Connection con){
		try{
			if(pstmt!=null){pstmt.close();}
			if(con!=null){con.close();}
			if(rs!=null){rs.close();}
		}	catch(Exception e){
				e.printStackTrace();
		}
	}
}
