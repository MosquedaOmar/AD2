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
CREATE TABLE usuarios (
    id_usuarios INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    dni VARCHAR(20) UNIQUE NOT NULL,
    telefono VARCHAR(20) UNIQUE,
    correo_electronico VARCHAR(255) UNIQUE NOT NULL,
    direccion VARCHAR(255),
    fecha_nacimiento DATE,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    contraseña VARCHAR(150)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear tabla Prestamos
CREATE TABLE Prestamos (
    id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
    id_libro INT,
    id_usuarios INT,
    fecha_prestamo DATE,
    fecha_devolucion_estimada DATE,
    FOREIGN KEY (id_libro) REFERENCES Libros(id_libro),
    FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios)
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
    usuario VARCHAR(50) UNIQUE,
    contraseña VARCHAR(150),
    correo_electronico VARCHAR(255) UNIQUE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;