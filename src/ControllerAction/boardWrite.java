package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import DAO.Board_Access;
import DTO.BoardBean;
import java.util.HashMap;

@WebServlet("/boardWrite")
public class boardWrite extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

    public boardWrite() {super();}
    
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		HttpSession session=request.getSession();
		HashMap map=(HashMap)session.getAttribute("mapSession");
		
		String boardId=(String)map.get("loginId");
		String boardTitle=request.getParameter("boardTitle");
		String boardContent=request.getParameter("boardContent");
		int boardStar=Integer.parseInt(request.getParameter("boardStar"));

		BoardBean boardBean=new BoardBean();
		Board_Access boardAccess=new Board_Access();
		
		boardBean.setBoardId(boardId);
		boardBean.setBoardTitle(boardTitle);
		boardBean.setBoardContent(boardContent);
		boardBean.setBoardStar(boardStar);
				
		boardAccess.boardInsert(boardBean);
		
		response.sendRedirect("./BoardList");
	}

}
