# 🩸 Blood & Plasma Donation Management System

## 📌 Project Overview

This is a web-based Blood and Plasma Donation Management System developed using **PHP**, **HTML**, **CSS**, **JavaScript**, and **MySQL**, and deployed on **AWS EC2**. The platform connects **donors**, **patients**, and **administrators** to make blood and plasma donation faster, more efficient, and reliable, especially in emergency situations and for rare blood types or COVID-19 plasma recovery cases.

---

## 👨‍💻 Features

### 👤 Admin
- View and manage donor and patient lists
- Assign donors to patients
- Update and delete records

### 🩸 Donor
- Register and update profile
- Submit donation information
- Indicate plasma availability

### 🏥 Patient
- Register and search for blood/plasma donors
- Request donations
- Track donation status

---

## 🛠 Tech Stack

| Component       | Technology Used        |
|----------------|------------------------|
| Frontend       | HTML, CSS, JavaScript  |
| Backend        | PHP                    |
| Database       | MySQL                  |
| Deployment     | AWS EC2 (Ubuntu, LAMP stack) |
| DB Management  | phpMyAdmin             |

---

## 🛠️ How to Run Locally

1. Clone this repository:
   ```bash
   git clone https://github.com/YOUR_USERNAME/blood-donation-system.git
Start XAMPP or WAMP and run:

Apache

MySQL

Import the database:

Go to http://localhost/phpmyadmin/

Create a new database named blood_donation

Import the file from sql/blood_donation_schema.sql

Open your browser and run:

perl
Copy
Edit
http://localhost/blood-donation-system/index.php

🌐 Deployment Info
The application was successfully deployed to an AWS EC2 instance using:

Apache2

MySQL server

PHP (LAMP stack)

SSH, SFTP (PuTTY, WinSCP)

phpMyAdmin (optional setup)

