<div class="filament-hidden">

![FilaKit](https://raw.githubusercontent.com/jeffersongoncalves/filakitv4/4.x/art/jeffersongoncalves-filakitv4.png)

</div>

# FilaKit Start Kit Filament 4.x and Laravel 12.x

## About FilaKit

FilaKit is a robust starter kit built on Laravel 12.x and Filament 4.x, designed to accelerate the development of modern
web applications with a ready-to-use multi-panel structure.

## Features

- **Laravel 12.x** - The latest version of the most elegant PHP framework
- **Filament 4.x** - Powerful and flexible admin framework
- **Multi-Panel Structure** - Includes three pre-configured panels:
    - Admin Panel (`/admin`) - For system administrators
    - App Panel (`/app`) - For authenticated application users
    - Public Panel (frontend interface) - For visitors
- **Environment Configuration** - Centralized configuration through the `config/filakit.php` file

## System Requirements

- PHP 8.2 or higher
- Composer
- Node.js and PNPM

## Installation

Clone the repository
``` bash
laravel new my-app --using=jeffersongoncalves/filakitv4 --database=mysql
```

###  Easy Installation

FilaKit can be easily installed using the following command:

```bash
php install.php
```

This command automates the installation process by:
- Installing Composer dependencies
- Setting up the environment file
- Generating application key
- Setting up the database
- Running migrations
- Installing Node.js dependencies
- Building assets
- Configuring Herd (if used)

### Manual Installation

Install JavaScript dependencies
``` bash
pnpm install
```
Install Composer dependencies
``` bash
composer install
```
Set up environment
``` bash
cp .env.example .env
php artisan key:generate
```

Configure your database in the .env file

Run migrations
``` bash
php artisan migrate
```
Run the server
``` bash
php artisan serve
```

## Installation with Docker

Clone the repository
```bash
laravel new my-app --using=jeffersongoncalves/filakitv4 --database=mysql
```

Move into the project directory
```bash
cd my-app
```

Install Composer dependencies
```bash
composer install
```

Set up environment
```bash
cp .env.example .env
```

Configuring custom ports may be necessary if you have other services running on the same ports.

```bash
# Application Port (ex: 8080)
APP_PORT=8080

# MySQL Port (ex: 3306)
FORWARD_DB_PORT=3306

# Redis Port (ex: 6379)
FORWARD_REDIS_PORT=6379

# Mailpit Port (ex: 1025)
FORWARD_MAILPIT_PORT=1025
```

Start the Sail containers
```bash
./vendor/bin/sail up -d
```
You won’t need to run `php artisan serve`, as Laravel Sail automatically handles the development server within the container.

Attach to the application container
```bash
./vendor/bin/sail shell
```

Generate the application key
```bash
php artisan key:generate
```

Install JavaScript dependencies
```bash
pnpm install
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
pnpm run dev
```

## Customization

### Panel Configuration

Panels can be customized through their respective providers:

- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Providers/Filament/AppPanelProvider.php`
- `app/Providers/Filament/PublicPanelProvider.php`

Alternatively, these settings are also consolidated in the `config/filakit.php` file for easier management.

### Themes and Colors

Each panel can have its own color scheme, which can be easily modified in the corresponding Provider files or in the
`filakit.php` configuration file.

### Configuration File

The `config/filakit.php` file centralizes the configuration of the starter kit, including:

- Panel routes
- Middleware for each panel
- Branding options (logo, colors)
- Authentication guards

## Perfil do Usuário — joaopaulolndev/filament-edit-profile

Este projeto já vem com o plugin Filament Edit Profile integrado para os painéis Admin e App. Ele adiciona uma página completa de edição de perfil com avatar, idioma, cor do tema, segurança (tokens, MFA), sessões de navegador, alteração de e‑mail e senha.

- Rotas (padrão neste projeto):
  - Admin: /admin/my-profile
  - App: /app/my-profile
- Navegação: por padrão, a página não aparece no menu (shouldRegisterNavigation(false)). Se quiser exibir no menu da barra lateral, altere para true no provedor do painel.

Onde configurar
- Provedores dos painéis
  - Admin: app/Providers/Filament/AdminPanelProvider.php
  - App: app/Providers/Filament/AppPanelProvider.php
  Nestes arquivos você pode ajustar:
  - ->slug('my-profile') para mudar a URL (ex.: 'perfil')
  - ->setTitle('My Profile') e ->setNavigationLabel('My Profile')
  - ->setNavigationGroup('Group Profile'), ->setIcon('heroicon-o-user'), ->setSort(10)
  - ->shouldRegisterNavigation(true|false) para mostrar/ocultar no menu
  - Formulários exibidos: ->shouldShowEmailForm(), ->shouldShowLocaleForm([...]), ->shouldShowThemeColorForm(), ->shouldShowSanctumTokens(), ->shouldShowMultiFactorAuthentication(), ->shouldShowBrowserSessionsForm(), ->shouldShowAvatarForm()

- Configurações gerais: config/filament-edit-profile.php
  - locales: opções de idioma disponíveis na página de perfil
  - locale_column: coluna usada no seu modelo para idioma (padrão: locale)
  - theme_color_column: coluna para cor do tema (padrão: theme_color)
  - avatar_column: coluna do avatar (padrão: avatar_url)
  - disk: disco de armazenamento usado para o avatar (padrão: public)
  - visibility: visibilidade do arquivo (padrão: public)

Migrações e modelos
- As colunas necessárias já estão contempladas nas migrações padrão deste kit (users e admins): avatar_url, locale e theme_color, utilizando os nomes definidos em config/filament-edit-profile.php.
- Os modelos App\Models\User e App\Models\Admin já leem o avatar usando a configuração do plugin (getFilamentAvatarUrl).

Armazenamento de avatar
- Garanta que o disco de arquivos esteja configurado e que o link de storage exista:
  php artisan storage:link
- Ajuste o disk e visibility no arquivo de configuração conforme sua infraestrutura.

Como acessar rapidamente
- Via URL direta: /admin/my-profile ou /app/my-profile
- Para deixar visível na navegação lateral, mude shouldRegisterNavigation(true) no respectivo Provider.

Referência
- Repositório do plugin: https://github.com/joaopaulolndev/filament-edit-profile

## Resources

FilaKit includes support for:

- User and admin management
- Multi-guard authentication system
- Tailwind CSS integration
- Database queue configuration
- Customizable panel routing and branding

## License

This project is licensed under the [MIT License](LICENSE).

## Credits

Developed by [Jefferson Gonçalves](https://github.com/jeffersongoncalves).
