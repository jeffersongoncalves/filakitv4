# FilaKit Start Kit Filament 3.x and Laravel 12.x

## About FilaKit

FilaKit is a robust starter kit built on Laravel 12.x and Filament 3.x, designed to accelerate the development of modern
web applications with a ready-to-use multi-panel structure.

## Features

- **Laravel 12.x** - The latest version of the most elegant PHP framework
- **Filament 3.x** - Powerful and flexible admin framework
- **Multi-Panel Structure** - Includes three pre-configured panels:
    - Admin Panel (`/admin`) - For system administrators
    - App Panel (`/app`) - For authenticated application users
    - Public Panel (frontend interface) - For visitors

## System Requirements

- PHP 8.2 or higher
- Composer
- Node.js and NPM

## Installation

``` bash
# Clone the repository
laravel new my-app --using=jeffersongoncalves/filakit
```
``` bash
# Install JavaScript dependencies
npm install
```
``` bash
# Set up environment
cp .env.example .env
php artisan key:generate

# Configure your database in the .env file

# Run migrations
php artisan migrate
```
``` bash
# Run the server
php artisan serve
```

## Authentication Structure

FilaKit comes pre-configured with a custom authentication system that supports different types of users:

- `Admin` - For administrative panel access
- `User` - For application panel access

## Development

``` bash
# Run the development server with logs, queues and asset compilation
composer dev

# Or run each component separately
php artisan serve
php artisan queue:listen --tries=1
npm run dev
```

## Customization

### Panel Configuration

Panels can be customized through their respective providers:

- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Providers/Filament/AppPanelProvider.php`
- `app/Providers/Filament/PublicPanelProvider.php`

### Themes and Colors

Each panel can have its own color scheme, which can be easily modified in the corresponding Provider files.

## Resources

FilaKit includes support for:

- User and admin management
- Multi-guard authentication system
- Tailwind CSS integration
- Database queue configuration

## License

This project is licensed under the [MIT License](LICENSE).

## Credits

Developed by [Jefferson Gonçalves](https://github.com/yourusername).
