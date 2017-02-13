package DBCon;
import java.sql.*;

import com.sun.corba.se.spi.orbutil.fsm.Guard.Result;

import java.io.Console;

public class DBCon {
	
	public DBCon() {}
	//DB 연결
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
			
			}	finally{
				
			}
		return con;
	}
	
	//DB 닫기(pstmt,con)
	public void close(PreparedStatement pstmt, Connection con){
		try{
			if(pstmt!=null){pstmt.close();}
			if(con!=null){con.close();}
	
		}	catch(SQLException se){
				se.printStackTrace();
		
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
		
		}
	}
	
	//DB 닫기(rs,pstmt,con)
	public void close(ResultSet rs, PreparedStatement pstmt, Connection con){
		try{
			if(pstmt!=null){pstmt.close();}
			if(con!=null){con.close();}
			if(rs!=null){rs.close();}
	
		}	catch(SQLException se){
				se.printStackTrace();
		
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
		
		}	
	}
	
	
	//DB 닫기(con)
	public void close(Connection con){
		try{
			if(con!=null){con.close();}
		
		}catch(SQLException se){
			se.printStackTrace();
		
		}catch(Exception e){
			e.printStackTrace();
		
		}	finally{
			
		}
	}
	
	//DB 닫기 (stmt,con)
	public void close(Statement stmt, Connection con){
		try{
			if(con!=null){con.close();}
			if(stmt!=null){stmt.close();}
		}	catch(SQLException se){
				se.printStackTrace();
		
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
		
		}		
	}
}
