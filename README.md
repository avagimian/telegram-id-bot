# Запуск проекта

#### Запускать composer
```bash
composer install
```

#### Создать .env файл
```bash
cp .env.example .env
```

#### Запускать миграции
```bash
php artisan migrate
```

!! Поставить токен бота в .env(BOT_TOKEN)

#### Устанавливать webhook URL
```bash
php artisan set:webhook {url}
```
