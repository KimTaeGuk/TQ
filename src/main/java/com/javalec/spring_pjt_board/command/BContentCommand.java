package com.javalec.spring_pjt_board.command;

import javax.servlet.http.HttpServletRequest;

import org.springframework.ui.Model;

import com.javalec.spring_pjt_board.dao.BDao;
import com.javalec.spring_pjt_board.dto.BDto;

import java.util.Map;

public class BContentCommand  implements BCommand{
	
	@Override
	public void execute(Model model) {
		// TODO Auto-generated method stub
		Map<String, Object> map=model.asMap();
		HttpServletRequest request=(HttpServletRequest)map.get("Request");
		String bid=request.getParameter("bid");
		
		BDao dao=new BDao();
		BDto dto=dao.contentView(bid);
		
		model.addAttribute("content_view",dto);
	}
}
