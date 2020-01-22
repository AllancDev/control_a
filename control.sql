CREATE DATABASE control_a; -- CREATE DATABASE
USE control_a; -- USE DATABASE MYSQL


-- CREATE TABLE USERS
CREATE TABLE tb_users ( 
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(32) NOT NULL,
    groups INT NOT NULL
);

-- CREATE TABLE GROUP PERMISSIONS
CREATE TABLE tb_permissions_groups (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    name VARCHAR(50) NOT NULL
);

-- CREATE TABLE PARAMS PERMISSIONS
CREATE TABLE tb_permissions_params (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    name VARCHAR(50)
);

-- CREATE TABLE CLIENTS
CREATE TABLE tb_clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    name VARCHAR(55) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(50),
    address VARCHAR(100),
    address_neight VARCHAR(100),
    address_city VARCHAR(50),
    address_state VARCHAR(50),
    address_country VARCHAR(50),
    address_zipcode VARCHAR(50),
    stars INT DEFAULT 3,
    internal_obs TEXT
);

-- CREATE TABLE INVENTORY
CREATE TABLE tb_inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    price FLOAT NOT NULL,
    quant INT NOT NULL,
    min_quant INT NOT NULL
);

-- CREATE TABLE HISTORY INVENTORY
CREATE TABLE tb_inventory_history (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    id_product INT NOT NULL,
    id_user INT NOT NULL,
    action VARCHAR(3),
    date_action DATETIME NOT NULL
);

-- CREATE TABLE SALES 
CREATE TABLE tb_sales (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    id_client INT NOT NULL,
    id_user INT NOT NULL,
    date_sale DATETIME NOT NULL,
    total_price FLOAT
);

-- CREATE PRODUCTS SALES
CREATE TABLE tb_sales_products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    id_sale INT NOT NULL,
    id_product INT NOT NULL,
    quant INT NOT NULL,
    sale_price FLOAT
);

-- CREATE TABLE PURCHASE
CREATE TABLE tb_purchases (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    id_user INT NOT NULL,
    date_purchase DATETIME NOT NULL,
    total_price FLOAT NOT NULL
);

-- CREATE TABLE PURCHASE PRODUCTS
CREATE TABLE tb_purchases_products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_company INT NOT NULL,
    id_purchase INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    quant INT NOT NULL,
    purchase_products FLOAT NOT NULL
);

-- CREATE TABLE COMPANIES
CREATE TABLE tb_companies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    doc VARCHAR(16) NOT NULL, -- CNPJ OR CPF
    name VARCHAR(100) NOT NULL
);

INSERT INTO tb_users ( id_company, email, password, groups ) VALUES ( 1, 'desenvolvimento@logfy.net.br', MD5('123'), 0); -- User teste
INSERT INTO tb_companies ( doc, name) VALUES ( '09492594978', 'LOGFY SOLUÇÕES' ); -- Companies Teste
INSERT INTO tb_purchases