# Php-assignment-todo

Php-assignment-todo is a simple web application for displaying TODO's.

## Installation

The application will run on `port 80`, if that port is already taken, change the port in `docker-compose.yml` file

* To run the service run docker-compose up

```bash
docker-compose up -d
```

## Initialization
Should be used when each time when pulling a new version
* Connect into the docker container 

```bash
docker exec -it php-assignment-todo_apache-php-composer_1 bash
```
* Inside the docker container bash console run "compose install"
```bash
cd /var/www/html/public && composer i
```
## Usage

In your browser of choice and enter the the address: `http://localhost:80`

## License
[MIT](https://choosealicense.com/licenses/mit/)