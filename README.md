---

# 🍽️ Restaurant Reservation System

This is a simple **Restaurant Reservation System** built using **Laravel 12** and **SQLite**. It allows users to book a table, view all reservations, cancel or reschedule existing ones, and more — all with a clean and minimal UI styled using basic CSS.

---

## 📋 Overview

The system is designed for local development on **Windows** using **Visual Studio Code**, but it can easily be adapted to other environments. It uses **SQLite** for simplicity and quick setup.

---

## ✅ Features

- **Book a Table**: Enter name, email, party size, and future reservation date/time.
- **View Reservations**: See all current bookings in a table format.
- **Cancel Reservation**: Cancel an existing reservation.
- **Reschedule Reservation**: Change the date/time of a confirmed reservation.
- **Validation**: Ensures valid email, positive party size, and future date/time.
- **Basic Styling**: Clean layout with minimal CSS styling.

---

## ⚙️ Prerequisites

Make sure the following tools are installed before setting up:

- [PHP](https://www.php.net/downloads) (v8.1 or higher)
- [Composer](https://getcomposer.org/download/)
- [Visual Studio Code](https://code.visualstudio.com/)
  - Recommended Extensions:
    - PHP Intelephense
    - Laravel Blade Snippets
- [Git](https://git-scm.com/)

> SQLite comes pre-installed with Laravel — no extra setup required!

---

## 🛠️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/mehedibu2013/restaurant-reservation.git
cd restaurant-reservation
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment

```bash
copy .env.example .env
php artisan key:generate
```

Edit `.env` and set the database connection to SQLite:

```env
DB_CONNECTION=sqlite
```

Create an empty SQLite file:

```bash
type nul > database/database.sqlite
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Start Development Server

```bash
php artisan serve
```

Open your browser and go to:  
👉 http://localhost:8000

---

## 🌐 Access the Application

- **Book a Table:**  
  👉 http://localhost:8000/reservations/create

- **View All Reservations:**  
  👉 http://localhost:8000/reservations

- From the reservations page, you can also:
  - **Cancel** a reservation
  - **Reschedule** it by editing the date/time

---

## 🗂️ Project Structure

- `app/Models/Reservation.php`: Eloquent model for reservations.
- `app/Http/Controllers/ReservationController.php`: Handles booking, viewing, cancelling, and rescheduling logic.
- `database/migrations/`: Migration file for creating the reservations table.
- `resources/views/reservations/`: Blade templates (`create.blade.php`, `index.blade.php`)
- `resources/views/layouts/app.blade.php`: Base layout with basic CSS styling.
- `routes/web.php`: Web routes definition.

---

## 🧪 Usage

### Book a Table
Go to `/reservations/create` and fill out:
- Name
- Email
- Party Size
- Reservation Date & Time (must be in the future)

### View Reservations
Go to `/reservations` to see all bookings in a table.

### Cancel or Reschedule
- Click **Cancel** to delete a reservation.
- Edit the **Date/Time** field and click **Reschedule** to update.

---


## 📝 Notes

- **Database**: Uses SQLite by default. Can be switched to MySQL/PostgreSQL via `.env`.
- **Styling**: Minimalistic design. Can be enhanced with Tailwind CSS or Bootstrap.
- **Time Zone**: Default is UTC. To change, edit `'timezone'` in `config/app.php`.

---

## 🔧 Further Improvements (Optional)

- Add user authentication (e.g., Laravel Breeze)
- Prevent overbooking with availability checks
- Send confirmation emails after booking
- Enhance UI with frontend frameworks (Vue.js, React, etc.)
- Add pagination for large datasets
- Implement XSS protection and input sanitization

---

## 🤝 Contributing

Contributions are welcome! Feel free to:
- Fork the repository
- Submit issues
- Create pull requests

---

## 📄 License

This project is licensed under the **MIT License**.

---
