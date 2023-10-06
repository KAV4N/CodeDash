
package com.race.codeDash.controller;

import com.race.codeDash.dto.CodeDto;
import com.race.codeDash.dto.RaceDataDto;
import com.race.codeDash.infrastructure.TupleCode;
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
		RaceDataDto data = codeService.getRandomCodeDto();
		LinkedList<CodeDto> codeData = data.lineCode().codeSnippet();
		LinkedList<Integer> lineNumbers = data.lineCode().lineNumbers();
		String creatorName = data.creatorName();
		String difficulty = data.difficulty();
		String programmingLanguage = data.programmingLanguage();
		Integer time = data.time();

		int codeDataSize = codeData.size();
		int maxId = codeDataSize > 0 ? codeDataSize - 1 : 0;

		model.addAttribute("lineNumbers", lineNumbers);
		model.addAttribute("activePage", "race");
		model.addAttribute("codeData", codeData);
		model.addAttribute("maxId", maxId);

		model.addAttribute("creatorName", creatorName);
		model.addAttribute("difficulty", difficulty);
		model.addAttribute("playTime", time);
		model.addAttribute("programmingLanguage", programmingLanguage);

		return "race";
	}

}













