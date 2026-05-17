# 🌾 Golden East — Agricultural Supply Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white"/>
  <img src="https://img.shields.io/badge/Livewire-FB70A9?style=for-the-badge&logo=livewire&logoColor=white"/>
</p>

---

## 📌 About the Project

**Golden East** is a full-stack web application built for an Egyptian agricultural supply company. The system manages pesticide and agricultural chemical inventory, handles online product orders, and provides a complete admin dashboard for stock and sales management.

> نظام متكامل لإدارة مخزون المبيدات الحشرية والكيماويات الزراعية مع لوحة تحكم للمسؤولين وإمكانية الطلب أونلاين.

---

## ✨ Features

### 🛒 Customer Side
- **Product Catalog** — Browse pesticides and agricultural chemicals organized by category with product images
- **Online Orders** — Place orders without credit card / Visa payment (cash-on-delivery / inquiry based)
- **Product Details** — Full product descriptions, images, and availability status
- **Company Profile** — About the company, its history, and mission

### 🔧 Admin Panel
- **Product Management** — Add, edit, and delete products with images and categories
- **Inventory Management** — Track available stock quantities in the warehouse
- **Sales History** — View and manage sales records and order history
- **Category Management** — Organize products into categories

### 👥 User & Permission Management
- **Role-Based Access Control (RBAC)** — Each user has specific permissions defining what they can access
- **Add Admin** — Super admin can create new admin accounts
- **Remove Admin** — Super admin can delete or deactivate admin accounts
- **Permission Assignment** — Grant or restrict access per user (e.g. can manage products, can view orders, can manage users)
- **Protected Routes** — All admin pages are protected; unauthorized users are automatically redirected

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel, PHP 8 |
| Frontend | Blade, JavaScript, Livewire |
| Styling | Tailwind CSS, SCSS |
| Database | MySQL |
| Auth & Roles | Laravel Authentication + Custom RBAC (Role-Based Access Control) |
| Storage | Laravel File Storage (product images) |

---

## 📸 Screenshots

> Add screenshots of your app here after deployment.
> `Admin Panel | Product Catalog | Order Page | Company Profile`

---

## 🚀 Installation & Setup

```bash
# 1. Clone the repository
git clone https://github.com/hind27/glodeneast.git
cd glodeneast

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies
npm install

# 4. Copy environment file
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Configure your database in .env
DB_DATABASE=glodeneast
DB_USERNAME=root
DB_PASSWORD=

# 7. Run migrations
php artisan migrate

# 8. Seed the database (if available)
php artisan db:seed

# 9. Link storage for product images
php artisan storage:link

# 10. Start the app
php artisan serve
npm run dev
```

---

## 🗂️ Project Structure

```
app/
├── Http/Controllers/
│   ├── Admin/          # Admin panel controllers
│   ├── ProductController.php
│   ├── OrderController.php
│   └── UserController.php     # Admin & permission management
├── Models/
│   ├── Product.php
│   ├── Category.php
│   ├── Order.php
│   ├── Sale.php
│   └── User.php               # With roles & permissions
database/
├── migrations/         # All table definitions
resources/
├── views/
│   ├── admin/          # Admin panel views
│   ├── products/       # Product catalog views
│   ├── orders/         # Order views
│   └── users/          # User & permission management views
```

---

## 👩‍💻 Developer

**Hind Anwar Metwally**
Full Stack Developer | Laravel & PHP Specialist

- 🌍 Giza, Egypt
- 📧 hindanwarMetwally@gmail.com
- 💼 [LinkedIn](https://www.linkedin.com/in/hindanwar)
- 🐙 [GitHub](https://github.com/hind27)

---

## 📄 License

This project is proprietary software built for Golden East company.
All rights reserved © 2024 Hind Anwar Metwally.
