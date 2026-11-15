package pl.wsb.schoolio.schedule.entity;

import jakarta.persistence.*;

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

    protected Lesson() {
    }

    public Lesson(String topic, String dayOfWeek, Integer lessonHour, ClassroomInfo classroom) {
        this.topic = topic;
        this.dayOfWeek = dayOfWeek;
        this.lessonHour = lessonHour;
        this.classroom = classroom;
    }

    public Long getId() { return id; }
    public String getTopic() { return topic; }
    public String getDayOfWeek() { return dayOfWeek; }
    public Integer getLessonHour() { return lessonHour; }
    public ClassroomInfo getClassroom() { return classroom; }
}