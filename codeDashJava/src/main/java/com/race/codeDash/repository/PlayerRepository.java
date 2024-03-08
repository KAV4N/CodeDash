package com.race.codeDash.repository;

import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.entity.PlayerEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface PlayerRepository extends JpaRepository<PlayerEntity, Long> {
}