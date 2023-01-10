use retos;

-- Tabla configuracion
CREATE TABLE configuracion(
	numParticipantes tinyint NOT NULL
);

-- Tabla categorias
CREATE TABLE categorias(
    id tinyint AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (id),	-- PK tabla categorias
    nombre varchar(30) UNIQUE NOT NULL		-- Nombre de la categoría
);

-- Tabla profesores
CREATE TABLE profesores(
    id tinyint AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (id),	-- PK tabla profesores
    nombre varchar(30) NOT NULL,	-- Nombre del profesor
    correo varchar(100) UNIQUE NOT NULL,	-- Correo del profesor
    password varchar(255) NOT NULL		-- Contraseña del profesor
);

-- Tabla retos
CREATE TABLE retos(
    id smallint AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (id),	-- PK tabla retos
	nombre varchar(30) NOT NULL,	-- Nombre del reto
	dirigido varchar(100) NOT NULL,	-- A quién va dirigido el reto
	descripcion varchar(150) NULL,	-- Descripción del reto
	fechaInicioInscripcion date NOT NULL CHECK ((fechaInicioInscripcion < fechaFinInscripcion) 
	OR (fechaInicioInscripcion = fechaFinInscripcion)),
	fechaFinInscripcion date NOT NULL CHECK (fechaFinInscripcion > fechaInicioInscripcion),
    fechaInicioReto datetime NOT NULL CHECK ((fechaInicioReto > fechaInicioInscripcion)
	OR (fechaInicioReto = fechaInicioInscripcion)),
    fechaFinReto datetime NOT NULL CHECK (fechaFinReto > fechaInicioReto),
    fechaPublicacion timestamp NOT NULL,
	publicado bit NOT NULL,		-- Indica si el reto está publicado o no
	idProfesor tinyint NOT NULL,
	idCategoria tinyint NOT NULL,
    CONSTRAINT fk_idProfesor_profesores FOREIGN KEY (idProfesor) REFERENCES profesores (id),	-- FK tabla retos a profesores
	CONSTRAINT fk_idCategorias_categorias FOREIGN KEY (idCategoria) REFERENCES categorias(id)	-- FK tabla retos a categorias
);

-- Tabla clase
CREATE TABLE clases(
	id tinyint AUTO_INCREMENT NOT NULL,
	PRIMARY KEY (id),	-- PK tabla clases
	nombre char(6) UNIQUE NOT NULL		-- Nombre de la clase
);