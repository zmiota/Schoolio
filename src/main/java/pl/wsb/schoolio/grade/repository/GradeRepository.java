package pl.wsb.schoolio.grade.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import pl.wsb.schoolio.grade.entity.Grade;

@Repository
public interface GradeRepository extends JpaRepository<Grade, Long> {
}