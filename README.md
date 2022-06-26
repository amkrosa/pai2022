# mindhabit
# Designing web applications
## Cracow University of Technology course
### Introduction
This repository is created for course Designing web application (pl. Projektowanie Aplikacji Internetowych).

### Technologies
Used in the project:
* PHP >8.0
* JavaScript
* HTML & CSS
* Docker
* Nginx

### Variables
#### Required
Following environment variables are required for app to run:
- DB_PASSWORD
- DB_USERNAME
- DB_DATABASE
- DB_HOST
- EMAIL_URL - URL to email microservice
- EMAIL_LOGIN - Login to email microservice
- EMAIL_PASSWORD - Password to email microservice

#### Optional 
Following environment variables are optional for app to run:
- CONFIG_SHOW_ERRORS

### Run
Open CLI in project path and run:

```sh
docker-compose up
```

or on Linux
```sh
docker compose up
```

Docker should build images and run containers.
