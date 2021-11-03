drop table if exists CATEGORIAS;

drop table if exists CIUDADES;

drop table if exists CLIENTES;

drop table if exists CLIENTESXCOMPRAS;

drop table if exists COMPRAS;

drop table if exists FACTURAS;

drop table if exists FACTURASXPRODUCTOS;

drop table if exists PRODUCTOS;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: CATEGORIAS                                            */
/*==============================================================*/
create table CATEGORIAS
(
   IDCATEGORIAS         integer not null auto_increment,
   IDPRODUCTOS          integer,
   NOMBRECATEGORIA      varchar(50),
   primary key (IDCATEGORIAS)
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES
(
   IDCIUDADES           integer not null auto_increment,
   IDCLIENTES           integer,
   CIUDAD               varchar(50) not null,
   primary key (IDCIUDADES)
);

/*==============================================================*/
/* Table: CLIENTES                                              */
/*==============================================================*/
create table CLIENTES
(
   IDCLIENTES           integer not null auto_increment,
   IDUSUARIOS           integer,
   NOMBRE               varchar(50) not null,
   APELLIDO             varchar(50) not null,
   IDENTIFICACION       varchar(13) not null,
   CELULAR              varchar(13) not null,
   DIRECCION            varchar(150) not null,
   EMAIL                varchar(50) not null,
   primary key (IDCLIENTES)
);

/*==============================================================*/
/* Table: CLIENTESXCOMPRAS                                      */
/*==============================================================*/
create table CLIENTESXCOMPRAS
(
   IDCLIENTES           integer,
   IDCOMPRAS            integer
);

/*==============================================================*/
/* Table: COMPRAS                                               */
/*==============================================================*/
create table COMPRAS
(
   IDCOMPRAS            integer not null auto_increment,
   FECHACOMPRA          date not null,
   HORACOMPRA           time not null,
   ESTADO               boolean not null,
   PRECIOFINAL          double not null,
   CODIGOCOMPRA         varchar(8),
   primary key (IDCOMPRAS)
);

/*==============================================================*/
/* Table: FACTURAS                                              */
/*==============================================================*/
create table FACTURAS
(
   IDFACTURAS           integer not null auto_increment,
   IDCOMPRAS            integer,
   NUMFACTURA           bigint not null,
   UNIDADES             int not null,
   DESCUENTO            double,
   primary key (IDFACTURAS)
);

/*==============================================================*/
/* Table: FACTURASXPRODUCTOS                                    */
/*==============================================================*/
create table FACTURASXPRODUCTOS
(
   IDPRODUCTOS          integer,
   IDFACTURAS           integer
);

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS
(
   IDPRODUCTOS          integer not null auto_increment,
   DESCRIPCIONCORTA     varchar(100) not null,
   FOTOG                longblob not null,
   FOTOP                longblob not null,
   PRECIO               double not null,
   HABILITADO           boolean not null,
   FOTOSEXTRAS          longblob,
   DESCRIPCIONLARGA     varchar(300),
   primary key (IDPRODUCTOS)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   IDUSUARIOS           integer not null auto_increment,
   USUARIO              varchar(50) not null,
   CONTRASENA           varchar(8) not null,
   PERMISOS             boolean not null,
   primary key (IDUSUARIOS)
);

alter table CATEGORIAS add constraint FK_CATEGORIASXPRODUCTOS foreign key (IDPRODUCTOS)
      references PRODUCTOS (IDPRODUCTOS) on delete restrict on update restrict;

alter table CIUDADES add constraint FK_CIUDADESXCLIENTES foreign key (IDCLIENTES)
      references CLIENTES (IDCLIENTES) on delete restrict on update restrict;

alter table CLIENTES add constraint FK_CLIENTESXUSUARIOS foreign key (IDUSUARIOS)
      references USUARIOS (IDUSUARIOS) on delete restrict on update restrict;

alter table CLIENTESXCOMPRAS add constraint FK_CLIENTES foreign key (IDCLIENTES)
      references CLIENTES (IDCLIENTES) on delete restrict on update restrict;

alter table CLIENTESXCOMPRAS add constraint FK_COMPRAS foreign key (IDCOMPRAS)
      references COMPRAS (IDCOMPRAS) on delete restrict on update restrict;

alter table FACTURAS add constraint FK_FACTURASXCOMPRAS foreign key (IDCOMPRAS)
      references COMPRAS (IDCOMPRAS) on delete restrict on update restrict;

alter table FACTURASXPRODUCTOS add constraint FK_FACTURAS foreign key (IDFACTURAS)
      references FACTURAS (IDFACTURAS) on delete restrict on update restrict;

alter table FACTURASXPRODUCTOS add constraint FK_PRODUCTOS foreign key (IDPRODUCTOS)
      references PRODUCTOS (IDPRODUCTOS) on delete restrict on update restrict;
