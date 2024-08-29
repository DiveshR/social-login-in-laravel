<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Social Login

#### Install Laravel

#### Laravel UI

```
composer require laravel/ui
```

#### Auth command

```
php artisan ui bootstrap --auth
```

#### Install npm

```
npm install
```

#### Make npm build

```
npm run build
```

- Setup database  in .env file

- Run migration
```
php artisan migrate
```

- Add google client id and secret in .env file 

```
GOOGLE_CLIENT_Id=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URL=
```

- Call them in service class app/service.php

```
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],
```

#### Install Laravel Socialite package for social login

```
composer require laravel/socialite
```

- Now add new column to user table for social login id

```
php artisan make:migration add_google_id_in_users_table
$table->string('google_id')->nullable()->after('remember_token'); //aDD Schema in new migration file
```

Now migrate
```
php artisan migrate
```

- Create Controller for redirecting to google link and response from google
- Create Google Controller

```
php artisan make:controller GoogleController
```

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{

    /**
     * Redirect to google login.
     *
     * @return void
     */

    public function redirectToGoogle()
    {
    }

    /**
     * Get google callback.
     *
     * @return void
     */

    public function handleGoogleCallback(Request $request)
    {
    }
}


```

web.php

```
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

```