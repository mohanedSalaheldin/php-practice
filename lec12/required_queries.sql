
-- -----------------------------------------------------
-- إدخال بيانات تجريبية في جدول Students

INSERT INTO Students (name, birthdate, address, parent_phone_num, email)
VALUES
('Ahmed Ali', '2005-06-15', 'Cairo', '01012345678', 'ahmed@gmail.com'),
('Sara Mohamed', '2006-02-20', 'Giza', '01123456789', 'sara@gmail.com'),
('Omar Hassan', '2005-11-10', 'Alexandria', '01234567890', 'omar@gmail.com');


-- -----------------------------------------------------
-- إدخال بيانات تجريبية في جدول Instructors

INSERT INTO Instructors (name, department, salary, address, phone_num)
VALUES
('Dr. Mahmoud', 'Computer Science', 8000, 'Cairo', '01099998888'),
('Dr. Mona', 'Information Systems', 7500, 'Giza', '01188887777');


-- -----------------------------------------------------
-- تحديث البريد الإلكتروني لأحد الطلاب

UPDATE Students
SET email = 'ahmed.new@gmail.com'
WHERE name = 'Ahmed Ali';


-- -----------------------------------------------------
-- إدخال بيانات تجريبية في جدول Courses

INSERT INTO Courses (name, description, instructor_id)
VALUES
('Introduction to MySQL', 'Basics of MySQL database', 1),
('Data Structures', 'Core data structures concepts', 1),
('Web Development', 'HTML, CSS, PHP basics', 2);


-- -----------------------------------------------------
-- تسجيل طالب في كورس (إدخال سجل في جدول Enrollments)

INSERT INTO Enrollments (student_id, course_id)
VALUES (1, 1);


-- -----------------------------------------------------
-- حذف عملية تسجيل (حذف سجل من Enrollments)

DELETE FROM Enrollments
WHERE student_id = 1 AND course_id = 1;


-- -----------------------------------------------------
-- جلب عدد الطلاب الكلي في قاعدة البيانات

SELECT COUNT(*) AS total_students
FROM Students;


-- -----------------------------------------------------
-- عرض كل الطلاب المسجلين في كورس Introduction to MySQL

SELECT s.name
FROM Students s
JOIN Enrollments e ON s.id = e.student_id
JOIN Courses c ON e.course_id = c.id
WHERE c.name = 'Introduction to MySQL';


-- -----------------------------------------------------
-- عرض كل الكورسات مع اسم المدرس المسؤول (باستخدام Subquery فقط)

SELECT 
    name,
    (SELECT i.name
     FROM Instructors i
     WHERE i.id = c.instructor_id) AS instructor_name
FROM Courses c;


-- -----------------------------------------------------
-- حساب عدد الطلاب المسجلين في كل كورس

SELECT c.name, COUNT(e.student_id) AS total_students
FROM Courses c
LEFT JOIN Enrollments e ON c.id = e.course_id
GROUP BY c.id;


-- -----------------------------------------------------
-- عرض قائمة الكورسات التي سجل فيها طالب محدد (بناءً على اسمه)

SELECT c.name
FROM Courses c
JOIN Enrollments e ON c.id = e.course_id
JOIN Students s ON e.student_id = s.id
WHERE s.name = 'Ahmed Ali';


-- -----------------------------------------------------
-- عرض كل المدرسين الذين يدرّسون أكثر من كورس واحد

SELECT i.name
FROM Instructors i
JOIN Courses c ON i.id = c.instructor_id
GROUP BY i.id
HAVING COUNT(c.id) > 1;


-- -----------------------------------------------------
-- عرض الطلاب الذين لم يسجلوا في أي كورس

SELECT s.name
FROM Students s
LEFT JOIN Enrollments e ON s.id = e.student_id
WHERE e.id IS NULL;


-- -----------------------------------------------------
-- حساب عدد الكورسات التي يدرّسها كل مدرس

SELECT i.name, COUNT(c.id) AS total_courses
FROM Instructors i
LEFT JOIN Courses c ON i.id = c.instructor_id
GROUP BY i.id;


-- -----------------------------------------------------
-- حساب متوسط عدد الطلاب في الكورس الواحد

SELECT AVG(student_count) AS avg_students_per_course
FROM (
    SELECT COUNT(e.student_id) AS student_count
    FROM Courses c
    LEFT JOIN Enrollments e ON c.id = e.course_id
    GROUP BY c.id
) AS course_counts;
