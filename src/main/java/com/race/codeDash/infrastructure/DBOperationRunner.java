package com.race.codeDash.infrastructure;

import com.race.codeDash.entity.DifficultyEntity;
import com.race.codeDash.entity.PlayerEntity;
import com.race.codeDash.entity.ProgrammingLanguageEntity;
import com.race.codeDash.entity.RankEntity;
import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.repository.*;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

import java.util.Arrays;

@Component
public class DBOperationRunner  implements CommandLineRunner {

	@Autowired
	CodeRepository codeRepository;
	@Autowired
	RaceStatsRepository raceStatsRepository;
	@Autowired
	RankRepository rankRepository;
	@Autowired
	DifficultyRepository difficultyRepository;
	@Autowired
	PlayerRepository playerRepository;
	@Autowired
	ProgrammingLauguageRepository programmingLauguageRepository;


	@Override
	public void run(String... args) throws Exception {
		createRanks();
		createDifficulties();
		createProgrammingLanguages();
		createPlayers();
		createCodes();
	}



	public void createCodes() {
		codeRepository.saveAll(Arrays.asList(
			new CodeEntity(
					1L,
					"#include <iostream>\n" +
							"\n" +
							"int main() {\n" +
							"    std::cout << \"Hello, World!\" << std::endl;\n" +
							"    return 0;\n" +
							"}\n",
					playerRepository.findById(1L).get(),
					difficultyRepository.findById(1L).get(),
					programmingLauguageRepository.findById(1L).get()
			),
			new CodeEntity(
					2L,
					"#include <iostream>\n" +
							"\n" +
							"int main() {\n" +
							"    int a = 5;\n" +
							"    int b = 7;\n" +
							"    int sum = a + b;\n" +
							"\n" +
							"    std::cout << \"Sum: \" << sum << std::endl;\n" +
							"\n" +
							"    return 0;\n" +
							"}\n",
					playerRepository.findById(1L).get(),
					difficultyRepository.findById(1L).get(),
					programmingLauguageRepository.findById(1L).get()
			),
			new CodeEntity(
					3L,
					"#include <iostream>\n" +
							"\n" +
							"int main() {\n" +
							"    for (int i = 1; i <= 5; ++i) {\n" +
							"        std::cout << \"Iteration \" << i << std::endl;\n" +
							"    }\n" +
							"\n" +
							"    return 0;\n" +
							"}\n",
					playerRepository.findById(1L).get(),
					difficultyRepository.findById(1L).get(),
					programmingLauguageRepository.findById(1L).get()
			),
			new CodeEntity(
					4L,
					"#include <iostream>\n" +
							"\n" +
							"int main() {\n" +
							"    int number = 10;\n" +
							"\n" +
							"    if (number > 0) {\n" +
							"        std::cout << \"Number is positive.\" << std::endl;\n" +
							"    } else if (number < 0) {\n" +
							"        std::cout << \"Number is negative.\" << std::endl;\n" +
							"    } else {\n" +
							"        std::cout << \"Number is zero.\" << std::endl;\n" +
							"    }\n" +
							"\n" +
							"    return 0;\n" +
							"}\n",
					playerRepository.findById(1L).get(),
					difficultyRepository.findById(2L).get(),
					programmingLauguageRepository.findById(1L).get()
			),
			new CodeEntity(
					5L,
					"#include <iostream>\n" +
							"\n" +
							"int add(int a, int b) {\n" +
							"    return a + b;\n" +
							"}\n" +
							"\n" +
							"int main() {\n" +
							"    int result = add(3, 4);\n" +
							"    std::cout << \"Result: \" << result << std::endl;\n" +
							"\n" +
							"    return 0;\n" +
							"}\n",
					playerRepository.findById(1L).get(),
					difficultyRepository.findById(2L).get(),
					programmingLauguageRepository.findById(1L).get()
			)
		));
	}

	public void createStats() {

	}

	public void createRanks() {
		rankRepository.saveAll(Arrays.asList(
				new RankEntity(1L,"Beginner",1000,null),
				new RankEntity(2L,"Intermediate",2000,null),
				new RankEntity(3L,"Advanced",3000,null),
				new RankEntity(4L,"Expert",4000,null)
		));
	}

	public void createDifficulties() {
		difficultyRepository.saveAll(Arrays.asList(
				new DifficultyEntity(1L,1000,"Easy",60),
				new DifficultyEntity(2L,2000,"Medium",120),
				new DifficultyEntity(3L,3000,"Hard",180),
				new DifficultyEntity(4L,4000,"Expert",240)
		));
	}

	public void createPlayers() {
		PlayerEntity player = new PlayerEntity();
		player.setEmail("test@gmail.com");
		player.setExp(0);
		player.setLevel(1);
		player.setRank(rankRepository.findById(1L).get());
		playerRepository.save(player);
	}

	public void createProgrammingLanguages() {
		programmingLauguageRepository.saveAll(Arrays.asList(
				new ProgrammingLanguageEntity(1L,"C++"),
				new ProgrammingLanguageEntity(2L,"Java"),
				new ProgrammingLanguageEntity(3L,"Python"),
				new ProgrammingLanguageEntity(4L,"JavaScript"),
				new ProgrammingLanguageEntity(5L,"C#"),
				new ProgrammingLanguageEntity(6L,"C")
		));
	}



}
