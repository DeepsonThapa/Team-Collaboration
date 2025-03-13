# Team-Collaboration
Foodly

For restaurants:
CREATE DATABASE restaurants;
CREATE TABLE restaurant_table (
    id INT PRIMARY KEY AUTO_INCREMENT,
    owner_name VARCHAR(255),
    restaurant_name VARCHAR(255),
    email VARCHAR(255),
    address VARCHAR(255),
    password VARCHAR(255),
    contact_number VARCHAR(20),
    img_path VARCHAR(255),
    menu_path VARCHAR(255),
    cuisine VARCHAR(100),
    approval_status VARCHAR(50)
);
