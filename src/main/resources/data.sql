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

-- ===== LAB 03 · student =====
insert into student (album_number, class_name, birth_date, user_account_id) values
    ('113667', '4A', '2004-05-12', 3),
    ('113500', '4A', '2004-08-21', 4),
    ('113577', '4B', '2004-11-03', 5);

-- ===== LAB 02 · grade =====
insert into grade (grade_value, weight, category, comment, issued_at, student_id, subject_id) values
    (5, 3, 'EXAM', 'Sprawdzian z algebry', '2026-11-02', 1, 1),
    (4, 2, 'QUIZ', 'Kartkówka z funkcji', '2026-11-05', 2, 1),
    (5, 1, 'HOMEWORK', 'Zadanie domowe z SQL', '2026-11-10', 3, 3);

-- ===== LAB 02 · lesson =====
insert into lesson (topic, day_of_week, lesson_hour, building, room_number, subject_id) values
    ('Równania kwadratowe', 'MONDAY', 1, 'Budynek A', '104', 1),
    ('Lektury obowiązkowe', 'TUESDAY', 3, 'Budynek B', '212', 2),
    ('Relacyjne bazy danych', 'WEDNESDAY', 2, 'Budynek C', 'Lab 15', 3);

-- ===== LAB 03 · club =====
insert into club (name, supervisor_name, meeting_day, max_members) values
    ('Koło Programistyczne', 'Jan Kowalski', 'THURSDAY', 20),
    ('Koło Matematyczne', 'Anna Nowak', 'TUESDAY', 15),
    ('Szkolny Klub Szachowy', 'Piotr Zieliński', 'FRIDAY', 16);

-- ===== LAB 03 · student_club =====
insert into student_club (club_id, student_id) values
    (1, 1),
    (1, 2),
    (2, 3);