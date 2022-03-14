# Docker
init:
	docker-compose up -d
	docker-compose exec app composer install
	docker-compose exec app cp .env.example .env
	docker-compose exec app php artisan key:generate
	docker-compose exec app npm install
	docker-compose exec app npm install -D tailwindcss postcss autoprefixer
	docker-compose exec app npx tailwindcss init

watch:
	docker-compose exec app npm run watch

dev:
	docker-compose exec app npm run dev