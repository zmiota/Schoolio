package pl.wsb.schoolio.grade.entity;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.EnumType;
import jakarta.persistence.Enumerated;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import pl.wsb.schoolio.student.entity.Student;
import pl.wsb.schoolio.subject.entity.Subject;

import java.time.LocalDate;

@Entity
@Table(name = "grade")
public class Grade {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "grade_value", nullable = false)
    private Integer gradeValue;

    @Column(name = "weight", nullable = false)
    private Integer weight;

    @Enumerated(EnumType.STRING)
    @Column(name = "category", nullable = false, length = 20)
    private GradeCategory category;

    @Column(name = "comment", length = 255)
    private String comment;

    @Column(name = "issued_at", nullable = false)
    private LocalDate issuedAt;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "student_id", nullable = false)
    private Student student;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "subject_id", nullable = false)
    private Subject subject;

    protected Grade() {
    }

    public Grade(Integer gradeValue, Integer weight, GradeCategory category, String comment, LocalDate issuedAt, Student student, Subject subject) {
        this.gradeValue = gradeValue;
        this.weight = weight;
        this.category = category;
        this.comment = comment;
        this.issuedAt = issuedAt;
        this.student = student;
        this.subject = subject;
    }

    public Long getId() {
        return id;
    }

    public Integer getGradeValue() {
        return gradeValue;
    }

    public Integer getWeight() {
        return weight;
    }

    public GradeCategory getCategory() {
        return category;
    }

    public String getComment() {
        return comment;
    }

    public LocalDate getIssuedAt() {
        return issuedAt;
    }

    public Student getStudent() {
        return student;
    }

    public Subject getSubject() {
        return subject;
    }
}