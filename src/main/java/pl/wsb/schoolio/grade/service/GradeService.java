package pl.wsb.schoolio.grade.service;

import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import pl.wsb.schoolio.grade.dto.CreateGradeRequest;
import pl.wsb.schoolio.grade.entity.Grade;
import pl.wsb.schoolio.grade.entity.GradeCategory;
import pl.wsb.schoolio.grade.repository.GradeRepository;
import pl.wsb.schoolio.student.entity.Student;
import pl.wsb.schoolio.student.repository.StudentRepository;
import pl.wsb.schoolio.subject.entity.Subject;
import pl.wsb.schoolio.subject.repository.SubjectRepository;

import java.time.LocalDate;
import java.util.List;

@Service
public class GradeService {

    private final GradeRepository gradeRepository;
    private final StudentRepository studentRepository;
    private final SubjectRepository subjectRepository;

    public GradeService(GradeRepository gradeRepository,
                        StudentRepository studentRepository,
                        SubjectRepository subjectRepository) {
        this.gradeRepository = gradeRepository;
        this.studentRepository = studentRepository;
        this.subjectRepository = subjectRepository;
    }

    public List<Grade> getAllGrades() {
        return gradeRepository.findAll();
    }

    @Transactional
    public Grade createGrade(CreateGradeRequest request) {
        if (request.getValue() == null || request.getValue() < 1 || request.getValue() > 6) {
            throw new IllegalArgumentException("Niepoprawna wartosc oceny (1-6)");
        }

        Student student = studentRepository.findById(request.getStudentId())
                .orElseThrow(() -> new IllegalArgumentException("Brak ucznia o podanym id"));

        Subject subject = subjectRepository.findById(request.getSubjectId())
                .orElseThrow(() -> new IllegalArgumentException("Brak przedmiotu o podanym id"));

        int weight = 1;
        if (request.getWeight() != null) {
            weight = request.getWeight();
        }

        Grade grade = new Grade(
                request.getValue(),
                weight,
                GradeCategory.EXAM,
                request.getComment(),
                LocalDate.now(),
                student,
                subject
        );

        return gradeRepository.save(grade);
    }
}