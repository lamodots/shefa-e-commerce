# 🎁 E-Commerce  Store Web Application

A full-stack e-commerce web application designed for online store.  
The platform provides a seamless shopping experience for users and a powerful admin dashboard for managing products, orders, and users.

---

## ✨ Features Overview

- User-friendly product browsing and search
- Secure authentication and persistent cart
- Online payments using Razorpay
- Order tracking system
- Admin dashboard with analytics and management tools

---

## 🚀 Key User Functionalities

### 🔍 Navigation & Product Discovery
- Browse products by **categories** (e.g., gift hampers, occasions).
- Dedicated **Products Page** listing all items.
- Homepage displays products in **random order**.
- Keyword-based **search functionality**.

### 🛍️ Product Details & Shopping
- Detailed product view with:
  - Description
  - Pricing
  - Multiple product images
- Fully functional **shopping cart**:
  - Add multiple items
  - Update quantities
  - Remove products

### 👤 User Accounts
- **User Registration & Login**
- **Persistent Cart**:
  - Cart items are saved for logged-in users.
  - Cart data is private and user-specific.
- **My Account**:
  - View and edit profile details
  - Option to delete account
- **My Orders**:
  - View order history including:
    - Invoice number
    - Order ID
    - Total amount
    - Date
    - Order status
- **Order Tracking**:
  - Real-time tracking updates provided by admin
  - Shipped orders cannot be deleted by users

### 💳 Payment Integration
- Integrated with **fluterwave, Razorpay** for secure global payments
- After successful payment:
  - Users are redirected to a success page
  - Invoice and transaction details are displayed

---

## 🛠️ Key Admin Functionalities

### 🔐 Admin Authentication
- Admin credentials are stored directly in the database for enhanced security

### 📊 Admin Dashboard
- Displays:
  - Total products
  - Total users
  - Total orders
  - Total revenue
- Interactive charts:
  - User-to-order ratio (Pie Chart)
  - Monthly revenue (Bar Chart)

### 📦 Product Management
- Add new products with:
  - Name
  - Description
  - Keywords
  - Category
  - Occasion
  - Price
  - Up to three product images
- View product list with stock count and status
- Edit existing products (including images)
- Delete products that have not been sold

### 🗂️ Category & Occasion Management
- Insert, view, and edit product categories
- Insert, view, and manage occasions

### 📑 Order Management
- View all placed orders with:
  - Payment status
  - Item count
  - Total amount
- Update order tracking status:
  - Pending
  - Shipped
  - Out for Delivery
  - Delivered
- Delete orders only after delivery
- View complete customer and product details per order

### 👥 User Management
- View all registered users
- See number of orders per user
- Access detailed order history for each user
- Delete user accounts
- Dashboard user statistics:
  - Active users
  - Inactive users
  - New users
  - Total users

---

## 🧰 Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**:  MySQL 
- **Authentication**: Session / JWT based
- **Payment Gateway**: Razorpay
- **Charts & Analytics**: Chart.js

---

## 📌 Project Highlights

- Secure authentication and role-based access
- Real-time order tracking
- Admin-controlled inventory and order flow
- Clean UI with structured dashboard analytics
- Scalable and modular architecture

---

## 📁 Project Folder Structure (Vanilla PHP)

```batch
/ecommerce-project
│
├── /admin                      # Admin panel (separate from user side)
│   │
│   ├── /assets                 # Admin-specific static files
│   │   ├── /css                # Admin CSS styles
│   │   ├── /js                 # Admin JavaScript files
│   │   └── /images             # Admin images/icons
│   │
│   ├── /includes               # Reusable admin layout components
│   │   ├── header.php          # Admin header
│   │   ├── sidebar.php         # Admin sidebar/navigation
│   │   └── footer.php          # Admin footer
│   │
│   ├── /controllers            # Admin business logic
│   │   ├── productController.php   # Manage products (CRUD)
│   │   ├── categoryController.php  # Manage categories
│   │   ├── orderController.php     # Manage orders & tracking
│   │   └── userController.php      # Manage users
│   │
│   ├── /views                  # Admin UI pages
│   │   ├── dashboard.php       # Admin dashboard with analytics
│   │   ├── products.php        # Product management page
│   │   ├── orders.php          # Order management page
│   │   ├── users.php           # User management page
│   │   └── login.php           # Admin login page
│   │
│   ├── /uploads                # Admin-uploaded files
│   │   └── /products           # Product images
│   │
│   └── index.php               # Admin entry point
│
├── /assets                     # Public static assets
│   ├── /css                    # Frontend stylesheets
│   ├── /js                     # Frontend JavaScript
│   └── /images                 # Website images and banners
│
├── /config                     # Application configuration files
│   ├── database.php            # Database connection
│   ├── config.php              # Global configuration constants
│   └── razorpay.php            # Razorpay API keys and settings
│
├── /controllers                # Application controllers (logic layer)
│   ├── authController.php      # Login, register, logout
│   ├── cartController.php      # Cart operations
│   ├── orderController.php     # Order placement & history
│   ├── productController.php   # Product listing & details
│   └── userController.php      # User profile management
│
├── /models                     # Database models
│   ├── User.php                # User-related database queries
│   ├── Product.php             # Product database queries
│   ├── Order.php               # Order database queries
│   ├── Category.php            # Category database queries
│   
│
├── /views                      # Frontend UI views
│   │
│   ├── /auth                   # Authentication pages
│   │   ├── login.php           # User login page
│   │   └── register.php        # User registration page
│   │
│   ├── /cart                   # Shopping cart pages
│   │   └── index.php           # Cart view
│   │
│   ├── /orders                 # Order-related pages
│   │   ├── my-orders.php       # User order history
│   │   └── order-details.php   # Detailed order view
│   │
│   ├── /products               # Product pages
│   │   ├── index.php           # Product listing page
│   │   └── view.php            # Product detail page
│   │
│   ├── account.php             # User profile page
│   └── home.php                # Homepage
│
├── /includes                   # Common reusable components
│   ├── header.php              # Site header
│   ├── footer.php              # Site footer
│   ├── navbar.php              # Navigation bar
│   └── auth.php                # Authentication & session checks
│
├── /helpers                    # Helper and utility functions
│   ├── authHelper.php          # Authentication helper functions
│   ├── cartHelper.php          # Cart utility functions
│   └── validationHelper.php    # Form validation helpers
│
├── /routes                     # Application routing
│   └── web.php                 # Route definitions and URL handling
│
├── /uploads                    # Public file uploads
│   └── /products               # Product images uploaded by users/admin
│
├── index.php                   # Main application entry point
├── .htaccess                   # URL rewriting & access control
└── README.md                   # Project documentation


```
## 👨‍💻 Author

**Lamodot**  
Feel free to connect and contribute 🚀
