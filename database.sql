CREATE DATABASE IF NOT EXISTS electronics_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE electronics_store;

CREATE TABLE admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 username VARCHAR(80) NOT NULL UNIQUE,
 email VARCHAR(150) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL UNIQUE,
 slug VARCHAR(140) NOT NULL UNIQUE,
 description TEXT,
 image VARCHAR(500),
 active TINYINT(1) DEFAULT 1
);

CREATE TABLE products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 category_id INT NOT NULL,
 product_name VARCHAR(180) NOT NULL,
 short_description VARCHAR(255),
 description TEXT,
 price DECIMAL(12,2) NULL,
 discount_price DECIMAL(12,2) NULL,
 image VARCHAR(500),
 warranty VARCHAR(100),
 specifications JSON NULL,
 featured TINYINT(1) DEFAULT 0,
 active TINYINT(1) DEFAULT 1,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_products_category FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE RESTRICT
);

CREATE TABLE product_images (
 id INT AUTO_INCREMENT PRIMARY KEY,
 product_id INT NOT NULL,
 image VARCHAR(500) NOT NULL,
 CONSTRAINT fk_product_images_product FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE offers (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(180) NOT NULL,
 description TEXT,
 image VARCHAR(500),
 active TINYINT(1) DEFAULT 1,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE enquiries (
 id INT AUTO_INCREMENT PRIMARY KEY,
 customer_name VARCHAR(120) NOT NULL,
 phone VARCHAR(40) NOT NULL,
 email VARCHAR(150),
 address VARCHAR(255),
 message TEXT,
 status VARCHAR(50) DEFAULT 'New',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE enquiry_items (
 id INT AUTO_INCREMENT PRIMARY KEY,
 enquiry_id INT NOT NULL,
 product_id INT NOT NULL,
 quantity INT NOT NULL DEFAULT 1,
 CONSTRAINT fk_items_enquiry FOREIGN KEY(enquiry_id) REFERENCES enquiries(id) ON DELETE CASCADE,
 CONSTRAINT fk_items_product FOREIGN KEY(product_id) REFERENCES products(id) ON DELETE RESTRICT
);

CREATE TABLE contact_messages (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(150) NOT NULL,
 phone VARCHAR(40),
 subject VARCHAR(180),
 message TEXT NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE settings (
 setting_key VARCHAR(80) PRIMARY KEY,
 setting_value TEXT
);

INSERT INTO settings VALUES
('business_name','PowerLite Electronics'),
('phone','+91 XXXXX XXXXX'),
('whatsapp','+91 XXXXX XXXXX'),
('email','info@example.com'),
('address','Your Business Address, Tamil Nadu, India'),
('business_hours','Mon - Sat, 9:00 AM - 7:00 PM');

INSERT INTO categories(name,slug,description,image) VALUES
('Inverter Batteries','inverter-batteries','Reliable backup power for homes and businesses.','https://images.unsplash.com/photo-1609592424847-2f5b9c6c8d9d?w=900'),
('Solar Batteries','solar-batteries','Efficient energy storage for solar power systems.','https://images.unsplash.com/photo-1509391366360-2e959784a276?w=900'),
('Solar Lights','solar-lights','Energy-efficient lighting powered by the sun.','https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900'),
('LED Lights','led-lights','Bright, efficient and long-lasting lighting solutions.','https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?w=900'),
('Focus Lights','focus-lights','Powerful illumination for focused lighting applications.','https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=900'),
('Wall Mounted LED Lights','wall-mounted-leds','Modern lighting solutions for walls and entrances.','https://images.unsplash.com/photo-1524484485831-a92ffc0de03f?w=900');

INSERT INTO products(category_id,product_name,short_description,description,price,image,warranty,specifications,featured) VALUES
(1,'Inverter Battery 150Ah','Reliable tubular backup battery.','Sample product. Replace specifications with your actual product data.',12500,'https://images.unsplash.com/photo-1609592424847-2f5b9c6c8d9d?w=900','3 Years','{"Capacity":"150Ah","Voltage":"12V","Type":"Tubular"}',1),
(2,'Solar Battery 150Ah','Energy storage for solar systems.','Sample product. Replace specifications with actual manufacturer data.',14500,'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=900','3 Years','{"Capacity":"150Ah","Voltage":"12V","Type":"Solar"}',1),
(3,'Solar LED Street Light','Solar-powered outdoor lighting solution.','Sample product. Replace specifications with actual manufacturer data.',4500,'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900','1 Year','{"Power":"40W","IP Rating":"IP65","Type":"Solar LED"}',1),
(4,'12W LED Bulb','Efficient everyday LED lighting.','Sample product. Replace specifications with actual manufacturer data.',150,'https://images.unsplash.com/photo-1565814329452-e1efa11c5b89?w=900','1 Year','{"Power":"12W","Voltage":"230V","Type":"LED"}',1),
(5,'50W Focus Light','Powerful focused illumination.','Sample product. Replace specifications with actual manufacturer data.',1200,'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=900','1 Year','{"Power":"50W","Type":"Focus Light"}',1),
(6,'Wall Mounted LED Light','Modern decorative wall light.','Sample product. Replace specifications with actual manufacturer data.',850,'https://images.unsplash.com/photo-1524484485831-a92ffc0de03f?w=900','1 Year','{"Power":"12W","Type":"Wall Mounted LED"}',1);

INSERT INTO offers(title,description,image) VALUES
('Solar Lighting Special','Enquire today for current solar lighting prices.','https://images.unsplash.com/photo-1497440001374-f26997328c1b?w=900');

-- Default admin: username admin, password Admin@123
INSERT INTO admins(name,username,email,password_hash)
VALUES('Administrator','admin','admin@example.com','$2y$12$Unj9CdHElfX4U6WV4VFuCeK6tdz7XZD01reAkL69xpbGZQ0vupKOW');
