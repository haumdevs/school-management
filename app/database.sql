CREATE TABLE users(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user_email VARCHAR(50),
    user_password VARCHAR(25),
    user_position VARCHAR(25)
    );

CREATE TABLE teachers (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    teacher_fname VARCHAR(25),
    teacher_lname VARCHAR(25),
    user_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE classes(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    class_name VARCHAR(25)
    
);

CREATE TABLE subjects (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    subject_name VARCHAR(25),
    teacher_id INT,
    class_id INT,
    FOREIGN KEY(teacher_id) REFERENCES teachers(id),
    FOREIGN KEY(class_id) REFERENCES classes(id)
);

CREATE TABLE homeworks (
		id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
		created_date DATE,
        due_date DATE,
        subject_id INT,
        FOREIGN KEY(subject_id) REFERENCES subjects(id)
);

CREATE TABLE students(
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    student_fname VARCHAR(25),
    student_lname VARCHAR(25),
    user_id INT,
    class_id INT,
    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(class_id) REFERENCES classes(id)
);

CREATE TABLE submissions (
	id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    submitted VARCHAR(25),
	homework_id INT,
    student_id INT,
    FOREIGN KEY(student_id) REFERENCES students(id),
    FOREIGN KEY(homework_id) REFERENCES homeworks(id)
);

