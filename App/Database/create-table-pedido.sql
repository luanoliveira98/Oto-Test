CREATE TABLE IF NOT EXISTS pedido (
  order_id bigint(20) NOT NULL PRIMARY KEY,
  order_date datetime NOT NULL,
  product_sku varchar(12) NOT NULL,
  size varchar(2) NOT NULL,
  color varchar(20) NOT NULL,
  quantity varchar(3) NOT NULL,
  price varchar(7) not NULL
);

SHOW CREATE TABLE pedido

-- Acabei encontrando dois problemas ao tentar inserir os dados do anexo:
-- 1. Algumas order_date com a data 29/02/2021, sendo que esse ano não foi bissexto;
-- 2. Alguns pedidos estão com a cor CAFE, porem com um possivel erro de exportação do UTF-8 devido a acentuação no É, por isso estão tentando ser inseridas como "CAF�"