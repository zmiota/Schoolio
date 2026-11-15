# Schemat bazy danych

Plik generują reguły projektu (panel Maven → Lifecycle → verify). Nie edytujcie go ręcznie.

Tabele: 7 (w tym tabele łączące @ManyToMany: student_club) · kolumny: 35 · relacje: 3 × @ManyToOne, 2 × @OneToMany, 1 × @OneToOne, 1 × @ManyToMany

| Tabela | Encja | Kolumny | Klucze obce |
|---|---|---|---|
| club | Club | 5 | — |
| grade | Grade | 8 | student_id, subject_id |
| lesson | Lesson | 7 | subject_id |
| student | Student | 5 | user_account_id |
| subject | Subject | 5 | — |
| user_account | UserAccount | 5 | — |

```mermaid
erDiagram
    club {
        Long id PK
        Integer max_members
        String meeting_day
        String name
        String supervisor_name
    }
    grade {
        Long id PK
        GradeCategory category
        String comment
        Integer grade_value
        LocalDate issued_at
        Long student_id FK
        Long subject_id FK
        Integer weight
    }
    lesson {
        Long id PK
        String building
        String day_of_week
        Integer lesson_hour
        String room_number
        Long subject_id FK
        String topic
    }
    student {
        Long id PK
        String album_number
        LocalDate birth_date
        String class_name
        Long user_account_id FK
    }
    subject {
        Long id PK
        String description
        Boolean mandatory
        String name
        String short_code
    }
    user_account {
        Long id PK
        LocalDateTime created_at
        String display_name
        String email
        AccountRole role
    }
    club }o--o{ student : "student_club"
    student ||--o{ grade : "student_id"
    subject ||--o{ grade : "subject_id"
    subject ||--o{ lesson : "subject_id"
    user_account |o--o| student : "user_account_id"
```
