package pl.wsb.schoolio.club.entity;

import jakarta.persistence.*;
import pl.wsb.schoolio.student.entity.Student;

import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name = "club")
public class Club {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "name", nullable = false, unique = true, length = 80)
    private String name;

    @Column(name = "supervisor_name", nullable = false, length = 60)
    private String supervisorName;

    @Column(name = "meeting_day", nullable = false, length = 20)
    private String meetingDay;

    @Column(name = "max_members", nullable = false)
    private Integer maxMembers;

    @ManyToMany
    @JoinTable(
            name = "student_club",
            joinColumns = @JoinColumn(name = "club_id"),
            inverseJoinColumns = @JoinColumn(name = "student_id")
    )
    private Set<Student> students = new HashSet<>();

    protected Club() {
    }

    public Club(String name, String supervisorName, String meetingDay, Integer maxMembers) {
        this.name = name;
        this.supervisorName = supervisorName;
        this.meetingDay = meetingDay;
        this.maxMembers = maxMembers;
    }

    public Long getId() { return id; }
    public String getName() { return name; }
    public String getSupervisorName() { return supervisorName; }
    public String getMeetingDay() { return meetingDay; }
    public Integer getMaxMembers() { return maxMembers; }
    public Set<Student> getStudents() { return students; }
}