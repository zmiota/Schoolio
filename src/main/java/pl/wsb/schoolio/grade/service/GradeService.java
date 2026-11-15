package pl.wsb.schoolio.grade.service;

import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import pl.wsb.schoolio.grade.dto.CreateGradeRequest;
import pl.wsb.schoolio.grade.entity.Grade;
import pl.wsb.schoolio.grade.entity.GradeCategory;
import pl.wsb.schoolio.grade.repository.GradeRepository;

import java.time.LocalDate;
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

    @Transactional
    public Grade createGrade(CreateGradeRequest request) {
        if (request.getValue() == null || request.getValue() < 1 || request.getValue() > 6) {
            throw new IllegalArgumentException("Ocena musi mieścić się w przedziale od 1 do 6.");
        }

        Grade grade = new Grade(
                request.getValue(),
                request.getWeight() != null ? request.getWeight() : 1,
                GradeCategory.EXAM,
                request.getComment(),
                LocalDate.now()
        );

        return gradeRepository.save(grade);
    }
}