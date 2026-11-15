-- ===== LAB 01 · user_account =====
insert into user_account (email, display_name, role, created_at) values
    ('admin@example.com', 'Admin', 'ADMIN', current_timestamp),
    ('nauczyciel@schoolio.pl', 'Jan Kowalski', 'TEACHER', current_timestamp),
    ('s798401@student.wroclaw.merito.pl', 'Kacper', 'STUDENT', current_timestamp),
    ('s264544@student.wroclaw.merito.pl', 'Bartłomiej', 'STUDENT', current_timestamp),
    ('s676916@student.wroclaw.merito.pl', 'Kateryna', 'STUDENT', current_timestamp);

-- ===== LAB 02 · subject =====
insert into subject (name, short_code, description, mandatory) values
    ('Matematyka', 'MAT', 'Algebra i geometria', true),
    ('Język polski', 'POL', 'Literatura i gramatyka', true),
    ('Informatyka', 'INF', 'Podstawy programowania i bazy danych', false);

-- ===== LAB 02 · grade =====
insert into grade (grade_value, weight, category, comment, issued_at) values
    (5, 3, 'EXAM', 'Sprawdzian z algebry', '2026-11-02'),
    (4, 2, 'QUIZ', 'Kartkówka z funkcji', '2026-11-05'),
    (5, 1, 'HOMEWORK', 'Zadanie domowe z SQL', '2026-11-10');

-- ===== LAB 02 · lesson =====
insert into lesson (topic, day_of_week, lesson_hour, building, room_number) values
    ('Równania kwadratowe', 'MONDAY', 1, 'Budynek A', '104'),
    ('Lektury obowiązkowe', 'TUESDAY', 3, 'Budynek B', '212'),
    ('Relacyjne bazy danych', 'WEDNESDAY', 2, 'Budynek C', 'Lab 15');