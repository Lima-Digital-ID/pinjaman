### Cloning project from github

Open your terminal, then `https://github.com/Lima-Digital-ID/pinjaman.git`

### Installation

Open your terminal

1. ` composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. make a your database in PMA, then setting database name in .env
5. `php artisan migrate --seed`
6. Last, running your laravel `php artisan serve`
7. Done, happy using this is application :)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
