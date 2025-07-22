# Tavern Publico

Tavern Publico is a PHP web application designed to simulate a tavern management system. This project leverages Docker and Docker Compose for easy setup and deployment, providing a consistent development and production environment.


## Table of Contents

* [Features](#features)

* [Technologies Used](#technologies-used)

* [Project Structure](#project-structure)

* [Getting Started](#getting-started)

  * [Prerequisites](#prerequisites)

  * [Environment Variables](#environment-variables)

  * [Building and Running the Application](#building-and-running-the-application)

  * [Accessing the Application](#accessing-the-application)

  * [Accessing phpMyAdmin](#accessing-phpmyadmin)

* [Database](#database)

* [Contributing](#contributing)

* [License](#license)

## Features

* **Dockerized Environment**: Easily set up and run the entire application stack using Docker Compose.

* **PHP Application**: Core application logic built with PHP.

* **MySQL Database**: Persistent data storage for the tavern system.

* **phpMyAdmin**: Web-based interface for MySQL database management.

* **Apache Web Server**: Serves the PHP application.

## Technologies Used

* **PHP 8.4**: Server-side scripting language.

* **Apache**: Web server.

* **MySQL 8.0**: Relational database management system.

* **Docker**: Containerization platform.

* **Docker Compose**: Tool for defining and running multi-container Docker applications.

* **phpMyAdmin**: Web-based MySQL client.

## Project Structure

```
├── apache/
│   └── 000-default.conf         # Apache virtual host configuration
├── "Backup tavern"/             # Contains the main PHP application source code
├── .env.sample                  # Example environment variables file
├── .gitignore                   # Git ignore file
├── docker-compose.yml           # Defines the multi-container Docker application
├── Dockerfile                   # Dockerfile for building the PHP application image
├── README.md                    # This README file
└── tavern_publico.sql           # SQL file for database schema and initial data
```


## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine.

### Prerequisites

Before you begin, ensure you have the following installed on your system:

* **Docker**: [Install Docker](https://docs.docker.com/get-docker/)

* **Docker Compose**: Docker Desktop usually includes Docker Compose. If not, follow the [installation guide](https://docs.docker.com/compose/install/).

### Environment Variables

The project uses environment variables for sensitive information like database credentials.

1. **Create `.env` file**: Copy the provided `.env.sample` file to a new file named `.env` in the root directory of the project:
```shell
cp .env.sample .env
```
2. **Configure `.env`**: Open the newly created `.env` file and fill in the required values. Here's an example of what you might set:
```
MYSQL_ROOT_PASSWORD=password
MYSQL_DATABASE=tavern_publico
MYSQL_USER=tavern_user
MYSQL_PASSWORD=password
MYSQL_PORT=3345
```
* `MYSQL_ROOT_PASSWORD`: The root password for the MySQL server.

* `MYSQL_DATABASE`: The name of the database that will be created.

* `MYSQL_USER`: The username for the application to connect to the database.

* `MYSQL_PASSWORD`: The password for the application's database user.

* `MYSQL_PORT`: The port on your host machine that the MySQL database will be accessible on (default is 3306).

### Building and Running the Application

Navigate to the root directory of the project (where `docker-compose.yml` is located) in your terminal and run the following command:
```shell
docker-compose up --build -d
```

* `docker-compose up`: Starts the services defined in `docker-compose.yml`.

* `--build`: Rebuilds images if there are changes to the `Dockerfile` or build context.

* `-d`: Runs the containers in detached mode (in the background).

This command will:

1. Build the `app` service Docker image based on the `Dockerfile`.

2. Pull the `mysql:8.0` and `phpmyadmin/phpmyadmin` images.

3. Create and start the `app`, `db`, and `phpmyadmin` containers.

### Accessing the Application

Once the containers are up and running, you can access the Tavern Publico application in your web browser at:

http://localhost:8780


### Accessing phpMyAdmin

You can access phpMyAdmin to manage your database at:

http://localhost:8090


Use the `MYSQL_USER` and `MYSQL_PASSWORD` from your `.env` file to log in.

## Database

The `tavern_publico.sql` file located in the root directory contains the SQL schema and initial data for the project's database. When the `db` service starts for the first time, this SQL file is automatically imported into the `MYSQL_DATABASE` specified in your `.env` file.

The PHP application is configured to connect to the `db` service using the environment variables `DB_HOST`, `DB_USER`, `DB_PASSWORD`, and `DB_NAME` which are passed from `docker-compose.yml`.
