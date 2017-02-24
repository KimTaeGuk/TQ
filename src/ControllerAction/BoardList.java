package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DTO.BoardBean;
import DAO.Board_Access;
import java.util.ArrayList;

@WebServlet("/BoardList")
public class BoardList extends HttpServlet {
	private static final long serialVersionUID = 1L;

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Board_Access boardAccess=new Board_Access();
		
		ArrayList<BoardBean> listBean=boardAccess.boardList();
	
		request.setAttribute("listBean", listBean);
		
		request.getRequestDispatcher("./boardList.jsp").forward(request, response);
	}
}
