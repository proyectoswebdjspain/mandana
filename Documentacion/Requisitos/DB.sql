CREATE TABLE categorias (
	id_categoria INTEGER(2) NOT NULL auto_increment,
	categoria VARCHAR(50) NOT NULL,
	PRIMARY KEY (id_categoria)
);

INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('1','Carcasas');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('2','Cojines');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('3','Tazas');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('4','Textil');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('5','Otros Productos');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('6','Mandana Wear');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`) VALUES ('7','Mandana CMYK');

CREATE TABLE sub_categorias (
	id_sub_categoria INTEGER(3) NOT NULL auto_increment,
	id_categoria INTEGER(2) NOT NULL,
	sub_categoria VARCHAR(50) NOT NULL,
	PRIMARY KEY (id_sub_categoria),
	CONSTRAINT FK_id_categoria FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria) on delete cascade
);

INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`) VALUES ('1', '1', 'Personaliza tu Carcasa');
INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`) VALUES ('2', '1', 'Diseños Mandana');

CREATE TABLE opciones (
	id_opcion INTEGER(5) NOT NULL auto_increment,
	id_sub_categoria INTEGER(2) NOT NULL,
	opcion VARCHAR(50) NOT NULL,
	estado INTEGER(1) NOT NULL,
	PRIMARY KEY (id_opcion),
	CONSTRAINT FK_id_sub_categoria FOREIGN KEY (id_sub_categoria) REFERENCES sub_categorias (id_sub_categoria) on delete cascade
);

INSERT INTO `mandana`.`opciones` (`id_opcion`, `id_sub_categoria`, `opcion`, `estado`) VALUES ('1', '1', 'HTC', '1');

CREATE TABLE productos (
	id_producto INTEGER(10) NOT NULL auto_increment,
	id_categoria INTEGER(2) NOT NULL,
	id_sub_categoria INTEGER(2) NOT NULL,
	id_opcion INTEGER(5) NOT NULL,	
	nombre_producto VARCHAR(255) NOT NULL,
	referencia VARCHAR(100),
	precio_base INTEGER(6),
	precio_final INTEGER(7),
	cantidad INTEGER(10),
	estado INTEGER(2),
	detalles VARCHAR(5000),
	material VARCHAR(30),
	tipo VARCHAR(30),
	stock INTEGER(20),
	PRIMARY KEY (id_producto),
	CONSTRAINT FK_id_sub_categoria2 FOREIGN KEY (id_sub_categoria) REFERENCES sub_categorias (id_sub_categoria) on UPDATE CASCADE,
	CONSTRAINT FK_id_opcion FOREIGN KEY (id_opcion) REFERENCES opciones (id_opcion) on UPDATE CASCADE,
	CONSTRAINT FK_id_categoria2 FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria) on UPDATE CASCADE
);

CREATE TABLE imagenes (
	id_foto INTEGER(30) NOT NULL auto_increment,
	id_producto INTEGER(10) NOT NULL,
	foto 
	titulo VARCHAR(100) NOT NULL,
	tipo VARCHAR(10) NOT NULL,
	tamanio INTEGER(200) NOT NULL,
	
);

CREATE TABLE tallas (
	id_talla INTEGER(10) NOT NULL auto_increment,
	id_producto
);

CREATE TABLE colores (
	id_colot INTEGER(10) NOT NULL auto_increment,
	id_producto
	nombre_color
);





























