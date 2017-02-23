package ControllerAction;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DAO.Login_Access;
import DTO.LoginBean;

@WebServlet("/LoginProc")
public class LoginProc extends HttpServlet {
	private static final long serialVersionUID = 1L;
       

    public LoginProc() {
        super();
        // TODO Auto-generated constructor stub
    }


	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		Login_Access loginAccess=new Login_Access();
		
		String loginId=(String)request.getParameter("loginId");
		String loginPw=(String)request.getParameter("loginPw");
		
		LoginBean loginBean=loginAccess.loginproc(loginId, loginPw);
		
		request.setAttribute("loginBean", loginBean);
		
		System.out.println(loginId);
		System.out.println(loginPw);
		System.out.println("ºó"+loginBean.getLoginId());
		System.out.println("ºó"+loginBean.getLoginPw());
		
		request.getRequestDispatcher("./index.jsp").forward(request, response);
	}

}
