create database bibliotecaLaravel;
use bibliotecaLaravel;

create table Livros(
	id int auto_increment primary key,
    nome varchar(100),
    autor varchar(100),
    descricao varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

create table Editora(
	id int auto_increment primary key,
    nome varchar(100),
    cnpj int,
    pais varchar(255),
    cidade varchar(255),
    created_at timestamp null,
    updated_at timestamp null
);

create table Detalhe(
	id int auto_increment primary key,
    custo varchar(100),
    preco_venda varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);

select * from Livros;
select * from Editora;
select * from Detalhe;