# Demo SQL Import Instructions

This SQL file contains a complete demo database for the Laravel Landing Page backend with sample data.

## What's Included

### Admin User
- **Email**: admin@example.com
- **Password**: admin123
- **Role**: Full admin access to the admin panel

### Sample Landing Page Sections
1. **Hero Section** - Welcome message with call-to-action
2. **About Us** - Company information
3. **Our Services** - Service offerings grid
4. **Features** - Product/service features
5. **Contact Us** - Contact information and form

### Site Settings
- **Theme Colors**: Primary (#3B82F6), Secondary (#EF4444), Accent (#10B981)
- **Contact Info**: Email, phone, address
- **Social Media**: Facebook, Twitter, Instagram, LinkedIn links
- **SEO Settings**: Meta title, description, keywords

## How to Import

### Method 1: Using phpMyAdmin (Recommended for cPanel)
1. Login to your cPanel
2. Open phpMyAdmin
3. Create a new database (e.g., `landing_page`)
4. Select the database
5. Click "Import" tab
6. Choose the `landing_page_demo.sql` file
7. Click "Go" to import

### Method 2: Using MySQL Command Line
```bash
# Create the database
mysql -u your_username -p -e "CREATE DATABASE landing_page;"

# Import the SQL file
mysql -u your_username -p landing_page < landing_page_demo.sql
```

### Method 3: Using cPanel MySQL Databases
1. Create a new database in cPanel MySQL Databases
2. Create a database user and assign to the database
3. Use phpMyAdmin to import the SQL file

## Update Laravel Configuration

After importing, update your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing_page
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

## Access the Admin Panel

1. Navigate to `https://yourdomain.com/admin/login`
2. Login with:
   - Email: admin@example.com
   - Password: admin123
3. Start customizing your landing page!

## API Endpoints

The demo includes these API endpoints:
- `GET /api/landing/sections` - Get all landing page sections
- `GET /api/landing/settings` - Get site settings
- `GET /api/landing/full-page` - Get complete page data
- `POST /api/contact` - Submit contact form

## Notes

- The database uses UTF8MB4 character set for full Unicode support
- All timestamps are in UTC
- The admin password is hashed using Laravel's bcrypt
- Sample data is ready for production use (just update the content)