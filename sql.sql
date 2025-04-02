

create database Sysfero ;
use Sysfero ;
CREATE TABLE usuarios (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

CREATE TABLE devices (

    device_id INT AUTO_INCREMENT PRIMARY KEY,
    device_name VARCHAR(100) NOT NULL,
    device_type VARCHAR(50) NOT NULL,
    ip_address VARCHAR(15) NOT NULL,
    gateway VARCHAR(15) NOT NULL,
    mascara VARCHAR(15) NOT NULL,
    last_connected DATETIME default current_timestamp,
    status ENUM('online', 'offline') NOT NULL,
    ssh_key TEXT,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE backups (
    backup_id INT AUTO_INCREMENT PRIMARY KEY,
    cloud_url VARCHAR(255) NOT NULL,
    time DATETIME NOT NULL,
    device_id INT NOT NULL,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE
);

CREATE TABLE logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    device_id INT NOT NULL,
    action TEXT NOT NULL,
    time DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id) ON DELETE CASCADE,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE
);

CREATE TABLE conecciones (
    connection_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    device_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES usuarios(user_id) ON DELETE CASCADE,
    FOREIGN KEY (device_id) REFERENCES devices(device_id) ON DELETE CASCADE
);