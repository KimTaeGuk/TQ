package com.javalec.spring_pjt_board.dao;

import com.javalec.spring_pjt_board.dto.BDto;
import java.util.ArrayList;

import javax.naming.Context;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.sql.DataSource;
import java.sql.*;

public class BDao {
	
	DataSource dataSource;
	
	public BDao() {		
		try {
			Context context=new InitialContext();
			dataSource=(DataSource)context.lookup("java:comp/env/jdbc/mysql");
		} catch (NamingException e) {
			e.printStackTrace();
		}
		
		
	}
	
	public ArrayList<BDto> list(){
		ArrayList<BDto> btos=new ArrayList<BDto>();
		Connection con=null;
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			con=dataSource.getConnection();
			String sql="select * from mvc_board";
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				int bId=rs.getInt(1);
				String bName=rs.getString(2);
				String bTitle=rs.getString(3);
				String bContent=rs.getString(4);
				String bDate=rs.getString(5);
				int bHit=rs.getInt(6);
				int bGroup=rs.getInt(7);
				int bStep=rs.getInt(8);
				int bIndent=rs.getInt(9);
				
				BDto bdto=new BDto(bId, bName, bTitle, bContent, bDate, bHit, bGroup, bStep, bIndent);
				btos.add(bdto);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
				try{
					if(rs!=null){rs.close();}
					if(pstmt!=null){pstmt.close();}
					if(con!=null){con.close();}
				}	catch(Exception e){
						e.printStackTrace();
				}
		}
		return btos;
	}
	
	public BDto contentView(String bid){
		BDto dto=new BDto();
		
		return dto;
	}
}
