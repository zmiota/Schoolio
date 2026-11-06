package pl.wsb.projekt.grade.service;

import org.springframework.stereotype.Service;
import pl.wsb.projekt.grade.domain.Grade;
import pl.wsb.projekt.grade.repository.GradeRepository;

import java.util.List;

@Service
public class GradeService {

    private final GradeRepository gradeRepository;

    public GradeService(GradeRepository gradeRepository) {
        this.gradeRepository = gradeRepository;
    }

    public List<Grade> getAllGrades() {
        return gradeRepository.findAll();
    }

    public List<Grade> getGradesForStudent(Long studentId) {
        return gradeRepository.findByStudentId(studentId);
    }

    public Grade saveGrade(Grade grade) {
        return gradeRepository.save(grade);
    }
}