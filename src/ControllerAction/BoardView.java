package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DAO.Board_Access;
import DTO.BoardBean;


@WebServlet("/BoardView")
public class BoardView extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Board_Access boardAccess=new Board_Access();
		int boardNum=Integer.parseInt(request.getParameter("boardNum"));
		BoardBean boardBean=boardAccess.boardView(boardNum);
		
		request.setAttribute("boardBean", boardBean);
		
		request.getRequestDispatcher("./boardView.jsp").forward(request, response);
	}


}
