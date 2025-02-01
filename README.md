# Fullstack Developer Technical Test

This repository contains my submission for the Fullstack Developer Technical Test. The project implements a book management system with user authentication and various filtering capabilities.

## Project Status

✅ Completed Features:
- Full authentication system (login, registration, password management)
- Book management (CRUD operations)
- User management and listing
- Basic search functionality
- Email verification system

⚠️ Partially Implemented/In Progress:
- UI/UX improvements needed
- Some unit tests implemented, but coverage could be expanded
- Landing page filters partially implemented

❌ Not Implemented (Due to Time Constraints):
- Complete filter implementation in landing page
- Comprehensive test coverage

## Tech Stack

- Backend: Laravel with Laravel Breeze and Livewire
- Database: PostgreSQL
- Authentication: Laravel Breeze with Bcrypt password hashing
- Frontend: Blade templates with Livewire for dynamic interfaces

## Prerequisites

- PHP >= 8.3
- Composer
- PostgreSQL
- Node.js & NPM
- Mail server configuration for email verification

## Installation Instructions

1. Clone the repository:
```bash
git clone https://github.com/TMaulana26/taufikmaulana_fdtest.git taufikmaulana_fdtest
cd taufikmaulana_fdtest
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
npm run dev
```

4. Environment Setup:
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your `.env` file with PostgreSQL credentials:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=taufikmaulana_fdtest
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=your_mail_port
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email
```

6. Database setup:
```bash
php artisan migrate
```

7. Start the development server:
```bash
php artisan serve
```

## Features Implementation Details

### Authentication (20 Points)
- Implemented using Laravel Breeze authentication scaffolding
- Custom email verification process
- Secure password reset functionality
- Profile-based password change feature

### Home Page (10 Points)
- Dynamic user details display using Livewire components
- Email verification status indicator
- Responsive design using Tailwind CSS (included with Breeze)

### User List Management (20 Points)
- Server-side pagination with Livewire
- Real-time search functionality using Livewire
- Email verification status filtering

### Book Management (30 Points)
- Complete CRUD operations for books using Livewire components
- Image upload for book covers
- Rating system implementation (1-5 stars)
- Data validation and error handling

### Landing Page (10 Points)
- Public access to book listings
- Basic filtering implemented
- Responsive grid layout for book display

### Testing (10 Points)
- Basic unit tests implemented for:
  - User authentication
  - Book CRUD operations
- Additional tests needed for comprehensive coverage

## Known Issues and Future Improvements

1. UI/UX Enhancements:
   - Implement more intuitive navigation
   - Add loading states and better error feedback
   - Improve mobile responsiveness

2. Feature Completion:
   - Complete landing page filters
   - Implement advanced search capabilities
   - Add sorting options for book listings

3. Testing:
   - Increase test coverage
   - Add integration tests
   - Implement end-to-end testing

## Third-Party Libraries Used

- Laravel Breeze: Authentication scaffolding and basic UI
- Livewire: For dynamic, real-time interfaces without writing JavaScript
- Tailwind CSS: Included with Breeze for styling
- PostgreSQL PHP Driver (pdo_pgsql): For database connectivity

## Security Considerations

- Password hashing using Bcrypt (Laravel's default)
- Email verification required for full access
- CSRF protection enabled through Laravel
- Input validation and sanitization implemented
- Secure file upload handling for book covers
- Livewire security features for AJAX requests


## Contact

For any questions or clarifications about this submission, please contact tm052602@gmail.com