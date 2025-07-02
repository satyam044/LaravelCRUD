# 🛍️ Laravel Product CRUD App

This is a simple Laravel-based Product Management CRUD application. Users can **add**, **edit**, **update**, **delete**, and **upload images** for products using a clean Bootstrap-powered interface.

---

## ✨ Features

- ➕ Add New Product  
- ✏️ Edit Existing Product  
- 📸 Upload & Display Product Images  
- 🗑️ Delete Product with Confirmation  
- 📄 View Products in a Tabular Format  
- ✅ Form Validation and Error Handling  

---

## 🛠️ Technologies Used

| Category       | Tech                  |
|----------------|-----------------------|
| Framework      | Laravel (PHP)         |
| Frontend       | Bootstrap             |
| Templating     | Blade (Laravel views) |
| Database       | MySQL / SQLite        |
| Image Handling | Laravel Filesystem    |

---

## 📂 Project Structure

```bash
LaravelCRUD/
├── app/             # Controllers, Models
├── public/          # Public assets (CSS, JS, uploads)
├── resources/
│   └── views/       # Blade templates (product views)
├── routes/
│   └── web.php      # App routes
├── database/        # Migrations, seeders
├── .env             # Environment variables
└── README.md
⚙️ Installation Guide
📌 Make sure you have PHP ≥ 8, Composer, and MySQL or SQLite installed

# Step 1: Clone the repository
git clone https://github.com/satyam044/LaravelCRUD.git
cd LaravelCRUD

# Step 2: Install PHP dependencies
composer install

# Step 3: Configure your DB in .env file
DB_DATABASE=laravelcrud
DB_USERNAME=root
DB_PASSWORD=

# Step 4: Run migrations
php artisan migrate

# Step 5: Serve the application
php artisan serve
Now visit http://localhost:8000/products to view the app.

📌 Notes
Uploaded product images are stored in public/uploads or storage/app/public.

👨‍💻 Author
Satyam Mishra

⭐ Like this project?
Star the repo or fork it to make your own custom Laravel-based dashboard!