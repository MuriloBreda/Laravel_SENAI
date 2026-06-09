CREATE DATABASE SteelTech;
USE SteelTech;

create table producoes(
	id INT AUTO_INCREMENT PRIMARY KEY,
	nomeProduto varchar(255),
    materia varchar(255),
    dataFabricacao date,
    quantidade int,
    preco double,
    created_at timestamp null,
    updated_at timestamp null
);

select * from producoes;
