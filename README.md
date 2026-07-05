# 🛒 Online Shopping

A full-featured e-commerce platform built with **Laravel 11** — browse products, manage a cart, check out with PayPal, and administer the store with role-based permissions.

## Features

- 🛍️ Product catalogue, cart and checkout flow
- 💳 PayPal payment integration (`srmklive/paypal`)
- 🔐 Role & permission management (`spatie/laravel-permission`)
- 👥 Social login (Laravel Socialite)
- 🔔 Real-time notifications (Laravel Reverb + Pusher)
- 🧾 PDF invoice generation (`laravel-dompdf`)
- 🖼️ Image processing (Intervention Image)
- 📋 Admin activity log (`spatie/laravel-activitylog`)
- 🔔 Toast notifications (Toastr)

## Tech Stack

- PHP 8.2+ / Laravel 11
- MySQL
- Blade + Laravel UI (Bootstrap)
- Laravel Reverb (WebSockets)

## Getting Started

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configure the database, PayPal and Pusher/Reverb keys in `.env`, then:

```bash
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve
```

For real-time features, also run:

```bash
php artisan reverb:start
php artisan queue:work
```

## Author

**Mehedi** — [@mehedi-200](https://github.com/mehedi-200)
