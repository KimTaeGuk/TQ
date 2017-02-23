package ControllerAction;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DAO.Register_Access;
import DTO.RegisterBean;

@WebServlet("/ControllerAction/RegisterWriter")
public class RegisterWriter extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    public RegisterWriter() {
        super();
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		String registerId=request.getParameter("registerId");
		String registerPw=request.getParameter("registerPw");
		String registerName=request.getParameter("registerName");
		
		RegisterBean registerBean=new RegisterBean();
		registerBean.setRegisterId(registerId);
		registerBean.setRegisterPw(registerPw);
		registerBean.setRegisterName(registerName);
		
		Register_Access registerAccess=new Register_Access();
		registerAccess.insertMember(registerBean);
		
		response.sendRedirect("./loginView.jsp");
	}

}
