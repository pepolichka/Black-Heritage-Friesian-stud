CREATE TABLE IF NOT EXISTS viewing_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(150) NOT NULL,
    horse_interest VARCHAR(150),
    goal VARCHAR(50) NOT NULL,
    viewing_format VARCHAR(80) NOT NULL,
    preferred_date DATE NOT NULL,
    comment TEXT,
    privacy_agreement TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;