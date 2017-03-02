package com.javalec.spring_pjt_board.command;

import org.springframework.ui.Model;

import com.javalec.spring_pjt_board.dao.BDao;
import com.javalec.spring_pjt_board.dto.BDto;

import java.util.ArrayList;

public class BListCommand implements BCommand {

	@Override
	public void execute(Model model) {
		// TODO Auto-generated method stub
		BDao dao=new BDao();
		ArrayList<BDto> dtos=dao.list();
		System.out.println("ªÁ¿Ã¡Ó : " + dtos.size());
		model.addAttribute("list", dtos);
		
	}
}
