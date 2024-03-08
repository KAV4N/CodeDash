package com.race.codeDash.repository;

import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.entity.RaceStatsEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface RaceStatsRepository extends JpaRepository<RaceStatsEntity, Long> {
}