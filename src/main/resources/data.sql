-- Użytkownicy
insert into user_account (email, display_name, role, created_at) values
    ('admin@example.com', 'Admin', 'ADMIN', current_timestamp),
    ('nauczyciel@schoolio.pl', 'Jan Kowalski', 'TEACHER', current_timestamp),
    ('s798401@student.wroclaw.merito.pl', 'Kacper', 'STUDENT', current_timestamp),
    ('s264544@student.wroclaw.merito.pl', 'Bartłomiej', 'STUDENT', current_timestamp),
    ('s676916@student.wroclaw.merito.pl', 'Kateryna', 'STUDENT', current_timestamp);

-- Przedmioty
insert into subject (name) values
    ('Matematyka'),
    ('Język polski'),
    ('Informatyka');

-- Oceny (kolumna: grade_value, student_id: 3 to Kacper, subject_id: 1 to Matematyka, itd.)
insert into grade (grade_value, weight, comment, issued_at, student_id, subject_id) values
    (5, 3, 'Sprawdzian z algebry', current_date, 3, 1),
    (4, 2, 'Kartkówka z funkcji', current_date, 3, 1),
    (5, 4, 'Projekt z programowania', current_date, 3, 3),
    (4, 3, 'Wypracowanie', current_date, 4, 2);