package pl.wsb.schoolio.subject.entity;

import jakarta.persistence.*;

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

    protected Subject() {
    }

    public Subject(String name, String shortCode, String description, Boolean mandatory) {
        this.name = name;
        this.shortCode = shortCode;
        this.description = description;
        this.mandatory = mandatory;
    }

    public Long getId() { return id; }
    public String getName() { return name; }
    public String getShortCode() { return shortCode; }
    public String getDescription() { return description; }
    public Boolean getMandatory() { return mandatory; }
}