# LAMP Stack

* PHP Version 7.3.8
* Apache Version 2.4
* MySQL version 8.0.17
* Redis Version latest


## Installation

```shell 
git clone 
https://github.com/cafe-chopp/php-docker-environment.git
cd php-docker-environment
docker-compose up -d
```

## Ports from services Stack

`Ports`
`apache2:8080`
`mysql:3306`

## User and password From Services
users and passwords and the paths are within .env

You can access it via `http://localhost`.


### caso ocorra erros ao conectar com banco de dados:
### entrar dentro do container do mysql e executar comandos

$ mysql -u root -p

### digite a senha cafeechopp

$ ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
$ ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';

### depois verifique se a conexao ocorreu

$ php -r "new PDO('mysql:host=mysql;dbname=api_base', 'root', 'root');"





