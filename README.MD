#Introduction
To give you an ability to custom 404 page. Custom 404 page according the Model.

## Requirements
PHP 7.0 and later.

## Installation
Composer
```bash
composer require nhattay/laravel-404page
```

Configuration
```bash
php artisan vendor:publish --tag=404page
```
you can see a new file `config/404page.php`

## Getting Started
1. Custom view
```php
'models' => [
    App\Models\User::class => [
        'view' => 'user-404', /* It refers to file resources/views/user-404.blade.php */
    ]
]
```
2. Passing variables to the view
```php
'models' => [
    App\Models\User::class => [
        'view' => 'user-404', /* It refers to file resources/views/user-404.blade.php */
        'variables' => [      /* You are able to pass variables to the view */
            'customMessage' => 'User not found',
        ],
    ]
]
```
Then there's a variable `$customMessage` available in the view