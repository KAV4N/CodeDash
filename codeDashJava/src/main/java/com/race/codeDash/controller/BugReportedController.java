package com.race.codeDash.controller;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;


@Controller
public class BugReportedController {

	@PostMapping("/reported-bug")
	public String showBugThankYouPage() {
		return "reported-bug";
	}


}
