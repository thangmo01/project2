CREATE TABLE user_types
(
    id TINYINT(1) NOT NULL AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO user_types (title) VALUES 
('teacher'), 
('student');

CREATE TABLE users
(
    id INT(4) NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(254) NOT NULL,
    last_name VARCHAR(254) NOT NULL,
    user_type_id TINYINT(1) NOT NULL,
    outh_uid VARCHAR(25) NOT NULL UNIQUE,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_type_id) REFERENCES user_types(id)
);

CREATE TABLE user_teachers
(
    user_id INT NOT NULL,
    user_type_id TINYINT(1) DEFAULT 1,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (user_type_id) REFERENCES users(user_type_id)
);

CREATE TABLE user_student
(
    user_id INT NOT NULL,
    user_type_id TINYINT(1) DEFAULT 2,
    student_id VARCHAR(8) NOT NULL UNIQUE,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (user_type_id) REFERENCES users(user_type_id)
);