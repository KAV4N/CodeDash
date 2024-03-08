package com.race.codeDash.service;

import com.race.codeDash.dto.RaceDataDto;
import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.mapper.CodeMapper;
import com.race.codeDash.repository.CodeRepository;
import org.springframework.stereotype.Service;

import java.util.List;
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
	public RaceDataDto getRandomCodeDto() {
		List<CodeEntity> data = codeRepository.findAll();
		int count = data.size();

		if (count == 0) {
			throw new NoSuchElementException("No code snippets found in the database");
		}

		Random random = new Random();
		int randomIndex = random.nextInt(count);
		CodeEntity codeEntity = data.get(randomIndex);
		return new RaceDataDto(
				codeEntity.getPlayer().getEmail(),
				codeEntity.getDifficulty().getName(),
				codeEntity.getProgrammingLanguage().getLanguageName(),
				codeEntity.getDifficulty().getTime(),
				codeMapper.parseCodeSnippet(codeEntity.getSnippet())
				);
	}
}
