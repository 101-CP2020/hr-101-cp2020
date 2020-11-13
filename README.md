# hr-101-cp2020

1. Создайте файл **.env** со следующими переменными
* ENV={Development|Production}
* VOLUME={../app|data-volume}
* APP_PORT={port for application}
* DB_PORT={port for database}
* DB_HOST=db
* DB_USER={user for database}
* DB_PASSWORD={password for database}
* DB_NAME={name for database}

2. Запустите контейнер
```
docker-compose -f docker/docker-compose.yml up -d --build
```

3. Пути для просмотра
```
http://localhost:${APP_PORT} - web
http://localhost:${APP_PORT}/api/public/v1 - api
```