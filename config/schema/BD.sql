CREATE TABLE clients (
    id_client serial PRIMARY KEY NOT NULL,
    client_name varchar(200),
    client_cpf varchar(20),
    client_birthday date,
    client_phone varchar (15),
    client_email varchar (100),
    client_photo varchar(250),
    created timestamp without time zone,
    modified timestamp without time zone    
);
CREATE TABLE materials(
    id_material serial PRIMARY KEY NOT NULL,
    material_description varchar(250),
    material_quantity integer,
    material_expiration date,
    material_purchaseday date,
    created timestamp without time zone,
    modified timestamp without time zone  
);
CREATE TABLE services(
    id_service serial PRIMARY KEY NOT NULL,
    service_name varchar(250),
    price double precision,
    created timestamp without time zone,
    modified timestamp without time zone
);
CREATE TABLE services_materials(
    id serial PRIMARY KEY NOT NULL,
    service_id integer,
    material_id integer,
    created timestamp without time zone,
    modified timestamp without time zone
);
CREATE TABLE users(
    id_user serial PRIMARY KEY NOT NULL,
    user_name varchar(100),
    user_cpf varchar(15),
    user_phone varchar(15),
    email varchar(100),
    password varchar(256),
    created timestamp without time zone,
    modified timestamp without time zone
);