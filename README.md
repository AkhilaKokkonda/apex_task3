# 🌟 Apex Task 3 - User Management System (PHP + MySQL)
```
A simple and elegant **User Management System** built using **PHP, MySQL, and XAMPP** — includes full authentication, CRUD operations, and profile management with colorful UI design.

```

## 🚀 Features

```
✅ User Registration (with password hashing)  
✅ Secure Login / Logout using Sessions  
✅ Add, View, Update, Delete (CRUD) Users  
✅ Edit Profile with Profile Picture Upload  
✅ Duplicate Email Check before Registration  
✅ Modern, Colorful & Responsive UI (Custom CSS)  

```

## 🗂️ Folder Structure
```
apex_task3/
│
├── config/
│ └── db.php
│
├── includes/
│ ├── header.php
│ └── footer.php
│
├── auth/
│ ├── register.php
│ ├── login.php
│ └── logout.php
│
├── crud/
│ ├── add_user.php
│ ├── view_users.php
│ ├── update_user.php
│ └── delete_user.php
│
├── profile/
│ └── edit_profile.php
│
├── css/
│ └── style.css
│
├── uploads/
│
├── index.php

```

## ⚙️ Database Setup
```
1. Open **phpMyAdmin** → Create a new database named: user_management
2. Run the following SQL command:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'User',
    profile_pic VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

```

## 💾Configuration
```
Open config/db.php and make sure these settings match your local setup:

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "user_management";
```

## ▶️ How to Run the Project

```
Copy the entire folder apex_task3/ into your XAMPP htdocs directory.

Start Apache and MySQL from the XAMPP Control Panel.

In your browser, visit:
👉 http://localhost/apex_task3/auth/register.php

Register → Login → Manage Users → Edit Profile

```

## 🔒 Security Highlights

```
Passwords stored using password_hash() and verified using password_verify()

Session-based authentication system

Prepared statements to prevent SQL Injection

```
