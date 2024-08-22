help:
	@echo "Comandos disponíveis:"
	@echo "  make run       Sobe a aplicação, executa as migrations e exibe o link de acesso."
	@echo "  make test      Executa os testes"
	@echo "  make down      Para e remove os containers da aplicação."
	@echo "  make help      Mostra esta mensagem de ajuda."

run:
	@docker-compose up -dV && \
	docker-compose exec php composer install && \
	echo "Loading..." && \
	sleep 10 && \
	docker-compose exec php php yii migrate --interactive=0 && \
	docker-compose exec php php ./tests/bin/yii migrate --interactive=0 && \
	docker-compose exec php php ./tests/bin/yii migrate --interactive=0 --migration-path=tests/migrations && \
	echo "\n\n\n\n\n\n\n\n\n" &&\
	echo "Acesse a aplicação em: http://localhost:8000" &&\
	echo "......................................................"

test:
	docker-compose exec php composer install --dev && \
	docker-compose exec php php ./tests/bin/yii migrate --interactive=0 && \
	docker-compose exec php php ./tests/bin/yii migrate --interactive=0 --migration-path=tests/migrations && \
	docker-compose exec php php vendor/bin/codecept run

# Comando para parar a aplicação
down:
	docker-compose down -v
