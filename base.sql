drop table if exists CATEGORIAS;

drop table if exists CIUDADES;

drop table if exists CLIENTES;

drop table if exists CLIENTESXCOMPRAS;

drop table if exists COMPRAS;

drop table if exists COMPRASXPRODUCTOS;

drop table if exists PRODUCTOS;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: CATEGORIAS                                            */
/*==============================================================*/
create table CATEGORIAS
(
   IDCATEGORIA          integer not null auto_increment,
   NOMBRECATEGORIA      varchar(50),
   primary key (IDCATEGORIA)
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES
(
   IDCIUDAD             integer not null auto_increment,
   CIUDAD               varchar(50) not null,
   primary key (IDCIUDAD)
);

/*==============================================================*/
/* Table: CLIENTES                                              */
/*==============================================================*/
create table CLIENTES
(
   IDCLIENTE            integer not null auto_increment,
   IDCIUDAD             integer,
   NOMBRE               varchar(50) not null,
   APELLIDO             varchar(50) not null,
   IDENTIFICACION       varchar(13) not null,
   CELULAR              varchar(13) not null,
   DIRECCION            varchar(150) not null,
   EMAIL                varchar(50) not null,
   primary key (IDCLIENTE)
);

/*==============================================================*/
/* Table: CLIENTESXCOMPRAS                                      */
/*==============================================================*/
create table CLIENTESXCOMPRAS
(
   IDCLIENTE            integer,
   IDCOMPRA             integer
);

/*==============================================================*/
/* Table: COMPRAS                                               */
/*==============================================================*/
create table COMPRAS
(
   IDCOMPRA             integer not null auto_increment,
   FECHACOMPRA          date not null,
   HORACOMPRA           time not null,
   ESTADO               bool not null,
   PRECIOFINAL          double,
   CODIGOCOMPRA         varchar(8),
   NUMFACTURA           varchar(11),
   UNIDADES             int,
   DESCUENTO            double,
   primary key (IDCOMPRA)
);

/*==============================================================*/
/* Table: COMPRASXPRODUCTOS                                     */
/*==============================================================*/
create table COMPRASXPRODUCTOS
(
   IDPRODUCTO           integer,
   IDCOMPRA             integer
);

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS
(
   IDPRODUCTO           integer not null auto_increment,
   IDCATEGORIA          integer,
   DESCRIPCIONCORTA     varchar(100) not null,
   FOTOG                longblob not null,
   FOTOP                longblob not null,
   PRECIO               double not null,
   HABILITADO           bool not null,
   FOTOSEXTRAS          longblob,
   DESCRIPCIONLARGA     varchar(300),
   primary key (IDPRODUCTO)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   IDUSUARIO            integer not null auto_increment,
   IDCLIENTE            integer,
   USUARIO              varchar(50) not null,
   CONTRASENA           varchar(8) not null,
   PERMISOS             bool not null,
   primary key (IDUSUARIO)
);

alter table CLIENTES add constraint FK_CIUDADESXCLIENTES foreign key (IDCIUDAD)
      references CIUDADES (IDCIUDAD) on delete restrict on update restrict;

alter table CLIENTESXCOMPRAS add constraint FK_CLIENTES foreign key (IDCLIENTE)
      references CLIENTES (IDCLIENTE) on delete restrict on update restrict;

alter table CLIENTESXCOMPRAS add constraint FK_COMPRAS foreign key (IDCOMPRA)
      references COMPRAS (IDCOMPRA) on delete restrict on update restrict;

alter table COMPRASXPRODUCTOS add constraint FK_COMPRAS foreign key (IDCOMPRA)
      references COMPRAS (IDCOMPRA) on delete restrict on update restrict;

alter table COMPRASXPRODUCTOS add constraint FK_PRODUCTOS foreign key (IDPRODUCTO)
      references PRODUCTOS (IDPRODUCTO) on delete restrict on update restrict;

alter table PRODUCTOS add constraint FK_CATEGORIASXPRODUCTOS foreign key (IDCATEGORIA)
      references CATEGORIAS (IDCATEGORIA) on delete restrict on update restrict;

alter table USUARIOS add constraint FK_CLIENTESXUSUARIOS foreign key (IDCLIENTE)
      references CLIENTES (IDCLIENTE) on delete restrict on update restrict;
