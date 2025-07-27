# Laravel Landing Page with Admin Panel

A complete Laravel-based landing page solution with a powerful admin panel for content management. Built specifically for easy deployment on cPanel shared hosting.

## 🚀 Features

### Landing Page
- **Dynamic Content Management** - All content managed through admin panel
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Customizable Sections** - Hero, About, Services, Features, Contact, and more
- **Theme Customization** - Change colors, fonts, and layouts
- **Contact Form** - Built-in contact form with validation
- **SEO Optimized** - Clean URLs and meta tag management

### Admin Panel
- **Modern Dashboard** - Clean, intuitive interface built with Alpine.js
- **Section Management** - Full CRUD operations for page sections
- **Theme Editor** - Real-time color and style customization
- **Settings Management** - Site-wide configuration options
- **User Management** - Secure authentication system
- **Mobile Responsive** - Admin panel works on all devices

### Technical Features
- **cPanel Compatible** - Optimized for shared hosting deployment
- **API-First Architecture** - RESTful API with frontend consumption
- **Secure Authentication** - Laravel Sanctum for API security
- **Database Driven** - All content stored in MySQL database
- **File-Based Caching** - Optimized for shared hosting environments

## 🛠️ Technology Stack

- **Backend:** Laravel 12 (PHP 8.1+)
- **Frontend:** Alpine.js, Tailwind CSS
- **Database:** MySQL
- **Authentication:** Laravel Sanctum
- **Deployment:** cPanel Shared Hosting Compatible

## 📋 Requirements

- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Composer
- cPanel shared hosting (for production)

## 🏃‍♂️ Quick Start

### Local Development

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd landing-backend
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set up database**
   - Create a MySQL database
   - Update `.env` with your database credentials
   ```
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Start development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Landing Page: http://localhost:8000
   - Admin Panel: http://localhost:8000/admin/login
   - Default login: admin@example.com / password

### Production Deployment

For detailed cPanel deployment instructions, see [DEPLOYMENT.md](DEPLOYMENT.md).

## 📱 Admin Panel Usage

### Login
- Navigate to `/admin/login`
- Use default credentials (change after first login):
  - Email: `admin@example.com`
  - Password: `password`

### Managing Sections
1. Go to Admin Panel → Sections
2. Click "Add Section" to create new content blocks
3. Choose from predefined types: Hero, About, Services, Contact, etc.
4. Customize content, colors, and settings
5. Reorder sections by drag-and-drop

### Theme Customization
1. Go to Admin Panel → Settings
2. Modify theme colors in real-time
3. Update site information and contact details
4. Configure social media links

## 🎨 Customization

### Adding New Section Types

1. **Update the section controller validation**
2. **Add new section type to the frontend template**
3. **Create corresponding admin panel form fields**

### Custom Styling

The application uses Tailwind CSS. You can customize the design by:
- Modifying the Blade templates
- Adding custom CSS classes
- Updating the color scheme through the admin panel

## 🔧 API Endpoints

### Public Endpoints
- `GET /api/v1/landing/full` - Get all sections and settings
- `GET /api/v1/landing/sections` - Get active sections only
- `GET /api/v1/landing/settings` - Get site settings
- `POST /api/v1/contact` - Submit contact form
- `POST /api/v1/auth/login` - Admin login

### Protected Endpoints (Admin)
- `GET /api/v1/admin/dashboard` - Dashboard statistics
- `GET /api/v1/admin/sections` - Manage sections
- `POST /api/v1/admin/sections` - Create section
- `PUT /api/v1/admin/sections/{id}` - Update section
- `DELETE /api/v1/admin/sections/{id}` - Delete section
- `GET /api/v1/admin/settings` - Manage settings
- `POST /api/v1/admin/settings/bulk-update` - Update multiple settings

## 🔒 Security Features

- **Authentication:** Laravel Sanctum token-based authentication
- **CSRF Protection:** Built-in CSRF token validation
- **Input Validation:** Comprehensive form validation
- **File Permissions:** Secure file permission recommendations
- **Environment Protection:** .env file security
- **SQL Injection Prevention:** Eloquent ORM protection

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify database credentials in `.env`
   - Ensure MySQL service is running
   - Check database permissions

2. **Permission Denied Errors**
   - Set proper file permissions (755 for directories, 644 for files)
   - Ensure storage directory is writable

3. **500 Internal Server Error**
   - Check Laravel logs in `storage/logs/`
   - Verify PHP version compatibility
   - Ensure all dependencies are installed

4. **Admin Panel Not Loading**
   - Clear browser cache
   - Check JavaScript console for errors
   - Verify API endpoints are accessible

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📞 Support

For support and questions:
- Check the [Deployment Guide](DEPLOYMENT.md)
- Review the troubleshooting section above
- Create an issue on GitHub

---

**Built with ❤️ for easy deployment and powerful content management.**
