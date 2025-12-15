# Mini-LMS (Learning Management System)

A comprehensive Learning Management System built with Laravel & MySQL for managing courses, faculty, and students with advanced session tracking.

## Features

### Core Modules
- **User Authentication** (Register/Login with Laravel Breeze)
- **Course Management** (Create, Read, Update, Delete)
- **Faculty Management** (Add teachers with name, email, phone, department)
- **Student Management** (Add students with name, email, phone, roll number, program)
- Only resource creators can edit/delete their own records

### Session Management Features
- **Automatic Session Creation** on user login
- **Login Counter** - Tracks number of logins
- **Last Login Time** - Records timestamp of each login
- **JSON Session Storage** - User data stored in JSON format
- **Dashboard Display** - Shows all session data including:
  - Username and Email
  - User Role
  - Login Statistics
  - Academic Information (Course, Semester, Year)
  - Raw JSON data view

### UI Features
- Clean and responsive design with Tailwind CSS
- Color-coded action buttons
- Real-time statistics cards
- Professional dashboard layout

## Technologies Used

- Laravel 12.40.2
- PHP 8.4.1
- MySQL (via MAMP)
- Tailwind CSS
- Laravel Breeze (Authentication)
- JSON Session Storage

## Installation

1. Clone the repository
```bash
git clone https://github.com/keshav-chhabira6/mini-lms.git
cd mini-lms
```

2. Install dependencies
```bash
composer install
npm install
```

3. Create .env file
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Configure database in .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=mini_lms
DB_USERNAME=root
DB_PASSWORD=root
```

6. Run migrations
```bash
php artisan migrate
```

7. Build assets
```bash
npm run build
```

8. Start the server
```bash
php artisan serve
```

9. Visit: http://localhost:8000

## Session Tracking Implementation

The system automatically tracks user sessions using a custom middleware (`TrackUserSession`):

- Creates PHP associative array with user data
- Converts to JSON using `json_encode()`
- Stores in Laravel session
- Retrieves and displays using `json_decode()` on dashboard

### Tracked Data:
- Username
- Email
- Role
- Login Counter (increments on each new login)
- Last Login Time
- Academic Info (Course, Semester, Year) in JSON format

## Usage

1. **Register** a new account
2. **Login** - Session tracking begins automatically
3. Navigate to:
   - **Dashboard** - View your session information
   - **Courses** - Manage courses
   - **Faculty** - Manage faculty members
   - **Students** - Manage student records

## Database Schema

- `users` - User authentication
- `courses` - Course information
- `faculties` - Faculty member details
- `students` - Student records
- All tables include timestamps and user relationships

## Author

Keshav Chhabira

## License

Open source - Educational project