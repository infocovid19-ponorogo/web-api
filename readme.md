## Web API Covid19 Ponorogo

### Demo Credentials

**User:** admin@admin.com  
**Password:** secret

### Instalasi
```
composer install
cp .env.example .env
php artisan migrate:fresh --seed
php artisan key:generate
php artisan passport:install

php artisan serve
```

### Route & API

```
/admin/kecamatan
/api/auth/login
/api/kecamatan
```


