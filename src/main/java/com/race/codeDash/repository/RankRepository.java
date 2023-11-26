package com.race.codeDash.repository;

import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.entity.RankEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface RankRepository extends JpaRepository<RankEntity, Long> {
}