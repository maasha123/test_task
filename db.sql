-- Из консоли это запускается вот так:
-- source .../db.sql;
-- вместо ... путь до файла

drop database shop;

create database shop;
use shop;

create table products(
    id int not null auto_increment,
    sku varchar(20) not null,
    name varchar(255) not null,
    price float not null,
    type varchar(20) not null,
    weight float,
    size float,
    length float,
    width float,
    height float,
    primary key(id)
);

-- Books
insert into products(sku, name, price, type, weight) values('978-1-60309-452-8', 'The Lord of the Rings', '19.99', 'book', '1');
insert into products(sku, name, price, type, weight) values('978-1-60309-459-7', 'Harry Potter and the Philosopher''s Stone', '9.99', 'book', '1');
insert into products(sku, name, price, type, weight) values('978-1-60309-444-3', 'Harry Potter and the Chamber of Secrets', '9.99', 'book', '1');

-- DVDs
insert into products(sku, name, price, type, size) values('978-1-60309-461-0', 'Harry Potter and the Prisoner of Azkaban', '12.99', 'dvd', '1');
insert into products(sku, name, price, type, size) values('978-1-60309-454-5', 'Harry Potter and the Goblet of Fire', '12.99', 'dvd', '1');
insert into products(sku, name, price, type, size) values('978-1-60309-455-3', 'Harry Potter and the Order of the Phoenix', '12.99', 'dvd', '1');

-- Furniture
insert into products(sku, name, price, type, length, width, height) values('978-1-60309-462-5', 'Coffee Table', '199.99', 'furniture', '1', '1', '1');
insert into products(sku, name, price, type, length, width, height) values('978-1-60309-463-3', 'Chair', '99.99', 'furniture', '1', '1', '1');
insert into products(sku, name, price, type, length, width, height) values('978-1-60309-464-1', 'Dining Table', '299.99', 'furniture', '1', '1', '1');
