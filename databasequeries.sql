CREATE TABLE crudform (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    address VARCHAR(255),
    subject VARCHAR(100),
    country VARCHAR(50),
    city VARCHAR(50),
    message TEXT,
    fileupload VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
