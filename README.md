# TechPOS

A modern Point of Sale system built with Laravel and Bootstrap.

## Requirements

### System Requirements

- PHP >= 8.2
- Node.js (Latest LTS version recommended)
- Composer
- MySQL/PostgreSQL
- Git

### PHP Extensions

- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installation

1. Clone the repository:

```bash
git clone <repository-url>
cd techpos
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install Node.js dependencies:

```bash
npm install
# or
yarn install
```

4. Environment Setup:

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations:

```bash
php artisan migrate
```

7. Build assets:

```bash
npm run dev
# or
yarn dev
```

## Project Structure

- `app/` - Contains the core code of your application
- `bootstrap/` - Contains the app bootstrapping scripts
- `config/` - Contains all configuration files
- `database/` - Contains database migrations and seeders
- `public/` - Contains publicly accessible files
- `resources/` - Contains views, raw assets, and translations
- `routes/` - Contains all route definitions
- `storage/` - Contains compiled Blade templates, file uploads, etc.
- `tests/` - Contains test cases
- `vendor/` - Contains Composer dependencies

## Development

### Available Commands

```bash
# Run development server
php artisan serve

# Run Vite development server
npm run dev

# Build for production
npm run build

# Run tests
php artisan test
```

## Features

- Modern UI with Bootstrap 5
- Responsive design
- TailwindCSS integration
- Chart visualizations with ApexCharts
- Perfect Scrollbar for smooth scrolling
- Box icons integration

## Dependencies

### PHP Dependencies

- Laravel Framework ^11.0
- Laravel Tinker ^2.9
- Ramsey UUID ^4.7

### JavaScript Dependencies

- Bootstrap 5.3.3
- @popperjs/core 2.11.8
- jQuery 3.7.1
- ApexCharts
- Boxicons
- Perfect Scrollbar
- Masonry Layout

## Browser Support

- Chrome (45+)
- Firefox (38+)
- Edge (12+)
- Internet Explorer (10+)
- iOS (9+)
- Safari (9+)
- Android (4.4+)
- Opera (30+)

## Contributing

Please read through our contributing guidelines. Included are directions for opening issues, coding standards, and notes on development.

## License

This project is licensed under the MIT License.
