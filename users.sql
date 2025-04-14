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

CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    service_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    duration INT NOT NULL
);