package com.race.codeDash.entity;

import jakarta.persistence.*;
import lombok.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor

@Entity
@Table(name = "tblCode")
public class CodeEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	@Column(length = 1000)
	private String snippet;

	@ManyToOne
	@JoinColumn(name = "player_id")
	private PlayerEntity player;

	@ManyToOne
	@JoinColumn(name = "difficulty_id")
	private DifficultyEntity difficulty;

	@ManyToOne
	@JoinColumn(name = "languageName_id")
	private ProgrammingLanguageEntity programmingLanguage;

}
