CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,  
    username VARCHAR(50) NOT NULL,    
    email VARCHAR(100) NOT NULL,       
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',     
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
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    duration INT NOT NULL
);

ALTER TABLE users
ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user';

INSERT INTO services (service_name, description, category, price, duration) VALUES
('Network Vulnerability Scan', 'Comprehensive scan to identify vulnerabilities in your network infrastructure.', 'IT Security', 149.99, 60),
('Web Application Penetration Testing', 'Manual and automated testing of web applications for security flaws.', 'IT Security', 249.99, 120),
('Phishing Simulation & Training', 'Simulated phishing attacks and awareness training for employees.', 'IT Security', 99.99, 45),
('Firewall & Intrusion Detection Setup', 'Installation and configuration of firewalls and IDS/IPS systems.', 'IT Security', 179.99, 90),
('Security Policy Review & Consultation', 'Assessment and optimization of your organization’s security policies.', 'IT Security', 129.99, 60);
