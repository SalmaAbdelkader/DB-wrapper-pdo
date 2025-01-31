# DB Wrapper (PHP PDO)

## 📌 Introduction
This is a lightweight and efficient Database Wrapper built using PHP and MySQL with PDO. It simplifies database interactions by providing a clean and easy-to-use API for executing queries, handling transactions, and managing connections securely.

## 🚀 Features
- Simplified CRUD operations (Create, Read, Update, Delete)
- Secure database interactions using prepared statements (PDO)
- Transaction management
- Connection handling with error reporting
- Supports multiple database types (MySQL)
- Prevents SQL injection

## 🛠️ Technologies Used
- PHP (Native, Object-Oriented Programming)
- MySQL (with PDO for database interaction)

## 🔧 Installation
### Prerequisites:
- Apache server (XAMPP, WAMP, or LAMP)
- PHP 7.4 or higher
- MySQL database

### Steps to Install:
1. Clone this repository:
   ```sh
   git clone [https://github.com/SalmaAbdelkader/DB-wrapper-pdo.git]
   ```
2. Move the project folder to your web server root directory (e.g., `htdocs` in XAMPP).
3. Configure database connection in `pdo_db_wrapper/Database.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'your_database_name');
   define('DB_USER', 'your_database_user');
   define('DB_PASS', 'your_database_password');
   ```
4. Start Apache and MySQL from your local server.
5. Use the DB wrapper by including it in your project.

## 📂 Project Structure
```
/db-wrapper-php-pdo
│── /pdo_db_wrapper  # Database configuration
│── /db.php          # Core wrapper classes
│── /tests           # Unit tests
│── index.php        # Sample usage
│── composer.json    # Dependencies
```

## 🔍 Key Functionalities
- `Database.php`: Manages database connections using PDO.
- `QueryBuilder.php`: Provides an interface for building and executing SQL queries.
- `Transaction.php`: Handles database transactions safely.

## 🏗️ How to Use
Example usage:
```php
require 'config/Database.php';

$user = new db();

// $user = $user->select("password, email", "users")->where("id", "=", "3")->andWhere("name","=","sara8")->getRow();
// echo "<pre>";

// print_r($user);

// echo "</pre>";


//-------=======================Insert & Update=======================
$data = [
    'name' => "Ahmed123",
    'email' => "ahmed@gmanil.com",
    'password' => 12345
];

echo $user->update_insert("users", $data,"update")->where("id", "=", 8)->exec();


// =========================== Delete ========

// echo $user->delete("users")->where("id","=","2")->exec();
```

## 🏗️ How to Contribute
1. Fork the repository.
2. Create a new branch: `git checkout -b feature-branch`
3. Commit your changes: `git commit -m 'Add new feature'`
4. Push to the branch: `git push origin feature-branch`
5. Open a pull request.

## 🛡️ Security & Best Practices
- Use prepared statements with PDO to prevent SQL injection.
- Sanitize user input to avoid XSS attacks.
- Use transactions for critical database operations.
- Restrict access to configuration files.

## 📄 License
This project is open-source and available under the [MIT License](LICENSE).

## 📞 Contact
For any queries or contributions, feel free to reach out:
- GitHub: [https://github.com/SalmaAbdelkader]
- Email: salmaabdelkader2019@gmail.com

