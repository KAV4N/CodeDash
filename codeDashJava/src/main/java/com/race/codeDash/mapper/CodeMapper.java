package com.race.codeDash.mapper;

import com.race.codeDash.dto.CodeDto;
import com.race.codeDash.infrastructure.TupleLineCode;
import org.springframework.stereotype.Component;

import java.util.LinkedHashMap;
import java.util.LinkedList;


@Component
public class CodeMapper {

	public TupleLineCode<LinkedList<Integer>, LinkedList<CodeDto>> parseCodeSnippet(String code) {
		LinkedList<CodeDto> codeData = new LinkedList<>();
		LinkedList<Integer> lineNumbers = new LinkedList<>();
		Integer lineCount = 1;
		code = code.replaceAll("\r\n", "\n");

		while (!code.isEmpty() && (code.charAt(0) == '\n' || code.charAt(0) == '\r')) {
			code = code.substring(1);
		}

		for (int i = 0; i < code.length(); i++) {
			String character = code.substring(i, i + 1);
			if (character.equals("\n") || character.equals("\r")) {
				character = "⏎";
				lineNumbers.add(lineCount++);
			}
			else if (character.equals(" ")){
				character = "space";
			}
			if (i == code.length() - 1 && !character.equals("⏎")) lineNumbers.add(lineCount++);

			codeData.add(new CodeDto(String.valueOf(i), character));
		}
		return new TupleLineCode<>(lineNumbers,codeData);
	}


}