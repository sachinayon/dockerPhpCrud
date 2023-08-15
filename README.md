# Docker PHP CRUD Project

This repository contains a Docker project for setting up a PHP CRUD (Create, Read, Update, Delete) application with a MySQL database and PHPMyAdmin. This setup allows you to quickly deploy a PHP application that interacts with a MySQL database and manage the database using PHPMyAdmin.

## Table of Contents
- [Prerequisites](#prerequisites)
- [Getting Started](#getting-started)
- [Accessing the Application](#accessing-the-application)
- [Stopping the Application](#stopping-the-application)
- [Customization](#customization)
- [Clean Up](#clean-up)
- [Contributing](#contributing)

## Prerequisites
Before you begin, ensure you have the following software installed on your machine:
- Docker: [Download Docker](https://www.docker.com/get-started)
- Git: [Download Git](https://git-scm.com/downloads)

## Getting Started
Follow these steps to set up and run the Docker PHP CRUD project:

1. **Clone the Repository:**
``` bash
git clone https://github.com/sachinayon/dockerPhpCrud.git
```

2. **Navigate to the Project Directory:**
```bash
cd dockerPhpCrud
```

3. **Build the Docker Image:**
```bash
docker-compose up -d
```

4. **Access the PHP Application:**
Open your web browser and navigate to [http://localhost:8080](http://localhost:8080).

5. **Access PHPMyAdmin:**
Open your web browser and navigate to [http://localhost:8081](http://localhost:8081). Use the following credentials to log in:
- Username: root
- Password: 123
You can manage the MySQL database associated with the PHP application using PHPMyAdmin.

## Customization
You can customize this Docker project to fit your needs:
- Edit the PHP application files in the `src/` directory to build your CRUD application.
- Modify the `docker-compose.yml` file to change port mappings or environment variables.
- Add your own SQL initialization scripts to the `mysql-scripts/` directory.

## Clean Up
To stop and remove the Docker containers, you can run:
```bash
docker-compose down
```

## Contributing
Feel free to contribute to this project by submitting issues or pull requests on GitHub