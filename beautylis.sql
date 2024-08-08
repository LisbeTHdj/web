-- Crear base de datos
CREATE DATABASE beauty_products_db;
USE beauty_products_db;

-- Crear tabla de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SELECT * FROM users;
-- Crear tabla de productos
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM products;

-- Insertar productos en la tabla products
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Esfoleante', 'Despierta tu piel con nuestro Exfoliante Corporal Revitalizante. Formulado con gránulos naturales, elimina las células muertas y las impurezas para una piel más suave y renovada. Infundido con ingredientes hidratantes, deja tu piel fresca, luminosa y perfectamente hidratada..', 500.00, 'Cuerpo', 'Producto1.jpg');
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Crema Hidratante', 'Descubre la suavidad y luminosidad con nuestra Crema Hidratante Revitalizante. Formulada con una mezcla única de ingredientes naturales, esta crema proporciona una hidratación profunda y duradera para tu piel. Su textura ligera se absorbe rápidamente sin dejar residuos grasos, ofreciendo un acabado sedoso y fresco.', 750.00, 'Cuerpo', 'Producto2.jpeg');
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Serum Facial', ' Enriquecido con ingredientes activos y antioxidantes, este sérum penetra profundamente para mejorar la elasticidad y luminosidad de la piel. Su fórmula ligera y de rápida absorción ayuda a reducir la apariencia de líneas finas y arrugas, proporcionando un acabado radiante y fresco. Ideal para todo tipo de piel.', 850.00, 'Cuerpo', 'Producto3.jpg');
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Mascara Facial', ' Formulada con ingredientes ricos en vitaminas y minerales, esta máscara proporciona una hidratación intensa y una profunda limpieza. Su textura cremosa se desliza suavemente sobre la piel, ayudando a reducir la apariencia de poros y dejando un rostro fresco y radiante. Ideal para rejuvenecer y restaurar la piel cansada.', 900.00, 'Cuerpo', 'Producto4.jpg');
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Gel Limpiador', '  Formulado con ingredientes suaves pero eficaces, este gel elimina impurezas y exceso de grasa sin resecar. Su fórmula ligera y espumosa deja la piel limpia, suave y con una sensación de frescura duradera. Perfecto para el uso diario, este gel limpiador mantiene el equilibrio natural de tu piel mientras la prepara para los siguientes pasos de tu rutina de cuidado.', 500.00, 'Cuerpo', 'Producto5.jpg');
INSERT INTO products (name, description, price, category, image_url)
VALUES 
('Crema Antienvejecimiento', 'Enriquecida con potentes ingredientes antiarrugas y antioxidantes, esta crema ayuda a reducir visiblemente las líneas finas y las arrugas, promoviendo una piel más firme y suave. Su fórmula rica y lujosa nutre profundamente, mejorando la elasticidad y la textura de la piel. Ideal para una rutina nocturna, ofrece resultados notables y una apariencia juvenil con el uso constante.', 1200.00, 'Cuerpo', 'Producto6.jpg');

-- Crear tabla de categorías
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT
);

-- Crear tabla de recomendaciones
CREATE TABLE recommendations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    recommendation_text TEXT,
    rating INT CHECK(rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Crear tabla de reseñas
CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    review_text TEXT,
    rating INT CHECK(rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
); 

SELECT * FROM reviews;
INSERT INTO reviews (user_id, product_id, review_text, rating)
VALUES (1, 101, 'Me encanta este producto. Es de muy buena calidad y vale cada centavo.', 5);


