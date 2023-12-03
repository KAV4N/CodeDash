package com.race.codeDash.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class AboutController {
	@GetMapping("/about")
	public String leaderboardPage(Model model) {
		model.addAttribute("activePage", "about");
		return "about";
	}
}
