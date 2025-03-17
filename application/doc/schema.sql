-- create database aims; use aims;

create table admins(
  id integer not null primary key auto_increment,
  username varchar(255),
  password varchar(255),
  email varchar(255)
);

create table students(
  id integer not null primary key auto_increment,
  code varchar(255),
  last_name varchar(255),
  first_name varchar(255),
  middle_name varchar(255),
  address varchar(255),
  phone varchar(255),
  email varchar(255),
  parent_contact_number varchar(255),
  password varchar(255)
);

create table timesheets(
  id integer not null primary key auto_increment,
  student_id integer,
  in_out integer,
  date datetime
);

create table messages(
  id integer not null primary key auto_increment,
  message_to varchar(255),
  message_from varchar(255),
  subject varchar(255),
  body varchar(255)
);

alter table messages add status integer;
alter table students add image_url varchar(255);
alter table students add secret_key varchar(255);
