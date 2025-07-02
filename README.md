# 🩸 Blood & Plasma Donation Management System

# 📌 Project Overview

This is a full-stack web application built to streamline the process of **blood and plasma donation**. It helps users (patients) find suitable donors based on blood group and plasma availability, and enables admins to manage all donor and recipient data efficiently.

This system was developed using **PHP, HTML, CSS, JavaScript, and MySQL**, and is deployed on an **AWS EC2 instance** for wider accessibility. It aims to reduce delays, increase accuracy, and improve emergency response in critical medical situations such as accidents, organ transplants, and COVID-19 recovery cases.


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

| Component       | Technology Used       |
|----------------|------------------------|
| Frontend       | HTML, CSS, JavaScript  |
| Backend        | PHP                    |
| Database       | MySQL                  |
| Deployment     | AWS EC2                |
| DB Management  | phpMyAdmin             |

---

## 🛠️ How to Run Locally

1. Clone this repository:
   
   git clone https://github.com/YOUR_USERNAME/blood-donation-system.git

2. Start XAMPP or WAMP and run:

   Apache

   MySQL

3. Import the database:

   Go to http://localhost/phpmyadmin/

   Create a new database named blood_donation

   Import the file from sql/blood_donation_schema.sql

4. Open your browser and run:

   http://localhost/blood-donation-system/index.php

---

## 🌐 Deployment Info

The application was successfully deployed to an AWS EC2 instance using:

   Apache2

   MySQL server

   PHP (LAMP stack)

   SSH, SFTP (PuTTY, WinSCP)

   phpMyAdmin (optional setup)

