package com.race.codeDash.dto;

import com.race.codeDash.infrastructure.TupleLineCode;

import java.util.LinkedList;

public record RaceDataDto(
		String creatorName,
		String difficulty,
		String programmingLanguage,
		Integer time,
		TupleLineCode<LinkedList<Integer>, LinkedList<CodeDto>> lineCode
) {
}
