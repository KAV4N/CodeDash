
package com.race.codeDash.controller;

import com.race.codeDash.dto.CodeDto;
import com.race.codeDash.service.CodeServiceImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import java.util.LinkedList;


@Controller
public class RaceController {
	@Autowired
	private CodeServiceImpl codeService;
	@GetMapping("/race")
	public String racePage(Model model) {
		LinkedList<CodeDto> codeData = codeService.getRandomCodeDto();
		int codeDataSize = codeData.size() - codeService.getLines();
		int maxId = codeDataSize > 1 ? codeDataSize - 1 : 0;

		model.addAttribute("activePage", "race");
		model.addAttribute("codeData", codeData);
		model.addAttribute("maxId", maxId);

		return "race";
	}

}













