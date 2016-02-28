CREATE TABLE categorias (
	id_categoria INTEGER(2) NOT NULL auto_increment,
	categoria VARCHAR(50) NOT NULL,
	descripcion VARCHAR(1000),
	PRIMARY KEY (id_categoria)
);

INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('1','Carcasas','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('2','Cojines','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('3','Tazas','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('4','Textil','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('5','Otros Productos','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('6','Mandana Wear','');
INSERT INTO `mandana`.`categorias`(`id_categoria`, `categoria`, `descripcion`) VALUES ('7','Mandana CMYK','');

CREATE TABLE sub_categorias (
	id_sub_categoria INTEGER(3) NOT NULL auto_increment,
	id_categoria INTEGER(2) NOT NULL,
	id_imagen INTEGER(20),
	sub_categoria VARCHAR(50) NOT NULL,
	descripcion VARCHAR(1000),
	visibilidad INTEGER(1) NOT NULL,
	PRIMARY KEY (id_sub_categoria),
	CONSTRAINT FK_id_categoria FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria) on update cascade
);

INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`, `descripcion`, `visibilidad`) VALUES ('1', '1', 'Personaliza tu Carcasa', '', '1');
INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`, `descripcion`, `visibilidad`) VALUES ('2', '1', 'Diseños Mandana', '', '0');

CREATE TABLE opciones (
	id_opcion INTEGER(5) NOT NULL auto_increment,
	id_sub_categoria INTEGER(2) NOT NULL,
	opcion VARCHAR(50) NOT NULL,
	descripcion VARCHAR(1000),
	estado INTEGER(1) NOT NULL,
	PRIMARY KEY (id_opcion),
	CONSTRAINT FK_id_sub_categoria FOREIGN KEY (id_sub_categoria) REFERENCES sub_categorias (id_sub_categoria) on update cascade
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
	iva INTEGER(2),
	cantidad INTEGER(10),
	estado INTEGER(2),
	detalles VARCHAR(5000),
	material VARCHAR(30),
	tipo VARCHAR(30),
	stock INTEGER(20),
	disponibilidad INTEGER(2),
	imagene VARCHAR(500),
	PRIMARY KEY (id_producto),
	CONSTRAINT FK_id_sub_categoria2 FOREIGN KEY (id_sub_categoria) REFERENCES sub_categorias (id_sub_categoria) on UPDATE CASCADE,
	CONSTRAINT FK_id_opcion FOREIGN KEY (id_opcion) REFERENCES opciones (id_opcion) on UPDATE CASCADE,
	CONSTRAINT FK_id_categoria2 FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria) on UPDATE CASCADE
);

CREATE TABLE imagenes (
	id_foto INTEGER(30) NOT NULL auto_increment,
	titulo VARCHAR(100) NOT NULL,
	tipo VARCHAR(10) NOT NULL,
	tamanio INTEGER(200) NOT NULL,
	posicion VARCHAR(20),
	url VARCHAR(255) NOT NULL,
	PRIMARY KEY (id_foto)
);

CREATE TABLE tallas (
	id_talla INTEGER(10) NOT NULL auto_increment,
	id_producto
);

CREATE TABLE colores (
	id_color INTEGER(10) NOT NULL auto_increment,
	id_producto
	nombre_color
);

CREATE TABLE impuestos (
	id_imp INTEGER(5) NOT NULL auto_increment,
	valor INTEGER(2) NOT NULL,
	PRIMARY KEY (id_imp)
);

INSERT INTO `mandana`.`impuestos`(`id_imp`, `valor`) VALUES ('1','8');
INSERT INTO `mandana`.`impuestos`(`id_imp`, `valor`) VALUES ('2','10');
INSERT INTO `mandana`.`impuestos`(`id_imp`, `valor`) VALUES ('3','21');

CREATE TABLE slider (
	id_slider INTEGER(10) NOT NULL auto_increment,
	nombre_slider VARCHAR(30),
	descripcion VARCHAR(500),
	estado INTEGER(2),
	
);























