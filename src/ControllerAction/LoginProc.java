package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.util.HashMap;
import DAO.Login_Access;
import DTO.LoginBean;


@WebServlet("/LoginProc")
public class LoginProc extends HttpServlet {
	private static final long serialVersionUID = 1L;

    public LoginProc() {super();}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// param �� �ޱ�
		String loginId=(String)request.getParameter("loginId");
		String loginPw=(String)request.getParameter("loginPw");
		// DB ��
		Login_Access loginAccess=new Login_Access();
		LoginBean loginBean=loginAccess.loginproc(loginId, loginPw);
		String loginBeanId=loginBean.getLoginId();
		String loginBeanPw=loginBean.getLoginPw();
		// ���� ���� �� map session ����
		if(loginBeanId!=null && loginBeanPw!=null){
			HttpSession session=request.getSession();
			
			HashMap<String, String> map=new HashMap<String, String>();
		
			map.put("loginId", loginBeanId);
			map.put("loginPw", loginBeanPw);
			
			session.setAttribute("mapSession", map);
		}
		request.getRequestDispatcher("./index.jsp").forward(request, response);
	}

}
