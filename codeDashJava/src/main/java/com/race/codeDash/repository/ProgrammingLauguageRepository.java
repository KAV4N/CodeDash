package com.race.codeDash.repository;

import com.race.codeDash.entity.CodeEntity;
import com.race.codeDash.entity.ProgrammingLanguageEntity;
import org.springframework.data.jpa.repository.JpaRepository;

public interface ProgrammingLauguageRepository extends JpaRepository<ProgrammingLanguageEntity, Long> {
}