package com.race.codeDash.service;

import com.race.codeDash.dto.CodeDto;
import org.aspectj.apache.bcel.classfile.Code;

import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;

public interface CodeService {
	public LinkedList<CodeDto> getRandomCodeDto();

}
