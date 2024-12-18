# MiniCRM

MiniCRM is a simple and efficient Customer Relationship Management system built with Laravel 10 and MySQL. This application helps to manage companies and their employees.

## Installation Steps

Follow the steps below to set up the project:

### 1. Clone the Repository
```bash
git clone https://github.com/satishtcw/MiniCRM.git
cd MiniCRM
```

### 2. Create a Database
Create a new database using your preferred MySQL client. For example:
- **Database Name**: `TestMiniCRM`
- **Username**: `root`
- **Password**: *(leave blank if none)*

### 3. Configure Environment File
1. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
2. Update the `.env` file with your database credentials and application URL:
   ```env
   APP_URL=http://localhost:8000
   DB_DATABASE=TestMiniCRM
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 4. Install Dependencies
Install PHP dependencies using Composer:
```bash
composer install
```

### 5. Generate Application Key
Generate a new application key for encryption:
```bash
php artisan key:generate
```

### 6. Run Database Migrations
Run the migrations to set up the database schema:
```bash
php artisan migrate
```

### 7. Seed the Database
Seed the database with initial data (e.g., admin user):
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 8. Create Storage Link
Create a symbolic link for storage:
```bash
php artisan storage:link
```

### 9. Install Frontend Dependencies
Install Node.js dependencies:
```bash
npm install
```

### 10. Compile Frontend Assets
Compile the assets for development:
```bash
npm run dev
```

### 11. Start the Development Server
Run the Laravel development server:
```bash
php artisan serve
```
The application will be accessible at [http://localhost:8000](http://localhost:8000).

### 12. Test APIs with Postman
Import the Postman collection and environment files to test the APIs:
1. Navigate to the `PostMan` directory in the repository root.
2. Import the following files into Postman:
   - `MiniCRM.postman_collection.json`
   - `MiniCRM.postman_environment.json`

## Features
- Admin user management
- CRUD functionality for CRM entities
- API endpoints for integration

## Contribution
This is a test task asked by one of my private client.

## License
This project is open-source and available under the [MIT License](LICENSE).

---
For any questions or issues, please contact [Satish Bhaisaniya](mailto:satish.owlok@gmail.com).
