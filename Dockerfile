FROM node:24-alpine as frontend

WORKDIR /app
COPY package*.json vite.config.js ./
COPY resources ./resources
RUN npm install && npm run build

FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libsqlite3-dev libpng-dev libonig-dev libxml2-dev libicu-dev libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql pdo_sqlite bcmath intl opcache gd pcntl zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

COPY --from=frontend /app/public/build ./public/build

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs \
    && chmod -R 777 storage bootstrap/cache

RUN touch /app/storage/database.sqlite
RUN cp .env.example .env
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/app/storage/database.sqlite

RUN php artisan key:generate --force \
    && php artisan migrate --force

RUN chmod 666 /app/storage/database.sqlite

COPY x402sandbox /usr/local/bin/

RUN chmod +x /usr/local/bin/x402sandbox

ENTRYPOINT ["/usr/local/bin/x402sandbox"]

EXPOSE 8402

CMD ["list"]
