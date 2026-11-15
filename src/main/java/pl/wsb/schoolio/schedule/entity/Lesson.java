package pl.wsb.schoolio.schedule.entity;

import jakarta.persistence.Column;
import jakarta.persistence.Embedded;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import pl.wsb.schoolio.subject.entity.Subject;

@Entity
@Table(name = "lesson")
public class Lesson {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "topic", nullable = false, length = 100)
    private String topic;

    @Column(name = "day_of_week", nullable = false, length = 20)
    private String dayOfWeek;

    @Column(name = "lesson_hour", nullable = false)
    private Integer lessonHour;

    @Embedded
    private ClassroomInfo classroom;

    @ManyToOne(fetch = FetchType.LAZY, optional = false)
    @JoinColumn(name = "subject_id", nullable = false)
    private Subject subject;

    protected Lesson() {
    }

    public Lesson(String topic, String dayOfWeek, Integer lessonHour, ClassroomInfo classroom, Subject subject) {
        this.topic = topic;
        this.dayOfWeek = dayOfWeek;
        this.lessonHour = lessonHour;
        this.classroom = classroom;
        this.subject = subject;
    }

    public Long getId() {
        return id;
    }

    public String getTopic() {
        return topic;
    }

    public String getDayOfWeek() {
        return dayOfWeek;
    }

    public Integer getLessonHour() {
        return lessonHour;
    }

    public ClassroomInfo getClassroom() {
        return classroom;
    }

    public Subject getSubject() {
        return subject;
    }
}