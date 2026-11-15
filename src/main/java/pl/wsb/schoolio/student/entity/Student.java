package pl.wsb.schoolio.student.entity;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.OneToMany;
import jakarta.persistence.OneToOne;
import jakarta.persistence.Table;
import pl.wsb.schoolio.account.domain.UserAccount;
import pl.wsb.schoolio.grade.entity.Grade;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.List;

@Entity
@Table(name = "student")
public class Student {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "album_number", nullable = false, unique = true, length = 20)
    private String albumNumber;

    @Column(name = "class_name", nullable = false, length = 20)
    private String className;

    @Column(name = "birth_date", nullable = false)
    private LocalDate birthDate;

    @OneToOne(fetch = FetchType.LAZY)
    @JoinColumn(name = "user_account_id", unique = true)
    private UserAccount account;

    @OneToMany(mappedBy = "student")
    private List<Grade> grades = new ArrayList<>();

    protected Student() {
    }

    public Student(String albumNumber, String className, LocalDate birthDate, UserAccount account) {
        this.albumNumber = albumNumber;
        this.className = className;
        this.birthDate = birthDate;
        this.account = account;
    }

    public Long getId() {
        return id;
    }

    public String getAlbumNumber() {
        return albumNumber;
    }

    public String getClassName() {
        return className;
    }

    public LocalDate getBirthDate() {
        return birthDate;
    }

    public UserAccount getAccount() {
        return account;
    }

    public List<Grade> getGrades() {
        return grades;
    }
}