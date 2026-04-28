create database empresaLaravel;
use empresaLaravel;

create table Funcionarios(
	id int auto_increment primary key,
    nome varchar(255),
    sobrenome varchar(255),
    cargo varchar(255),
    salario varchar(100),
    email varchar(255),
    dataAdimissao date,
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE Funcionarios
ADD COLUMN departamento_id INT,
ADD CONSTRAINT fk_funcionarios_departamentos
FOREIGN KEY (departamento_id) REFERENCES Departamento(id);

create table dadosPessoais(
	id int auto_increment primary key,
    CPF varchar(14),
    RG varchar(20),
    dataNascimento date,
    CEP varchar(9),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE dadosPessoais  
ADD COLUMN funcionario_id INT,
ADD CONSTRAINT fk_dadosPessoais_funcionario
FOREIGN KEY (funcionario_id) REFERENCES Funcionarios(id);

create table Departamento(
	id int auto_increment primary key,
    setor varchar(100),
    orcamento varchar(100),
    dataCriacao date,
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE Departamento 
MODIFY COLUMN orcamento DOUBLE; 

select * from Funcionarios;
select * from dadosPessoais;
select * from Departamento;