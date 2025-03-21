# Task Manager Application

A comprehensive task management system built with Laravel, featuring project organization, task tracking, and team collaboration.

## Screenshots

### Task Management API
![API Documentation for Task Management System](/public/doc/1.png)
*API Documentation for Task Management System*

### Postgres Database
![Postgres Database](/public/doc/2.png)
*Pgadmin4 panel*

### Task List View
![Task List](/public/doc/3.png)
*Organized view of all tasks with filtering and sorting capabilities*

### Team Management
![Team Management](/public/doc/4.png)
*Manage team members and their project assignments*

### Unit tests
![ Unit tests](/public/doc/5.png)
*test list*

###  Unit tests
![ Unit tests](/public/doc/6.png)
*pass about 30 test*

## Features

- Project Management
- Task Creation and Assignment
- Team Collaboration
- File Attachments
- Progress Tracking
- Due Date Management
- Priority Settings
- Real-time Updates
- Persian Language Support

## Installation

```bash
# Clone the repository
git clone https://github.com/yourusername/task-manager.git

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Seed the database (optional)
php artisan db:seed
```

## Requirements

- PHP >= 8.1
- Laravel 10.x
- PostgreSQL
- Node.js & NPM
- Composer

## Configuration

1. Set up your database in `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_manager
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

2. Configure mail settings for notifications
3. Set up file storage configuration

## Usage

- Create new projects and assign team members
- Create and assign tasks within projects
- Track progress and update task status
- Manage file attachments
- Generate progress reports

## Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite Feature
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

- Laravel Team
- Contributors
- [List any other resources or inspirations]

## Contact

