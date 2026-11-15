package pl.wsb.schoolio.grade.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import pl.wsb.schoolio.grade.entity.Grade;

import java.util.List;

@Repository
public interface GradeRepository extends JpaRepository<Grade, Long> {
    List<Grade> findByStudent_AlbumNumber(String albumNumber);
    List<Grade> findBySubject_Name(String name);
}