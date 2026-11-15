package pl.wsb.schoolio.student.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;
import pl.wsb.schoolio.student.entity.Student;

@Repository
public interface StudentRepository extends JpaRepository<Student, Long> {
}