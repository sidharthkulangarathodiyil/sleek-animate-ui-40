# cPanel Shared Hosting Deployment Guide

This guide will help you deploy your Laravel Landing Page application to cPanel shared hosting.

## Prerequisites

- cPanel shared hosting account with PHP 8.1+ support
- Access to cPanel File Manager or FTP
- MySQL database access
- Domain/subdomain configured

## Step 1: Prepare Your Files

1. **Upload the application files:**
   - Upload the entire `landing-backend` directory to your hosting account
   - Place the `public` folder contents in your domain's public directory (usually `public_html` or `www`)
   - Place the rest of the Laravel application outside the public directory for security

2. **Recommended directory structure on cPanel:**
   ```
   /home/username/
   ├── public_html/ (or www/)
   │   ├── index.php (from Laravel's public folder)
   │   ├── .htaccess (from Laravel's public folder)
   │   └── ... (other public assets)
   ├── laravel-app/
   │   ├── app/
   │   ├── config/
   │   ├── database/
   │   ├── routes/
   │   ├── vendor/
   │   └── ... (rest of Laravel files)
   ```

## Step 2: Configure Database

1. **Create MySQL Database in cPanel:**
   - Go to cPanel > MySQL Databases
   - Create a new database (e.g., `username_landing`)
   - Create a new MySQL user
   - Add the user to the database with all privileges

2. **Update Environment Configuration:**
   - Copy `.env.cpanel` to `.env`
   - Update the database credentials:
     ```
     DB_DATABASE=username_landing
     DB_USERNAME=username_dbuser
     DB_PASSWORD=your_db_password
     ```

## Step 3: Update Application Paths

Update `public/index.php` to point to the correct Laravel application directory:

```php
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Update these paths to match your directory structure
require __DIR__.'/../laravel-app/vendor/autoload.php';

$app = require_once __DIR__.'/../laravel-app/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
```

## Step 4: Set Permissions

Set the following permissions via cPanel File Manager or FTP:

- `storage/` directory: 755 (recursively)
- `bootstrap/cache/` directory: 755 (recursively)
- `.env` file: 644

## Step 5: Run Migrations and Seeders

Since cPanel doesn't typically provide SSH access, you'll need to create a temporary script to run migrations:

1. **Create `migrate.php` in your public directory:**
   ```php
   <?php
   // REMOVE THIS FILE AFTER MIGRATION!
   require_once __DIR__ . '/../laravel-app/vendor/autoload.php';
   
   $app = require_once __DIR__ . '/../laravel-app/bootstrap/app.php';
   
   $artisan = $app->make(Illuminate\Contracts\Console\Kernel::class);
   
   // Run migrations
   $artisan->call('migrate', ['--force' => true]);
   echo "Migrations completed\n";
   
   // Run seeders
   $artisan->call('db:seed', ['--force' => true]);
   echo "Seeders completed\n";
   
   echo "Setup complete! REMOVE THIS FILE NOW!";
   ?>
   ```

2. **Visit `yourdomain.com/migrate.php` once**
3. **Delete the `migrate.php` file immediately after use**

## Step 6: Configure Environment

1. **Update `.env` file with production settings:**
   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   
   # Use file-based sessions and cache for shared hosting
   SESSION_DRIVER=file
   CACHE_STORE=file
   QUEUE_CONNECTION=database
   ```

2. **Generate application key (if needed):**
   Create a temporary script `generate-key.php`:
   ```php
   <?php
   // REMOVE THIS FILE AFTER USE!
   require_once __DIR__ . '/../laravel-app/vendor/autoload.php';
   
   $app = require_once __DIR__ . '/../laravel-app/bootstrap/app.php';
   $artisan = $app->make(Illuminate\Contracts\Console\Kernel::class);
   
   $artisan->call('key:generate', ['--force' => true]);
   echo "Key generated! REMOVE THIS FILE NOW!";
   ?>
   ```

## Step 7: Security Considerations

1. **Ensure the Laravel application directory is outside public_html**
2. **Remove any temporary scripts created during deployment**
3. **Verify that `.env` file is not accessible via web browser**
4. **Configure HTTPS/SSL through cPanel**

## Default Admin Credentials

- **Email:** admin@example.com
- **Password:** password

**IMPORTANT:** Change these credentials immediately after deployment!

## Troubleshooting

### Common Issues:

1. **500 Internal Server Error:**
   - Check file permissions (755 for directories, 644 for files)
   - Verify `.htaccess` file is present in public directory
   - Check PHP version compatibility (requires PHP 8.1+)

2. **Database Connection Error:**
   - Verify database credentials in `.env`
   - Ensure database user has correct permissions
   - Check database host (usually `localhost` for shared hosting)

3. **Missing Dependencies:**
   - Ensure `vendor/` directory is uploaded
   - If needed, run `composer install --no-dev` locally before upload

4. **Storage/Cache Issues:**
   - Clear application cache via temporary script:
     ```php
     $artisan->call('config:clear');
     $artisan->call('cache:clear');
     $artisan->call('view:clear');
     ```

## Features

### Admin Panel
- Access at: `yourdomain.com/admin`
- Full CRUD operations for landing page sections
- Theme customization (colors, fonts)
- Settings management
- Responsive design

### Landing Page
- Dynamic content loading from database
- Customizable sections (Hero, About, Services, Contact, etc.)
- Responsive design
- Contact form functionality
- SEO-friendly structure

### API Endpoints
- `GET /api/v1/landing/full` - Get all sections and settings
- `POST /api/v1/contact` - Submit contact form
- `POST /api/v1/auth/login` - Admin login
- Admin routes under `/api/v1/admin/` (authenticated)

## Support

For issues or questions, please refer to the Laravel documentation or contact support.

---

**Remember to:**
1. Change default admin credentials
2. Remove temporary migration scripts
3. Configure SSL/HTTPS
4. Set up regular backups
5. Monitor application logs