package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DTO.BoardBean;
import DAO.Board_Access;

@WebServlet("/BoardModify")
public class BoardModify extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		int boardNum=Integer.parseInt(request.getParameter("boardNum"));
		Board_Access boardAccess=new Board_Access();
		BoardBean boardBean=boardAccess.boardView(boardNum);
		
		request.setAttribute("boardBean", boardBean);
		
		request.getRequestDispatcher("./boardModify.jsp").forward(request, response);
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String boardId=request.getParameter("boardId");
		int boardNum=Integer.parseInt(request.getParameter("boardNum"));
		String boardTitle=request.getParameter("boardTitle");
		String boardContent=request.getParameter("boardContent");
		int boardStar=Integer.parseInt(request.getParameter("boardStar"));
		
		BoardBean boardBean=new BoardBean();
		Board_Access boardAccess=new Board_Access();
		
		boardBean.setBoardId(boardId);
		boardBean.setBoardNum(boardNum);
		boardBean.setBoardTitle(boardTitle);
		boardBean.setBoardContent(boardContent);
		boardBean.setBoardStar(boardStar);
		
		boardAccess.boardModify(boardBean);
		
		response.sendRedirect("BoardList");
	}
}
