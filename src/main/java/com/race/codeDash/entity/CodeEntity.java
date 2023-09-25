package com.race.codeDash.entity;

import jakarta.persistence.*;
import lombok.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor

@Entity
@Table(name = "code")
public class CodeEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	private String snippet;

	@ManyToOne
	@JoinColumn(name = "player_id")
	private PlayerEntity player;

	@ManyToOne
	@JoinColumn(name = "difficulty_id")
	private DifficultyEntity difficulty;
}
