create database produtoLaravel;
use produtoLaravel;

create table produtos(
	id int auto_increment primary key,
    nome varchar(100),
    quantidade int,
    preco varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE produtos 
ADD COLUMN setor_id INT,
ADD CONSTRAINT fk_produtos_setores
FOREIGN KEY (setor_id) REFERENCES Setores(id);

ALTER TABLE produtos
ADD COLUMN detalhes_id INT,
ADD CONSTRAINT fk_produtos_detalhes
FOREIGN KEY (detalhes_id) REFERENCES detalhesProduto(id);

create table Setores(
	id int auto_increment primary key,
    nome varchar(100),
    nCorredor int,
);

ALTER TABLE Setores 
ADD COLUMN created_at TIMESTAMP NULL,
ADD COLUMN updated_at TIMESTAMP NULL;

create table detalhesProduto(
	id int auto_increment primary key,
    descricao varchar(255),
    tamanho varchar(100),
    peso double,
    created_at timestamp null,
    updated_at timestamp null
    
);

select * from produtos;
select * from Setores;
select * from detalhesProduto;