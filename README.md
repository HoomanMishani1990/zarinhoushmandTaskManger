# زرین هوشمند - سیستم مدیریت وظایف

## درباره پروژه
سیستم مدیریت وظایف و پروژه‌ها با قابلیت تخته کانبان

## امکانات
- مدیریت پروژه‌ها
- مدیریت وظایف
- تخته کانبان
- مدیریت کاربران
- سیستم اعلان‌ها
- پروفایل کاربری

## پیش‌نیازها
- PHP >= 8.1
- Composer
- PostgreSQL
- Node.js & NPM

## نصب و راه‌اندازی

1. کلون پروژه:
```bash
git clone https://github.com/YOUR_USERNAME/task-management.git
cd task-management
```

2. نصب وابستگی‌ها:
```bash
composer install
npm install
```

3. کپی فایل env.:
```bash
cp .env.example .env
```

4. تنظیم فایل .env:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. ایجاد کلید برنامه:
```bash
php artisan key:generate
```

6. اجرای مایگریشن‌ها:
```bash
php artisan migrate
```

7. ایجاد لینک storage:
```bash
php artisan storage:link
```

8. کامپایل asset ها:
```bash
npm run dev
```

9. اجرای برنامه:
```bash
php artisan serve
```

## مجوز
MIT License
