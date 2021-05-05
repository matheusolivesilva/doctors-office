# Doctor's Office
This Symfony API manages doctor's office. Can be used for a software which needs to: create, maintain and/or generate data about doctors and its specialities.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
What things you need to do to run the software:
* PHP 7.4 or greater
* Composer 1.9.0
* MySQL Database 8.0.23 
* Symfony Framework 4.4.21


### Installing and using with Docker
1. First of all, you must to have docker installed in your machine ([follow the steps in documentation](https://docs.docker.com/get-docker/))
2. Clone this repo to your local enviroment 
```bash 
$ git clone https://github.com/matheusolivesilva/doctors-office.git
```
3. Run ```$ docker-compose up ``` and access [http://localhost:8080](http://localhost:8080)


### Installing and using with shellscript
1. Clone this repo to your local enviroment 
```bash 
$ git clone https://github.com/matheusolivesilva/doctors-office.git
```
2. Run in the command line ```$ ./prepareapp.sh ```
3. Use the command ```$ php -S localhost:yourPortHere ``` to run the API 
4. Access using the address in the last step and test the API 

### Installing and using Manually
1. Clone this repo to your local enviroment 
```bash 
$ git clone https://github.com/matheusolivesilva/doctors-office.git
```
2. Install the dependencies with ```$ composer install ```
3. Create database with doctrine running ```$ php bin/console doctrine:database:create ``` (remember to use "\\" instead of "/" on Windows)
4. Run the migrations to create the tables with ```$ php bin/console doctrine:migrations:migrate --no-interaction ```
5. Use the command ```$ php -S localhost:yourPortHere ``` to run the API
5. Access using the address in the last step and test the API

## REST API DOCS
Examples and how to use the API you can see [in this link click here!](docs.png)


## Built With
* Symfony Framework
* VIM Editor
* PHP
* Gitflow
* Composer
* Doctrine
* MySQL

## Author
*Matheus Oliveira da Silva* - [Github](https://github.com/matheusolivesilva) | [Linkedin](https://www.linkedin.com/in/matheusoliveirasilva/)

