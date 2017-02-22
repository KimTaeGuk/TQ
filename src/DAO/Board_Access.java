package DAO;
import java.util.Date;
import java.util.Calendar;

import java.text.SimpleDateFormat;
import java.time.Year;
import java.util.ArrayList;
import java.sql.*;

import DBCon.DBCon;
import DTO.BoardBean;
import DAO.Comment_Access;
import DAO.Reply_Access;
import DAO.Notice_Access;

public class Board_Access{
	DBCon db=new DBCon();
	String sql="";
	
	/////////////////////////////////////////////////////////////////////////
	/////////////////////////////////��湲� �� �멸린////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public int comment_count(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		int cnt=0;
		
		try{
			sql="SELECT COUNT(*) FROM COMMENT WHERE BOARD_NUM=?";
			pstmt=con.prepareStatement(sql);
			
			pstmt.setInt(1, num);
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
				cnt=rs.getInt(1);
			}
		}	catch(Exception e){
			
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return cnt;
	}
	
	//////////////////////////////////////////////////////////////////////////
	/////////////////////////////////寃����� �� �멸린////////////////////////////////
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
	///////////////////////////////��湲��� 泥�由�///////////////////////////////
	////////////////////////////////////////////////////////////////////
	
	public String pasing(String data){
		try{
			data=new String(data.getBytes("8859-1"),"UTF-8");
		}	catch(Exception e){
				e.printStackTrace();
		}
		return data;
	}
	
	/////////////////////////////////////////////////////////////////////
	///////////////////////////////��留ㅼ�� ����///////////////////////////////
	////////////////////////////////////////////////////////////////////
	
	public boolean Seller_pasing(String id, String pw){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		
		try{
			sql="SELECT * FROM SELLER WHERE ID=? && PW=?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, id);
			pstmt.setString(2, pw);
			
			rs=pstmt.executeQuery();
			
			if(rs.next()){
					return true;
			}	else {
					return false;
			}
			
		}	catch(Exception e){
				e.printStackTrace();
		}	finally {
				db.close(rs, pstmt, con);
		}
		
		return false;
	}
	
	/////////////////////////////////////////////////////////////////
	///////////////////////////////�쎌��///////////////////////////////
	////////////////////////////////////////////////////////////////
	
	public void insert(BoardBean BoardBean, int count){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
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
	///////////////////////////////����////////////////////////////////
	/////////////////////////////////////////////////////////////////
	
	public void delete(int num){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		
		try{
			
			// ��湲� �щ┛ 寃����� ������/////////////////////////
			//댓글 삭제 및 번호 올리기
			Comment_Access CA=new Comment_Access();
			CA.board_comment_delete(num);
			CA.lowerboard_comment_delete(num);			//��湲� 踰��� �대━湲�
			
			//대댓글들 삭제 및 번호 올리기
			Reply_Access RA=new Reply_Access();
			RA.board_reply_delete(num);
			RA.lowerboard_reply_del(num);
			
			//댓글 알림 기능에 저장된 댓글 삭제 번호 올리기
			msginfo_Access MA=new msginfo_Access();
			MA.board_msginfoDel(num);
			MA.lowerboard_msginfoDel(num);
			/////////////////////////////////////////
			
			
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
	///////////////////////////���� �� num �대━湲�//////////////////////////
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
	///////////////////////////////����////////////////////////////////
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
	///////////////////////////////議고�� �� �щ━湲�////////////////////////////////
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
	////////////////////////////////�ㅻ�� �� 嫄� NEW ����////////////////////////////////
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
	///////////////////////////////~�쇱�� ~�� �� ����湲�////////////////////////////////
	///////////////////////////////////////////////////////////////////////
	
	public String date_eq(String date){
		Calendar cal=Calendar.getInstance();

		int year=cal.get(Calendar.YEAR);
		int month=cal.get(Calendar.MONTH)+1;
		int day=cal.get(Calendar.DATE);
		
		int date_year=Integer.parseInt(date.substring(0,4));		//��
		int date_month=Integer.parseInt(date.substring(5,7));		//��
		int date_day=Integer.parseInt(date.substring(8,10));		//��

		String date_today=date.substring(11,16);	//�쇱�� 媛��� �� �ㅻ�� ��媛�
		
		int m_year=year-date_year;
		int m_month=month-date_month;
		int m_day=day-date_day;
		
		//�ы�닿� ����怨� 1���� 李⑥�� ���� 寃쎌��
		if(m_year!=0){
			if(m_month<0){
					int n=12-date_month+month;
					return n+"�� ��";
			}	else return m_year+"�� ��";
		}	else {
			//�ы�댁�몃�� 李⑥��
			if(m_month!=0)return m_month+"�� ��";
			else {
				//�쇱�� �ㅻ�� 寃쎌��
				if(m_day!=0) return date_year+"�� "+date_month+"�� "+date_day + "��";
				else return date_today;
			}
		}	// m_year != else
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
			sql="select * from board order by num desc";
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

	//////////////////////////////////////////////////////////////////
	///////////////////////////////寃���////////////////////////////////
	/////////////////////////////////////////////////////////////////
	
	public ArrayList<BoardBean> board_search(String search){
		Connection con=db.connect();
		PreparedStatement pstmt=null;
		ResultSet rs=null;
		
		ArrayList<BoardBean> list=new ArrayList<BoardBean>();
				
		try{
			sql="SELECT * FROM BOARD WHERE TITLE LIKE ? || CONTENT LIKE ? || ID LIKE ?";
			pstmt=con.prepareStatement(sql);
			pstmt.setString(1, "%"+search+"%");
			pstmt.setString(2, "%"+search+"%");
			pstmt.setString(3, "%"+search+"%");
			
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
		}	finally {
				db.close(pstmt, con);
		}
		
		return list;
	}
	
}