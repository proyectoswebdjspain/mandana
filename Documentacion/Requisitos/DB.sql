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

INSERT INTO `mandana`.`sub_categorias` (`id_sub_categoria`, `id_categoria`, `sub_categoria`) VALUES ('1', '1', 'Marcas');

CREATE TABLE opciones (
	id_opcion INTEGER(5) NOT NULL auto_increment,
	id_sub_categoria INTEGER(2) NOT NULL,
	opcion VARCHAR(50) NOT NULL,
	estado INTEGER(1) NOT NULL,
	PRIMARY KEY (id_opcion),
	CONSTRAINT FK_id_sub_categoria FOREIGN KEY (id_sub_categoria) REFERENCES sub_categorias (id_sub_categoria) on delete cascade
);

INSERT INTO `mandana`.`opciones` (`id_opcion`, `id_sub_categoria`, `opcion`) VALUES ('1', '1', 'HTC', '1');



