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

drop table products;
create table products(
	id int not null auto_increment,
	primary key(id),
	created datetime,
	modified datetime,
	prodtype varchar(255), -- either Product or Service depending on API call
	-- no good way to get this yet...
	img varchar(40),
	
	-- direct copy of MINDBODY GetProducts response
	-- this is returned just as 'ID' but uniqueness isn't supported
	barcodeID int,
	Price float,
	TaxRate float,
	GroupID int,
	Name varchar(255),
	OnlinePrice float,
	ShortDesc text,
	LongDesc text,
	-- color and size return as arrays, skipping until needed
	-- Color varchar(255),
	-- `Size` varchar(255),
	
	-- for convenience, added via Controller
	CategoryID int,
	CategoryName varchar(255)
);


-- the site settings are here
drop table firearms;
create table firearms(
	id int not null auto_increment,
	primary key(id),
	created datetime,
	modified datetime,
	name varchar(255),
	setting_value varchar(255),
	setting_date_value datetime
	
);