-- Crear tabla Nacionalidad
CREATE TABLE Nacionalidad (
    id_nacionalidad INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) UNIQUE
);

-- Crear tabla Autores
CREATE TABLE Autores (
    id_autor INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    id_nacionalidad INT,
    otros_campos VARCHAR(255),
    FOREIGN KEY (id_nacionalidad) REFERENCES Nacionalidad(id_nacionalidad)
);

-- Crear tabla NumerosInventario
CREATE TABLE NumerosInventario (
    id_inventario INT PRIMARY KEY AUTO_INCREMENT,
    num_inventario VARCHAR(255),
    otros_campos VARCHAR(255)
);

-- Crear tabla Categorias
CREATE TABLE Categorias (
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(255),
    otros_campos VARCHAR(255)
);

-- Crear tabla Generos
CREATE TABLE Generos (
    id_genero INT PRIMARY KEY AUTO_INCREMENT,
    genero VARCHAR(255),
    otros_campos VARCHAR(255)
);

-- Crear tabla Editoriales
CREATE TABLE Editoriales (
    id_editorial INT PRIMARY KEY AUTO_INCREMENT,
    editorial VARCHAR(255),
    otros_campos VARCHAR(255)
);

-- Crear tabla Libros
CREATE TABLE Libros (
    id_libro INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    id_autor INT,
    id_inventario INT,
    id_categoria INT,
    id_genero INT,
    id_editorial INT,
    FOREIGN KEY (id_autor) REFERENCES Autores(id_autor),
    FOREIGN KEY (id_inventario) REFERENCES NumerosInventario(id_inventario),
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria),
    FOREIGN KEY (id_genero) REFERENCES Generos(id_genero),
    FOREIGN KEY (id_editorial) REFERENCES Editoriales(id_editorial)
);

-- Crear tabla Invitados
CREATE TABLE Invitados (
    id_invitado INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    dni VARCHAR(20) UNIQUE NOT NULL,
    telefono VARCHAR(20),
    correo_electronico VARCHAR(255) UNIQUE NOT NULL,
    direccion VARCHAR(255),
    fecha_nacimiento DATE,
    nombre_usuario VARCHAR(50),
    id_nacionalidad INT,
    FOREIGN KEY (id_nacionalidad) REFERENCES Nacionalidad(id_nacionalidad)
);

-- Crear tabla Prestamos
CREATE TABLE Prestamos (
    id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
    id_libro INT,
    id_invitado INT,
    fecha_prestamo DATE,
    fecha_devolucion_estimada DATE,
    FOREIGN KEY (id_libro) REFERENCES Libros(id_libro),
    FOREIGN KEY (id_invitado) REFERENCES Invitados(id_invitado)
);

-- Crear tabla Devoluciones
CREATE TABLE Devoluciones (
    id_devolucion INT PRIMARY KEY AUTO_INCREMENT,
    id_prestamo INT,
    fecha_devolucion DATE,
    FOREIGN KEY (id_prestamo) REFERENCES Prestamos(id_prestamo)
);

-- Crear tabla Administradores
CREATE TABLE Administradores (
    id_administrador INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR(50),
    contraseña VARCHAR(50),
    correo_electronico VARCHAR(255) UNIQUE NOT NULL
);

-- Insertar datos en la tabla Nacionalidad
INSERT INTO Nacionalidad (nombre) VALUES
('Colombiana'),
('Británica'),
('Rusa'),
('Japonesa'),
('Estadounidense');

-- Insertar datos en la tabla Autores
INSERT INTO Autores (nombre, apellido, id_nacionalidad, otros_campos) 
VALUES
('Gabriel', 'García Márquez', 1, 'Nobel de Literatura'),
('Jane', 'Austen', 2, NULL),
('Leo', 'Tolstoy', 3, 'Guerra y Paz'),
('Haruki', 'Murakami', 4, 'Tokio Blues'),
('Agatha', 'Christie', 2, 'Asesinato en el Orient Express'),
('Mark', 'Twain', 5, 'Las aventuras de Tom Sawyer'),
('J.K.', 'Rowling', 2, 'Harry Potter'),
('George', 'Orwell', 2, '1984'),
('Ernest', 'Hemingway', 5, 'El viejo y el mar'),
('Gabriel', 'García Márquez', 1, 'Cien años de soledad');

-- Insertar datos en la tabla NumerosInventario
INSERT INTO NumerosInventario (num_inventario) 
VALUES
('INV-001'),
('INV-002'),
('INV-003'),
('INV-004'),
('INV-005'),
('INV-006'),
('INV-007'),
('INV-008'),
('INV-009'),
('INV-010');

-- Insertar datos en la tabla Categorias
INSERT INTO Categorias (categoria) 
VALUES
('Novela'),
('Misterio'),
('Ciencia Ficción'),
('Biografía'),
('Historia'),
('Poesía'),
('Ensayo'),
('Drama'),
('Fantasía'),
('Infantil');

-- Insertar datos en la tabla Generos
INSERT INTO Generos (genero) 
VALUES
('Realismo Mágico'),
('Romance'),
('Suspense'),
('Aventura'),
('Clásico'),
('Distopía'),
('Biográfico'),
('Humor'),
('Terror'),
('Historia Alternativa');

-- Insertar datos en la tabla Editoriales
INSERT INTO Editoriales (editorial) 
VALUES
('Alfaguara'),
('Penguin Random House'),
('HarperCollins'),
('Grove Atlantic'),
('Vintage Books'),
('Simon & Schuster'),
('Penguin Classics'),
('Farrar, Straus and Giroux'),
('Scholastic Corporation'),
('Houghton Mifflin Harcourt');

-- Insertar datos en la tabla Libros
INSERT INTO Libros (titulo, id_autor, id_inventario, id_categoria, id_genero, id_editorial) 
VALUES
('Cien años de soledad', 1, 1, 1, 1, 1),
('Orgullo y prejuicio', 2, 2, 1, 2, 2),
('Guerra y Paz', 3, 3, 5, 7, 3),
('1Q84', 4, 4, 3, 6, 4),
('Asesinato en el Orient Express', 5, 5, 2, 3, 5),
('Las aventuras de Tom Sawyer', 6, 6, 1, 4, 6),
('Harry Potter y la piedra filosofal', 7, 7, 9, 9, 7),
('1984', 8, 8, 3, 6, 8),
('El viejo y el mar', 9, 9, 1, 4, 9),
('Cien años de soledad', 10, 10, 1, 1, 10);

-- Insertar datos en la tabla Invitados
INSERT INTO Invitados (nombre, apellido, dni, telefono, correo_electronico, direccion, fecha_nacimiento, nombre_usuario, id_nacionalidad) 
VALUES
('Juan', 'Pérez', '12345678A', '123456789', 'juan@example.com', 'Calle Principal 123', '1990-01-01', 'juanito', 4),
('María', 'González', '87654321B', '987654321', 'maria@example.com', 'Avenida Central 456', '1985-05-15', 'maria85', 2),
('Pedro', 'Martínez', '56781234C', '654987321', 'pedro@example.com', 'Plaza Mayor 789', '1982-09-20', 'pedro_m', 5),
('Ana', 'López', '43218765D', '369852147', 'ana@example.com', 'Paseo de Gracia 101', '1995-12-10', 'ana_lopez', 2);

-- Insertar datos en la tabla Prestamos
INSERT INTO Prestamos (id_libro, id_invitado, fecha_prestamo, fecha_devolucion_estimada) 
VALUES
(1, 1, '2024-03-01', '2024-03-15'),
(3, 2, '2024-03-03', '2024-03-17'),
(5, 3, '2024-03-05', '2024-03-19'),
(2, 4, '2024-03-07', '2024-03-21'),
(4, 1, '2024-03-09', '2024-03-23');

-- Insertar datos en la tabla Devoluciones
INSERT INTO Devoluciones (id_prestamo, fecha_devolucion) 
VALUES
(1, '2024-03-16'),
(3, '2024-03-20'),
(5, '2024-03-24');

-- Insertar datos en la tabla Administradores
INSERT INTO Administradores (usuario, contraseña, correo_electronico)
VALUES
('admin', 'admin123', 'admin@example.com');
