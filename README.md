# Electronics Store - PHP + MySQL

## Requirements
- XAMPP with Apache and MySQL
- PHP 8+
- MySQL 5.7+/MariaDB
- phpMyAdmin

## Installation
1. Copy the `electronics-store` folder into `C:\xampp\htdocs\`.
2. Start Apache and MySQL in XAMPP.
3. Open phpMyAdmin.
4. Import `database.sql`.
5. Open `http://localhost/electronics-store/`.
6. Admin: `http://localhost/electronics-store/admin/login.php`

Default admin:
- Username: `admin`
- Password: `Admin@123`

Change the password before real deployment.

## Database
If your MySQL root account has a password, edit `config/database.php`.

## Notes
- Product images currently use public placeholder image URLs.
- Replace sample business information in Admin > Settings.
- Replace sample products/specifications with verified product data.
- This version is a catalog + enquiry system; it does not process online payments.
