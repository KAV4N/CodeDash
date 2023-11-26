package com.race.codeDash.repository;

import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.entity.DifficultyEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface DifficultyRepository extends JpaRepository<DifficultyEntity, Long> {
}