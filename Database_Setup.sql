CREATE TABLE cart
(
   id int(11) NOT NULL AUTO_INCREMENT,
   customer_id int(11) NOT NULL,
   name TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   PRIMARY KEY ( id )
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE cart_item
(
   cart_id int(11) NOT NULL,
   product_id int(11) NOT NULL,
   item_qty INTEGER NOT NULL,
   PRIMARY KEY ( cart_id, product_id )
);

CREATE TABLE category
(
   id int(11) PRIMARY KEY NOT NULL,
   name TINYTEXT COLLATE utf8_unicode_ci NOT NULL
);

CREATE TABLE customer
(
   id int(11) NOT NULL AUTO_INCREMENT,
   firstname TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   lastname TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   email TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   password TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   phone TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   street TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   city TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   zipcode TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   PRIMARY KEY ( id )
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE product
(
   id int(11) NOT NULL AUTO_INCREMENT,
   customer_id int(11) NOT NULL,
   name TINYTEXT COLLATE utf8_unicode_ci NOT NULL,
   description TEXT COLLATE utf8_unicode_ci NOT NULL,
   price DECIMAL(7,2) NOT NULL,
   stock_qty int(11) NOT NULL,
   img1 MEDIUMBLOB,
   img2 MEDIUMBLOB,
   img3 MEDIUMBLOB,
   img4 MEDIUMBLOB,
   category_id int(11) NOT NULL,
   PRIMARY KEY ( id )
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE invoice
(
   customer_id int(11) NOT NULL,
   cart_id int(11) NOT NULL,
   order_date TINYTEXT COLLATE utf8_unicode_ci,
   total DECIMAL(7,2) NOT NULL,
   shipping_cost DECIMAL(7,2) NOT NULL,
   tax DECIMAL(7,2) NOT NULL,
   grand_total DECIMAL(7,2) NOT NULL,
   PRIMARY KEY( customer_id, cart_id )
);

CREATE TABLE tutor
(
   id int(11) NOT NULL AUTO_INCREMENT,
   customer_id int(11) NOT NULL, 
   product_id int(11) NOT NULL,
   name TINYTEXT COLLATE utf8_unicode_ci,
   description TEXT COLLATE utf8_unicode_ci,
   price DECIMAL(7,2) NOT NULL,
   img1 MEDIUMBLOB,
   PRIMARY KEY( id )
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE tutor ADD FOREIGN KEY ( product_id ) REFERENCES product ( id ) ON DELETE CASCADE;
