# Teste Lifecon

## Objetivo

Teste de avaliação back-end, Php.<br>
Empresa Lifecon.

Descrição do desafio:
- Criar o cadastro de empregado; 
- Criar listar empregados relacionados a um departamento. 

## Regras

- O cadastro de empregados deverá ser composto pelo inserir, editar e excluir (CRUD); 
- A listagem de empregados deverá conter filtros por Nome Empregado e Departamento.

## Instalação

```
Clonando o projeto: `[http://](https://github.com/erichfr/teste-lifecon.git)]`;
No terminal digite: cd teste-lifecon;
Iniciando o servidor: php artisan serve;
Gerando a key: php artisan key:generate;
Arquivo sql: \projeto-lifecon\db\db_avaliacao.sql;
Importe o arquivo db_avaliacao para o seu SGDB;
database: db_avaliacao
User: root
Pass: -
Migrando: php artisan migrate.
```

## Endpoints

Jobs
```
Retorna all: /api/jobs

Filtros:      /api/jobs?{job_id}=
              /api/jobs?{job_title}=
             
Atualizando: /api/jobs/{job_id}=
Inserindo:   /api/jobs/insert
Deletando:   /api/jobs/{job_id}=
```
Employees
```
Retorna all: /api/employees

Filtros:     /api/employees?{employees_id}=
             /api/employees?{first_name}=
             /api/employees?{last_name}=
             /api/employees?{email}=
             /api/employees?{phone_number}=
             /api/employees?{hire_date}=
             /api/employees?{job_id}=
             /api/employees?{salary}=
             /api/employees?{department_id}=
             
Atualizando: /api/jemployees/{employees_id}

Inserindo:   /api/employees/insert

Deletando:   /api/employees/{employees_id}=
```

Departments
```
Retorna all: /api/departments

Filtros:     /api/departments?departments_id=1
             /api/department_name?department_name=1
             /api/department_name?department_name=1
             
             
Atualizando: /api/department_name/{department_id}

Inserindo:   /api/departments/insert

Deletando:   /api/departments/{department_id}
```


## Tecnologias
```
- Php 7.4
- Laravel 8;
- Mysql.
```


