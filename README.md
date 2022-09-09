# Teste Lifecon

## Objetivo

Teste de avaliação back-end, Php.<br>
Empresa Lifecon.

Descrição do desafio:
- Criar o cadastro de empregados
- Criar e listar empregados relacionados a um departamento. 

## Regras

- O cadastro de empregados deverá ser composto pelo inserir, editar e excluir (CRUD); 
- A listagem de empregados deverá conter filtros por Nome Empregado e Departamento.

## Instalação

```
Clonando o projeto: (https://github.com/erichfr/teste-lifecon.git);
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
GET /api/jobs

GET /api/jobs?{job_id}=
    /api/jobs?{job_title}=
             
PUT /api/jobs/{job_id}=
POST /api/jobs/insert
DELETE /api/jobs/{job_id}=
```

Employees
```
GET /api/employees

GET /api/employees?{employees_id}=
    /api/employees?{first_name}=
    /api/employees?{last_name}=
    /api/employees?{email}=
    /api/employees?{phone_number}=
    /api/employees?{hire_date}=
    /api/employees?{job_id}=
    /api/employees?{salary}=
    /api/employees?{department_id}=
             
PUT /api/jemployees/{employees_id}
POST /api/employees/insert
DELETE /api/employees/{employees_id}=
```

Departments
```
GET /api/departments

GET /api/departments?departments_id=1
    /api/department_name?department_name=1
    /api/department_name?department_name=1
             
             
PUT /api/department_name/{department_id}
POST /api/departments/insert
DELETE /api/departments/{department_id}
```


## Tecnologias
```
- Php 7.4
- Laravel 8;
- Mysql.

```


