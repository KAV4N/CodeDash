package com.race.codeDash.service;

import com.race.codeDash.dto.CodeDto;
import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.exception.ResourceNotFoundException;
import com.race.codeDash.mapper.CodeMapper;
import com.race.codeDash.repository.CodeRepository;
import org.springframework.stereotype.Service;

import java.util.LinkedList;
import java.util.NoSuchElementException;
import java.util.Random;


@Service
public class CodeServiceImpl implements CodeService {

	private final CodeRepository codeRepository;
	private final CodeMapper codeMapper;

	CodeServiceImpl (CodeRepository codeRepository, CodeMapper codeMapper) {
		this.codeRepository = codeRepository;
		this.codeMapper = codeMapper;
	}

	@Override
	public LinkedList<CodeDto> getRandomCodeDto() {
		long count = codeRepository.count();

		if (count == 0) {
			throw new NoSuchElementException("No code snippets found in the database");
		}

		Random random = new Random();
		long randomIndex = random.nextInt((int) count);
		CodeEntity codeEntity = codeRepository.findById(randomIndex + 1)
				.orElseThrow(() ->
						new ResourceNotFoundException("Code ID: " + (randomIndex + 1) + " does not exist!"));

		return codeMapper.parseCodeSnippet(codeEntity.getSnippet());
	}


	public int getLines() {
		return codeMapper.getLineCounter();
	}
}
