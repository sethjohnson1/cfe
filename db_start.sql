drop table firearms;
create table firearms(
	id int not null auto_increment,
	primary key(id),
	name varchar(100),
	created datetime,
	modified datetime,
	slug varchar(40),
	visible tinyint(1),
	img varchar(40),
	metatitle varchar(200),
	metadescription varchar(200),
	content text,
	cost int
);

drop table webpages;
create table webpages(
	id int not null auto_increment,
	primary key(id),
	name varchar(100),
	created datetime,
	modified datetime,
	slug varchar(40),
	visible tinyint(1),
	img varchar(40),
	metatitle varchar(200),
	metadescription varchar(200),
	content text
);

drop table packages;
create table packages(
	id int not null auto_increment,
	primary key(id),
	name varchar(100),
	created datetime,
	modified datetime,
	slug varchar(40),
	visible tinyint(1),
	img varchar(40),
	metatitle varchar(200),
	metadescription varchar(200),
	content text,
	cost int
);

drop table customers;
create table customers(
	id int not null auto_increment,
	primary key(id),
	created datetime,
	modified datetime,
	firstname varchar(100),
	lastname varchar(100),
	address1 varchar(200),
	address2 varchar(200),
	city varchar(200),
	usstate varchar(200),
	country varchar(200),
	notes text
);

drop table orders;
create table orders(
	id int not null auto_increment,
	primary key(id),
	name varchar(100),
	created datetime,
	modified datetime,
	slug varchar(40),
	complete tinyint(1),
	notes text,
	total int
);

create table firearms_packages(
	id int not null auto_increment,
	primary key(id),
	firearm_id int,
	package_id int
);

create table orders_packages(
	id int not null auto_increment,
	primary key(id),
	order_id int,
	package_id int
);

create table firearms_orders(
	id int not null auto_increment,
	primary key(id),
	firearm_id int,
	order_id int
);
create table customers_orders(
	id int not null auto_increment,
	primary key(id),
	customer_id int,
	order_id int
);