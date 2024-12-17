CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    username VARCHAR(50) NOT NULL,    
    email VARCHAR(100) NOT NULL,       
    password VARCHAR(255) NOT NULL,     
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);


INSERT INTO users (username, email, password)
VALUES
    ('john_doe', 'john.doe@example.com', 'password_hash_1'),
    ('jane_doe', 'jane.doe@example.com', 'password_hash_2'),
    ('alex_smith', 'alex.smith@example.com', 'password_hash_3'),
    ('emily_jones', 'emily.jones@example.com', 'password_hash_4'),
    ('michael_brown', 'michael.brown@example.com', 'password_hash_5');