package DAO;

import java.sql.*;
import DBCon.DBCon;
import DTO.BoardBean;
import java.util.ArrayList;

public class Board_Access {
	DBCon db=new DBCon();
	Connection con=null;
	PreparedStatement pstmt=null;
	ResultSet rs=null;
	String sql=null;
	
	//글 번호 올리는 메서드
	public int boardCntUp(){
		int count=0;
		
		try{
			con=db.connect();
			sql="SELECT COUNT(*) FROM board2";
			
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				count=rs.getInt(1);
			}
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return count;
	}
	
	//글 쓰기
	public void boardInsert(BoardBean boardBean){
		int boardCount=boardCntUp()+1;
		try{
			con=db.connect();
			sql="INSERT INTO board2(num, id, title, content, star, date) VALUES(?,?,?,?,?,NOW())";
			
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, boardCount);
			pstmt.setString(2, boardBean.getBoardId());
			pstmt.setString(3, boardBean.getBoardTitle());
			pstmt.setString(4, boardBean.getBoardContent());
			pstmt.setInt(5, boardBean.getBoardStar());
			
			pstmt.executeUpdate();
			
		}catch(Exception e){
				e.printStackTrace();
		}	finally{
				db.close(pstmt, con);
		}
	}
	
	//리스트 페이지
	public ArrayList<BoardBean> boardList(){
		ArrayList<BoardBean> listBean=new ArrayList<BoardBean>();
		
		try{
			con=db.connect();
			sql="SELECT * FROM board2";
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				
				int boardNum=rs.getInt(1);
				String boardId=rs.getString(2);
				String boardTitle=rs.getString(3);
				String boardContent=rs.getString(4);
				String boardDate=rs.getString(5);
				int boardCount=rs.getInt(6);
				int boardStar=rs.getInt(7);
				
				BoardBean boardBean=new BoardBean();
				
				boardBean.setBoardNum(boardNum);
				boardBean.setBoardId(boardId);
				boardBean.setBoardTitle(boardTitle);
				boardBean.setBoardContent(boardContent);
				boardBean.setBoardDate(boardDate);
				boardBean.setBoardCount(boardCount);
				boardBean.setBoardStar(boardStar);
				
				listBean.add(boardBean);
			}
			
		}catch(Exception e){
			e.printStackTrace();
		}finally{
			db.close(rs, pstmt, con);
		}
		
		return listBean;
	}
	
	public BoardBean boardView(int boardNum){
		BoardBean boardBean=new BoardBean();
		
		try{
			con=db.connect();
			sql="SELECT * FROM BOARD2 WHERE NUM=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, boardNum);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				boardBean.setBoardNum(rs.getInt(1));
				boardBean.setBoardId(rs.getString(2));
				boardBean.setBoardTitle(rs.getString(3));
				boardBean.setBoardContent(rs.getString(4));
				boardBean.setBoardDate(rs.getString(5));
				boardBean.setBoardCount(rs.getInt(6));
				boardBean.setBoardStar(rs.getInt(7));
			}
		}catch(Exception e){
			e.printStackTrace();
		}finally {
			db.close(rs, pstmt, con);
		}
		
		return boardBean;		
	}
	
	//수정 페이지
	public void boardModify(BoardBean boardBean){
		try{
			con=db.connect();
			sql="UPDATE board2 SET title=? , content=? , star=? WHERE num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, boardBean.getBoardTitle());
			pstmt.setString(2, boardBean.getBoardContent());
			pstmt.setInt(3, boardBean.getBoardStar());
			pstmt.setInt(4, boardBean.getBoardNum());
			
			pstmt.executeUpdate();
			
		}catch(Exception e){
			e.printStackTrace();
		}finally{
			db.close(pstmt, con);
		}
	}
	
	//삭제 페이지
	public void boardDelete(int boardNum){
		try{
			con=db.connect();
			sql="DELETE FROM board2 WHERE num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, boardNum);
			pstmt.executeUpdate();
		}catch(Exception e){
			e.printStackTrace();
		}finally{
			db.close(pstmt, con);
		}
	}
}
