# 🎓 Education Management System in Laravel

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

## 📖 Overview

The **Education Management System (EMS)** is a web-based application designed to streamline administrative tasks in educational institutions. Built with the **Laravel** framework, this project demonstrates robust implementation of **CRUD** (Create, Read, Update, Delete) operations, secure user authentication, and a clean user interface.

This project is ideal for understanding how to structure Laravel applications, manage database relationships, and utilize Blade templating.

## 🚀 Key Features

* **🔐 Secure Authentication:** Implemented using **Laravel Breeze** (Login, Registration, Password Reset).
* **👨‍🎓 Student Management:** Add, view, update, and delete student records.
* **🏫 Course/Class Management:** Manage different courses or classes available.
* **🎨 Responsive Frontend:** Built using **Blade Templates** and **Tailwind CSS** for a mobile-friendly design.
* **🗄️ Database Management:** Efficient data handling using MySQL and Eloquent ORM.

## 🛠️ Tech Stack

* **Backend:** PHP, Laravel Framework
* **Frontend:** Blade Templates, Tailwind CSS
* **Database:** MySQL
* **Authentication:** Laravel Breeze

## 📸 Screenshots

*(Place your screenshots here. Example: `![Dashboard Screenshot](path/to/image.png)`)*

## ⚙️ Installation Guide

Follow these steps to set up the project locally:

### Prerequisites
* PHP >= 8.1
* Composer
* Node.js & NPM
* MySQL

### Steps

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/your-username/education-management-system.git](https://github.com/your-username/education-management-system.git)
    cd education-management-system
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install Frontend Dependencies**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Setup**
    Duplicate the example environment file and rename it to `.env`:
    ```bash
    cp .env.example .env
    ```

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Configure Database**
    Open the `.env` file and update your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Run Migrations**
    Create the database tables:
    ```bash
    php artisan migrate
    ```

8.  **Run the Application**
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` in your browser.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1.  Fork the repository
2.  Create your feature branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

## 👤 Author

**Naveed Mughal**
* GitHub: [(https://github.com/Nvd063/)]
* Facebook: [@Naveed Mughal]

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).