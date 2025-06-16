# 📝 Laravel Login & Notes CRUD App

A modern, responsive Laravel-based web application that includes:

-   ✅ User authentication (register, login, logout)
-   ✅ CRUD functionality (create, read, update, delete) for personal notes
-   ✅ Beautiful UI with Tailwind CSS
-   ✅ Full MVC structure with validation and protection

---

## 🚀 Features

-   User Registration, Login, Logout (via Laravel Breeze)
-   Dashboard showing user-specific notes
-   Add, Edit, Delete Notes
-   Auth-protected routes
-   Validation and error feedback
-   Tailwind CSS modern UI
-   Responsive layout for all screens

---

## 📸 Screenshots

> Replace these paths with actual screenshot links or local file paths.

### 🔐 Login Page

![Login Screenshot](public/screenshots/login.png)

### 📝 Dashboard

![Dashboard Screenshot](public/screenshots/dashboard.png)

### ➕ Create Note

![Create Screenshot](public/screenshots/create.png)

---

## 🛠️ Tech Stack

| Technology     | Purpose                           |
| -------------- | --------------------------------- |
| Laravel 11     | Backend framework (PHP)           |
| Laravel Breeze | Authentication scaffolding        |
| Tailwind CSS   | Modern responsive UI              |
| MySQL          | Relational database               |
| Vite + NPM     | Asset bundling & frontend tooling |

---

## 📦 Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/laravel-login-crud.git
cd laravel-login-crud
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Create Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Edit `.env` and set your DB credentials:

```env
DB_DATABASE=crud_app
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Install Laravel Breeze (for Auth)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm run dev
php artisan migrate
```

### 7. Serve the Application

```bash
php artisan serve
```

Open your browser: [http://localhost:8000](http://localhost:8000)

---

## 💡 Future Improvements

-   Tags or categories for notes
-   Search or filter notes
-   Image/file upload support
-   RESTful API support
-   Dark mode toggle
-   Soft deletes (Trash bin)

---

## ☁️ Deployment Guide (Optional)

You can deploy the project on:

-   Render (Free Laravel hosting)
-   Vercel (with API or hybrid frontend)
-   Laravel Forge
-   Shared Hosting (cPanel)

### Steps:

1. Push your code to GitHub
2. Use services like Render or Laravel Forge
3. Set environment variables from `.env`
4. Run `php artisan migrate` on production

---

## 📜 License

This project is licensed under the MIT License.

---

## 🙋 Author

**Pramuditha Kavinda Bandara**  
BSc (Hons) Software Engineering Student  
[GitHub](https://github.com/KMPKBandara) | [LinkedIn](https://www.linkedin.com)

---
