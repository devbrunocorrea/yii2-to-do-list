# Yii2 Hello World

 To-do list App is a "Hello, World" with Yii2 framework 

## Run:
```bash
make run
```

## Run (Alternative):
```
docker-compose up -d
docker-compose exec php composer install -n
docker-compose exec php php yii migrate --interactive=0
```

## Browser:
http://localhost:8000

## Run tests:
```bash
make test
```