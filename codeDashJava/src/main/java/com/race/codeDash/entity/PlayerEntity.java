package com.race.codeDash.entity;

import jakarta.persistence.*;
import lombok.*;

import java.util.List;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor

@Entity
@Table(name = "tblPlayer")
public class PlayerEntity {
	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	private Long id;

	private String email;
	private Integer exp;
	private Integer level;

	@ManyToOne
	@JoinColumn(name = "id_rank")
	private RankEntity rank;

	@OneToMany(mappedBy = "player", cascade = CascadeType.REMOVE)
	private List<CodeEntity> codes;
}
