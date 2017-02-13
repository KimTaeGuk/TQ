package DAO;
import java.util.Date;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;
import DBCon.DBCon;
import DTO.BoardBean;
import DAO.Comment_Access;
import DAO.Reply_Access;

public class Board_Access{
	DBCon db=new DBCon();
	String sql="";
	
	//////////////////////////////////////////////////////////////////////////
	/////////////////////////////////게시판 수 세기////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	public int count(){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		int cnt=0;

		try{
			sql="select COUNT(*) from board";
			
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			if(rs.next()){
				cnt=rs.getInt(1);
			}
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
			db.close(rs,pstmt,con);
		}

		return cnt;
	}
	
	/////////////////////////////////////////////////////////////////////
	///////////////////////////////한글화 처리///////////////////////////////
	////////////////////////////////////////////////////////////////////
	
	public String pasing(String data){
		try{
			data=new String(data.getBytes("8859-1"),"UTF-8");
		}	catch(Exception e){
				e.printStackTrace();
		}
		return data;
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////////삽입///////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void insert(BoardBean BoardBean, int count){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="insert into board(num, id, title, content, date, count, star, kategory) values (?,?,?,?,NOW(),?,?,?)";
			pstmt=con.prepareStatement(sql);
		
			pstmt.setInt(1, count);					//num		(int)
			pstmt.setString(2, pasing(BoardBean.getBoard_id()));		//id		(String)
			pstmt.setString(3, pasing(BoardBean.getBoard_title()));		//title		(String)
			pstmt.setString(4, pasing(BoardBean.getBoard_content()));	//content	(String)
			pstmt.setInt(5,0);
			pstmt.setInt(6, BoardBean.getBoard_star());
			pstmt.setString(7, pasing(BoardBean.getBoard_kategory()));		//kategory	(String)
			
			pstmt.execute();
		}	catch(Exception e){
				e.printStackTrace();
		
		}	finally{
			db.close(pstmt, con);
		}
	}
	
	//////////////////////////////////////////////////////////////////
	///////////////////////////////삭제////////////////////////////////
	/////////////////////////////////////////////////////////////////
	
	public void delete(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			Comment_Access CA=new Comment_Access();
			CA.board_comment_delete(num);
			
			Reply_Access RA=new Reply_Access();
			RA.board_reply_delete(num);
			
			sql="DELETE FROM board WHERE num=?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			pstmt.executeUpdate();
			
			up_num(num);
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(pstmt, con);
		}
	}
	
	//////////////////////////////////////////////////////////////////
	///////////////////////////삭제 후 num 올리기//////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void up_num(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="update board set num=num-1 where num>?";
			
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally	{
				db.close(pstmt, con);
		}	
	}
	
	
	//////////////////////////////////////////////////////////////////
	///////////////////////////////수정////////////////////////////////
	/////////////////////////////////////////////////////////////////
	
	public void modify(BoardBean BoardBean, int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="UPDATE board set title=?, content=?, star=? where num=?";	//1:String 2:String 3:int 4:int
		
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, pasing(BoardBean.getBoard_title()));
			pstmt.setString(2, pasing(BoardBean.getBoard_content()));
			pstmt.setInt(3, BoardBean.getBoard_star());
			pstmt.setInt(4, num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally	{
			db.close(pstmt, con);
		}
	}
	
	////////////////////////////////////////////////////////////////////////
	///////////////////////////////조회 수 올리기////////////////////////////////
	//////////////////////////////////////////////////////////////////////
	
	public void Count_up(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			sql="update board set count=count+1 where num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			
			pstmt.executeUpdate();
			
		}	catch(Exception e){
				e.printStackTrace();			
		}	finally{
			db.close(pstmt, con);
		}
	}
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////View Page////////////////////////////////
	///////////////////////////////////////////////////////////////////////

	public BoardBean Board_view(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		BoardBean board=null;
		
		try{
			sql="select * from board where num=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setInt(1, num);
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				board=new BoardBean();
			
				board.setBoard_num(rs.getInt("num"));
				board.setBoard_star(rs.getInt("star"));
				board.setBoard_count(rs.getInt("count"));
				
				board.setBoard_id(rs.getString("id"));
				board.setBoard_title(rs.getString("title"));
				board.setBoard_content(rs.getString("content"));
				board.setBoard_date(rs.getString("date"));
				board.setBoard_kategory(rs.getString("kategory"));
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
			db.close(con);
		}
		
		
		return board;
	}
	

	/////////////////////////////////////////////////////////////////////////////
	////////////////////////////////오늘 쓴 거 NEW 표시////////////////////////////////
	////////////////////////////////////////////////////////////////////////////

	public String today_new(String date){
		Date today=new Date();
		SimpleDateFormat simpleDate=new SimpleDateFormat("yyyy-MM-dd");
		String now=(String)simpleDate.format(today);
		
		String yea=date.substring(0,10);
		
		if(now.equals(yea)){
			return "1";
		}	else {
			return "2";			
		}

	}
	
	
	
	/////////////////////////////////////////////////////////////////////////
	///////////////////////////////List Page////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public ArrayList<BoardBean>	Board_List(){
		
		ArrayList<BoardBean> list=new ArrayList<BoardBean>();
		
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		try{
			sql="select * from board";
			pstmt=con.prepareStatement(sql);
			rs=pstmt.executeQuery();
			
			while(rs.next()){
				BoardBean bean=new BoardBean();
				
				bean.setBoard_num(rs.getInt("num"));
				bean.setBoard_count(rs.getInt("count"));
				bean.setBoard_star(rs.getInt("star"));
				
				bean.setBoard_id(rs.getString("id"));
				bean.setBoard_title(rs.getString("title"));
				bean.setBoard_content(rs.getString("content"));
				bean.setBoard_kategory(rs.getString("kategory"));
				bean.setBoard_date(rs.getString("date"));
				
				list.add(bean);
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally{
			db.close(rs, pstmt, con);
		}

		return list;
	}

}











































/**
 * Servlet implementation class Board_Access
 *//*
@WebServlet("/Board_Access")
public class Board_Access extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    *//**
     * @see HttpServlet#HttpServlet()
     *//*
    public Board_Access() {
        super();
        // TODO Auto-generated constructor stub
    }

	*//**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 *//*
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	
		System.out.println("doGet");
	}

	*//**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 *//*
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		
		System.out.println("doPost");
	}

}*/