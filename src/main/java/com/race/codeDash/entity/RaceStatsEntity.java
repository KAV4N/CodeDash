package com.race.codeDash.entity;

import jakarta.persistence.*;
import lombok.*;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor

@Entity
@Table(name = "tbl_race_stats")
public class RaceStatsEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	@ManyToOne
	@JoinColumn(name = "player_id")
	private PlayerEntity player;

	@ManyToOne
	@JoinColumn(name = "code_id")
	private CodeEntity code;

	private Integer wpm;

	private String timeLeft;

	private Integer accuracy;
}



