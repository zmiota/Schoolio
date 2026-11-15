package pl.wsb.schoolio.subject.entity;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;
import pl.wsb.schoolio.grade.entity.Grade;

import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "subject")
public class Subject {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "name", nullable = false, unique = true, length = 80)
    private String name;

    @Column(name = "short_code", nullable = false, length = 10)
    private String shortCode;

    @Column(name = "description", length = 200)
    private String description;

    @Column(name = "mandatory", nullable = false)
    private Boolean mandatory;

    @OneToMany(mappedBy = "subject")
    private List<Grade> grades = new ArrayList<>();

    protected Subject() {
    }

    public Subject(String name, String shortCode, String description, Boolean mandatory) {
        this.name = name;
        this.shortCode = shortCode;
        this.description = description;
        this.mandatory = mandatory;
    }

    public Long getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getShortCode() {
        return shortCode;
    }

    public String getDescription() {
        return description;
    }

    public Boolean getMandatory() {
        return mandatory;
    }

    public List<Grade> getGrades() {
        return grades;
    }
}