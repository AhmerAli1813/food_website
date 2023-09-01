# Food Website Documentation
![alt text](https://github.com/AhmerAli1813/food_website/blob/main/images/foodWebsiteImg/HomePage.png?raw=true)
## Table of Contents
1. Introduction
2. Requirements
3. Installation
4. User Authentication
5. Shopping Cart
6. Session Management
7. Invoice Generation
8. Product Management
9. Search Functionality
10. New Products Display
11. Weekly Product Display
12. Banner Management
13. Admin Panel
   - 13.1 Orders
   - 13.2 Products
   - 13.3 Users
   - 13.4 Categories
   - 13.5 Stock Management
   - 13.6 Purchasing Stock
   - 13.7 Banners
14. concultion
---

## 1. Introduction

This documentation provides an overview of a food website developed using PHP, jQuery, Ajax, and DataTables.
 The website allows users to browse and purchase food products online. It includes user authentication,
 a shopping cart, session management, invoice generation, product management, search functionality,
 new products display, weekly product display, and banner management. Additionally, there is an admin panel for managing orders,
 products, users, categories, stock, purchasing stock, and banners.

## 2. Requirements

To run this food website, you need the following software and technologies:

- Web server (e.g., Apache)
- PHP (version 7 or higher)
- MySQL or any suitable database
- jQuery
- Ajax
- DataTables
- HTML/CSS
- Bootstrap (optional for frontend design)

## 3. Installation

1. Clone the repository or download the source code.

2. Create a database in MySQL and import the provided SQL schema to set up the database structure.

3. Configure the database connection in the `config.php` file.

4. Upload the code to your web server's root directory.

5. Access the website through a web browser.

## 4. User Authentication

- Users can sign up for a new account and sign in using their email and password.
- Passwords are securely hashed and stored in the database.
- User sessions are managed to track authenticated users.

## 5. Shopping Cart
![alt text](https://github.com/AhmerAli1813/food_website/blob/main/images/foodWebsiteImg/DisplayProducts.png?raw=true)
- Users can add products to their shopping cart.
- The shopping cart allows users to adjust the quantity of items and remove products.
- The total cost is dynamically updated in real-time.

## 6. Session Management

- User sessions are used to maintain user authentication.
- Cart contents and user details are stored in sessions to provide a seamless shopping experience.

## 7. Invoice Generation

- Invoices are generated for completed orders.
- Invoices contain order details, product information, and total cost.

## 8. Product Management

- Admin users can manage product listings, including adding, editing, and deleting products.
- Products can be categorized and organized.
- Product details include name, description, price, and images.

## 9. Search Functionality

- Users can search for products by name or category.
- Ajax is used to provide real-time search suggestions.

## 10. New Products Display

- The website displays new products on the homepage.
- Admins can mark products as "new" for promotional purposes.

## 11. Weekly Product Display

- Weekly featured products are displayed on the homepage.
- Admins can select products to be featured for the week.

## 12. Banner Management

- Admins can manage website banners, including uploading images and specifying target URLs.
- Banners can be linked to product categories or promotional pages.

## 13. Admin Panel
![alt text](https://github.com/AhmerAli1813/food_website/blob/main/images/foodWebsiteImg/AdminDashboard.png?raw=true)
### 13.1 Orders

- Admins can view and manage customer orders.
- Order details, status, and user information are displayed.
- Orders can be marked as shipped or completed.

### 13.2 Products

- Admins can add, edit, and delete products.
- Product information, including name, description, price, and images, can be modified.

### 13.3 Users

- Admins can manage user accounts.
- User details, such as name, email, and role, can be edited.
- Admins can also deactivate or delete user accounts.

### 13.4 Categories

- Admins can create and manage product categories.
- Categories help organize products for easy navigation.

### 13.5 Stock Management

- Admins can manage product stock levels.
- Stock quantities are automatically updated when users make purchases.

### 13.6 Purchasing Stock

- Admins can restock products by specifying quantities and suppliers.
- Stock levels are updated accordingly.

### 13.7 Banners

- Admins can upload and manage banners for the website.
- Banners can be linked to specific pages or categories.

---
### Concultion
This documentation provides an overview of the key features and functionalities of the food website.
 Detailed technical documentation, code examples, and implementation details should be provided separately for each feature.
