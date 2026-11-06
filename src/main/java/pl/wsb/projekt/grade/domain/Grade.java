package pl.wsb.projekt.grade.domain;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import pl.wsb.projekt.account.domain.UserAccount;
import pl.wsb.projekt.subject.domain.Subject;

import java.time.LocalDate;

@Entity
@Table(name = "grade")
public class Grade {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

  @Column(name = "grade_value", nullable = false)
    private Integer value;
    
    @Column(nullable = false)
    private Integer weight;

    @Column(length = 255)
    private String comment;

    @Column(name = "issued_at", nullable = false)
    private LocalDate issuedAt;

    @ManyToOne(optional = false)
    @JoinColumn(name = "student_id", nullable = false)
    private UserAccount student;

    @ManyToOne(optional = false)
    @JoinColumn(name = "subject_id", nullable = false)
    private Subject subject;

    public Grade() {
    }

    public Grade(Integer value, Integer weight, String comment, LocalDate issuedAt, UserAccount student, Subject subject) {
        this.value = value;
        this.weight = weight;
        this.comment = comment;
        this.issuedAt = issuedAt;
        this.student = student;
        this.subject = subject;
    }

    public Long getId() {
        return id;
    }

    public Integer getValue() {
        return value;
    }

    public void setValue(Integer value) {
        this.value = value;
    }

    public Integer getWeight() {
        return weight;
    }

    public void setWeight(Integer weight) {
        this.weight = weight;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }

    public LocalDate getIssuedAt() {
        return issuedAt;
    }

    public void setIssuedAt(LocalDate issuedAt) {
        this.issuedAt = issuedAt;
    }

    public UserAccount getStudent() {
        return student;
    }

    public void setStudent(UserAccount student) {
        this.student = student;
    }

    public Subject getSubject() {
        return subject;
    }

    public void setSubject(Subject subject) {
        this.subject = subject;
    }
}