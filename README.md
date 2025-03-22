# simple To Do app using PHP (procedural)

### 1- Change the project path in `config/consts.php`
```php
define('BASE_PATH', '{project-path}');
define('BASE_URL', '{project-path}');
```
**example:**
```php
define('BASE_PATH', 'C:/xampp/htdocs/to-do-app');
define('BASE_URL', 'http://localhost/to-do-app');
```

### 2- Change the database config in `config/db.php`
**example:**
```php
return [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'to-do-app',
    'db_charset' => 'utf8mb4',
];
```

### 3- Run the `.sql` script in `resources/db/create_tables.sql`
