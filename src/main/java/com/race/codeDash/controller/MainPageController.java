package com.race.codeDash.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;


@Controller
public class MainPageController {

	@GetMapping("/")
	public String backToHome() {
		return "index";
	}


}






