package pl.wsb.schoolio.grade.entity;

import jakarta.persistence.*;
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

    protected Grade() {
    }

    public Grade(Integer gradeValue, Integer weight, GradeCategory category, String comment, LocalDate issuedAt) {
        this.gradeValue = gradeValue;
        this.weight = weight;
        this.category = category;
        this.comment = comment;
        this.issuedAt = issuedAt;
    }

    public Long getId() { return id; }
    public Integer getGradeValue() { return gradeValue; }
    public Integer getWeight() { return weight; }
    public GradeCategory getCategory() { return category; }
    public String getComment() { return comment; }
    public LocalDate getIssuedAt() { return issuedAt; }
}