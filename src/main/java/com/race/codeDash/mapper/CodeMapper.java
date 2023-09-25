package com.race.codeDash.mapper;

import com.race.codeDash.dto.CodeDto;
import org.springframework.stereotype.Component;

import java.util.LinkedHashMap;
import java.util.LinkedList;


@Component
public class CodeMapper {

	private int lineCounter = 1;
	public LinkedList<CodeDto> parseCodeSnippet(String code) {
		lineCounter = 1;
		LinkedList<CodeDto> codeData = new LinkedList<>();
		LinkedHashMap<String, String> data = new LinkedHashMap<>();
		code = code.replaceAll("\r\n", "\n");

		while (!code.isEmpty() && (code.charAt(0) == '\n' || code.charAt(0) == '\r')) {
			code = code.substring(1);
		}
		codeData.add(new CodeDto("br"+lineCounter, "lineNum"));
		for (int i = 0; i < code.length(); i++) {
			String character = code.substring(i, i + 1);
			if (character.equals("\n") || character.equals("\r")) {
				character = "⏎";
				lineCounter++;
				codeData.add(new CodeDto(String.valueOf(i), character));
				codeData.add(new CodeDto("br"+lineCounter, "lineNum"));
			}
			else {
				if (character.equals(" ")) character = "space";
				codeData.add(new CodeDto(String.valueOf(i), character));
			}
		}
		return codeData;
	}
	public int getLineCounter(){
		return lineCounter;
	}
}