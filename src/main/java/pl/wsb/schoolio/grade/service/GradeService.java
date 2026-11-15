package pl.wsb.schoolio.grade.service;

import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;
import pl.wsb.schoolio.account.domain.UserAccount;
import pl.wsb.schoolio.account.repository.UserAccountRepository;
import pl.wsb.schoolio.grade.dto.CreateGradeRequest;
import pl.wsb.schoolio.grade.entity.Grade;
import pl.wsb.schoolio.grade.repository.GradeRepository;
import pl.wsb.schoolio.subject.entity.Subject;
import pl.wsb.schoolio.subject.repository.SubjectRepository;

import java.time.LocalDate;
import java.util.List;

@Service
public class GradeService {

    private final GradeRepository gradeRepository;
    private final UserAccountRepository userAccountRepository;
    private final SubjectRepository subjectRepository;

    public GradeService(GradeRepository gradeRepository,
                        UserAccountRepository userAccountRepository,
                        SubjectRepository subjectRepository) {
        this.gradeRepository = gradeRepository;
        this.userAccountRepository = userAccountRepository;
        this.subjectRepository = subjectRepository;
    }

    public List<Grade> getAllGrades() {
        return gradeRepository.findAll();
    }

    public List<Grade> getGradesForStudent(Long studentId) {
        return gradeRepository.findByStudentId(studentId);
    }

    @Transactional
    public Grade createGrade(CreateGradeRequest request) {
        if (request.getValue() == null || request.getValue() < 1 || request.getValue() > 6) {
            throw new IllegalArgumentException("Ocena musi mieścić się w przedziale od 1 do 6.");
        }

        UserAccount student = userAccountRepository.findById(request.getStudentId())
                .orElseThrow(() -> new IllegalArgumentException("Nie znaleziono ucznia o ID: " + request.getStudentId()));

        Subject subject = subjectRepository.findById(request.getSubjectId())
                .orElseThrow(() -> new IllegalArgumentException("Nie znaleziono przedmiotu o ID: " + request.getSubjectId()));

        Grade grade = new Grade(
                request.getValue(),
                request.getWeight() != null ? request.getWeight() : 1,
                request.getComment(),
                LocalDate.now(),
                student,
                subject
        );

        return gradeRepository.save(grade);
    }
}