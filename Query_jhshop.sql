
-- CRIA플O BASE DE DADOS --
CREATE DATABASE db_jhshop;

-- CRIA플O DAS TABELAS NA BASE DE DADOS --

-- CRIA플O DA TABELA USERS --
CREATE TABLE users(
user_id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
user_name VARCHAR(50) NOT NULL,
user_email VARCHAR(50) NOT NULL,
user_password VARCHAR(50) NOT NULL,
user_address VARCHAR(250),
user_place VARCHAR(50),
user_postal_code1 INT,
user_postal_code2 INT,
user_nif INT,
user_phone INT,
user_admin BIT NOT NULL,
);

-- CRIA플O DA TABELA CART --
CREATE TABLE cart(
cart_id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
user_id INT NOT NULL,
product_id INT NOT NULL,
product_name VARCHAR(50) NOT NULL,
product_price DECIMAL(5,2) NOT NULL,
product_size VARCHAR(3) NOT NULL,
product_color VARCHAR(10) NOT NULL,
product_brand VARCHAR(50) NOT NULL,
product_image VARCHAR(250) NOT NULL,
quantity INT NOT NULL
);

-- CRIA플O DA TABELA PRODUCT --
CREATE TABLE product(
product_id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
product_price DECIMAL(5,2) NOT NULL,
product_size VARCHAR(3) NOT NULL,
product_color VARCHAR(10) NOT NULL,
product_brand VARCHAR(50) NOT NULL,
product_image VARCHAR(250) NOT NULL
);

-- CRIA플O DA TABELA ORDERS --
CREATE TABLE orders(
order_id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
user_id INT NOT NULL,
date DATE NOT NULL,
hour TIME NOT NULL,
total_price DECIMAL(5,2) NOT NULL,
type_payment VARCHAR(50) NOT NULL,
type_delivery VARCHAR(50) NOT NULL
);

-- CRIA플O DA TABELA ORDER_PRODUCT --
CREATE TABLE order_product(
order_product_id INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
order_id INT NOT NULL,
product_id INT NOT NULL,
quantity_product INT NOT NULL,
subtotal_product DECIMAL(5,2) NOT NULL
);

-- INSER합ES DE DADOS NA BASE DE DADOS --

-- INSER플O DOS ADMINISTRADORES DA LOJA ONLINE --
INSERT INTO users VALUES
(1,'Jo? Rocha','joao.bruno86@gmail.com','2a90b3a596918190f9b265488c029462416b48c6',NULL,NULL,NULL,NULL,NULL,NULL,1),
(2,'Hugo Queir?','hhh@hhh.com','416d0653d1017e58af347295d436cfd4e41620eb',NULL,NULL,NULL,NULL,NULL,NULL,1);

-- INSER플O DE ALGUNS PRODUTOS NA LOJA ONLINE --
INSERT INTO product VALUES
(1,'Top de Senhora',24.99,'M','#321416','H&M','assets/images/shop-1.jpg'),
(2,'Camisa Homem',19.99,'L','#EFE3F1','Pull&Bear','assets/images/shop-2.jpg'),
(3,'Top de Senhora',12.99,'S','#100F31','Zara','assets/images/shop-3.jpg'),
(4,'Vestido Senhora',29.99,'L','#B7172F','Lefties','assets/images/shop-4.jpg');

-- INSER플O DE UM NOVO PRODUTO --
INSERT INTO product VALUES ($product_name, $product_price, $product_size, $product_color, $product_brand, $product_image);

-- INSER플O DE UM NOVO CARRINHO --
INSERT INTO cart VALUES ($user_id, $product_id, $product_name, $product_price, $product_size, $product_color, $product_brand, $product_image, $quantity);

-- INSER플O DE UMA NOVA ENCOMENDA --
INSERT INTO orders VALUES($userdataid, $date, $hour, $total_price, $type_payment, $type_delivery);

-- INSER플O DOS DADOS DO PRODUTO ENCOMENDADO --
INSERT INTO order_product VALUES($order_id, $product_id, $quantity_product, $subtotal_product);

-- INSER플O DE UM NOVO CLIENTE --
INSERT INTO users VALUES($user_name, $user_email, $user_password, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- INTERROGA합ES ?BASE DE DADOS --

-- SELECIONAR TODOS OS CLIENTES DA LOJA ORDENADOS PELO NUMERO DE CLIENTE --
SELECT * FROM users WHERE user_admin=0 ORDER BY user_id;

-- SELECIONAR QUANTOS CLIENTES TEM A LOJA --
SELECT COUNT(user_id) as nclients FROM users WHERE user_admin=0;

-- SELECIONAR QUANTAS ENCOMENDAS TEM A LOJA --
SELECT COUNT(order_id) as norders FROM orders;

-- SELECIONAR QUANTOS PRODUTOS TEM A LOJA --
SELECT COUNT(product_id) as nproducts FROM product;

-- SELECIONAR A ?TIMA ENCOMENDA PARA UM DETERMINADO UTILIZADOR --
SELECT TOP 1 percent order_id FROM orders WHERE user_id=$user_id ORDER BY order_id DESC;

-- SELECIONAR TUDO DAS ENCOMENDAS DE UM DETERMINADO UTILIZADOR --
SELECT * FROM orders as o LEFT JOIN users as u on o.user_id=u.user_id;

-- SELECIONAR TUDO DOS PRODUTOS POR ORDEM DE NUMERO DO PRODUTO --
SELECT * FROM product ORDER BY product_id;

-- SELECIONAR TUDO DO CARRINHO DE UM DETERMINADO UTILIZADOR --
SELECT * FROM cart WHERE user_id=$userdataid;

-- SELECIONAR TUDO DAS ENCOMENDAS JUNTADO A INFORMA플O COM A TABELAS ORDER_PRODUCT ONDE O ORDER_ID ENTRE AS TABELAS SEJA IGUAL JUNTANDO AINDA ?TABELA USERS ONDE O USER_ID SEJA IGUAL ?TABELA ORDERS E POR FIM JUNTAR ?TABELA PRODUCT ONDE O PRODUCT_ID SEJA IGUAL ?TABELA ORDER_PRODUCT PARA UMA DETERMINADA ENCOMENDA ORDENADO PELO NUMERO DA ENCOMENDA --
SELECT * FROM orders as o LEFT JOIN order_product as op on o.order_id=op.order_id LEFT JOIN users as u on o.user_id=u.user_id LEFT JOIN product as p on op.product_id=p.product_id  WHERE o.order_id=$order_id ORDER BY o.order_id  DESC;

-- SELECIONAR TUDO DA TABELA USERS DE UM DETERMINADO UTILIZADOR ATRAV S DO SEU EMAIL --
SELECT * FROM users WHERE user_email=$user_email;

-- SELECIONAR TUDO DA TABELA USERS DE UM DETERMINADO CLIENTE --
SELECT * FROM users WHERE user_email=$user_email AND user_password=$user_password AND user_admin=0;

-- SELECIONAR TUDO DA TABELA USERS DE UM DETERMINADO ADMINISTRADOR --
SELECT * FROM users WHERE user_email=$user_email AND user_password=$user_password AND user_admin=1;

-- SELECIONAR A QUANTIDADE DE UM PRODUTO DO CARRINHO DE UM DETERMINADO UTILIZADOR --
SELECT quantity FROM cart WHERE user_id=$userdataid AND product_id=$product_id AND product_price=$product_price;

-- SELECIONAR  A QUANTIDADE DE UM PRODUTO DO CARRINHO DE UM DETERMINADO UTILIZADOR --
SELECT quantity FROM cart WHERE user_id=$userdataid AND cart_id=$cart_id;

-- SELECIONAR O NUMERO DO PRODUTO, A QUANTIDADE DO PRODUTO E O PRE? DO PRODUTO DO CARRNHO DE UM DETERMINADO UTILIZADOR --
SELECT product_id, quantity, product_price FROM cart WHERE user_id=$userdataid;

-- SELECIONAR A QUANTIDADE DO PRODUTO E O PRE? DO PRODUTO DO CARRNHO DE UM DETERMINADO UTILIZADOR --
SELECT product_price, quantity FROM cart WHERE user_id=$userdataid;

-- ELIMINA플O DE DADOS NA BASE DE DADOS --

-- ELIMINA플O DO CARRINHO PARA UM DETERMINADO UTILIZADOR --
DELETE FROM cart WHERE user_id=$userdataid;

-- MODIFICA플O DE DADOS NA BASE DE DADOS --

-- MODIFICAR UM DETERMINADO UTILIZADOR --
UPDATE users SET user_name = $user_name, user_email = $user_email, user_address = $user_address, user_place = $user_place, user_postal_code1 = $user_postal_code1, user_postal_code2 = $user_postal_code2, user_nif = $user_nif, user_phone = $user_phone WHERE user_id=$user_id;

-- MODIFICAR A QUANTIDADE DE UM PRODUTO PARA UM DETERMINADO UTILIZADOR E O PRE? DO ATRIBUTO   --
UPDATE cart SET quantity=$quantity WHERE user_id=$userdataid AND product_id=$product_id AND product_price=$product_price;

-- MODIFICAR A QUANTIDADE DE UM PRODUTO PARA UM DETERMINADO UTILIZADOR E PARA UM DETERMINADO NUMERO DE CARRINHO --
UPDATE cart SET quantity=$quantity WHERE user_id=$userdataid AND cart_id=$cart_id;