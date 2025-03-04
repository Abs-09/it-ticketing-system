# **IT TICKETING SYSTEM**

The IT Ticketing System is designed to streamline the process of managing technical issues and service requests within an organization. It allows users to create tickets when they encounter problems or require technical support, ensuring these issues are addressed in an organized and efficient manner. The system enables users to log their issues with detailed descriptions, categorize the type of problem, and prioritize requests based on urgency.

# **Technical Requirements**

### **1. Project Overview**

The IT Ticketing System will be developed to help users report technical issues and service requests, allowing the IT team to efficiently manage and resolve these tickets. The system will be developed using Laravel 10, a popular PHP framework, along with MySQL as the database solution.

### **2. System Requirements**

### **2.1. Development Environment**

- **Operating System**: Windows (any version with support for development environments)
- **PHP Version**: PHP 8.1
- **Composer**: Dependency management tool for PHP packages
- **NPM**: Node.js package manager for managing JavaScript dependencies
- **Laravel Version**: Laravel 10 (latest stable release)
- **MySQL**: Version 5.7 or later (as the database solution)
- **Laragon**: A portable, isolated, fast, and powerful universal development environment for running local web applications

### **2.2. Software Requirements**

- **Composer**: Required to install Laravel and other PHP dependencies.
- **NPM**: Required to install front-end packages like JavaScript frameworks (e.g., Vue.js, Bootstrap, or other libraries used for the front-end).
- **Laragon**: To create a local development server for the Laravel application, providing an easy-to-use environment with support for MySQL, PHP, and Apache or Nginx.
- **MySQL Database**: To store ticketing data, user information, and IT staff data.

### **2.3. Hardware Requirements**

- **Processor**: 2.5 GHz Dual-Core or higher
- **RAM**: Minimum 4 GB (8 GB recommended for better performance)
- **Storage**: 10 GB or more of available storage space for application files and MySQL database

### **3. Technical Stack**

### **3.1. Backend**

- **Laravel 10 (PHP 8.1)**: The core framework for application logic, routing, authentication, and database interaction.
- **MySQL**: Database management system for storing ticket details, users, staff, and resolution logs.

### **3.2. Frontend**

- **Blade Templates**: Laravel’s templating engine for creating dynamic front-end views.
- **JavaScript/CSS (Tailwind)**: Managed via NPM for handling UI interactivity and styling.

# **Project Setup & Packages Used**

### **1. System Setup Instructions**

1. **Install Laragon**: 
    
    Download and install Laragon for easy management of your local environment. Laragon will handle MySQL, PHP, and the web server for you.
    
2. **Install PHP 8.1**:
    
    Ensure PHP 8.1 is installed and set as the default PHP version in Laragon.
    
3. **Install Composer**:
    
    Download and install Composer for managing PHP dependencies.
    
4. **Install Node.js (includes NPM)**:
    
    NPM will be required for managing front-end packages. Download Node.js which comes with NPM.
    
5. **Set up Laravel 10**:
    
    Once Composer is installed, Laravel project can be created by running:
    
    ```lua
    composer create-project --prefer-dist laravel/laravel it-ticketing-system
    ```
    
    However, in a our case the project already exists so the above step is not required, rather, we just have to clone it from the GitHub repo.
    
    ```lua
    git clone {github repo link}
    ```
    
    After cloning the repo, cd into the cloned directory and run the composer install command
    
    ```lua
    cd {project-directory}
    composer install
    ```
    
6. **Install Frontend Dependencies**:
    
    Run the following command to install frontend libraries:
    
    ```lua
    npm install
    ```
    
7. **Set up MySQL Database**:
    
    Use Laragon to create and manage the MySQL database for the project. Define the database credentials in the `.env` file of the Laravel project (Shown in step 8).
    
8. **Configure Environment Variables**:
    
    Ensure the `.env` file is properly configured with the database, mail, and other service credentials.
    
    If the project is cloned from the GitHub repository run the command below before setting up the `.env` file.
    
    ```lua
    cp .env.example .env
    ```
    
    With a Laragon database setup the `.env` file is as follows
    
    ```lua
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=it_ticketing_system
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    
9. **Generating a Key and Initiating Database with Seeder:**
    
    This step is required if the project is cloned from the git repository.
    
    First, generate the key using:
    
    ```lua
    php artisan key:generate
    ```
    
    The next step is to initiate the database tables and fill it with seeder data. Before this step, it is important the the database is created and the `.env` file is configured correctly.
    
    ```lua
    php artisan migrate --seed
    ```
    
10. **Link Storage**
    
    The application requires file management. Hence, we need to link the storage by running the following command.
    
    ```lua
    php artisan storage:link
    ```
    
11. **Serve the Application**:
    
    Open terminal or cmd. Start the Laravel development server and load the front end components with php artisan ser && npm run dev

# Functional and Non-Functional Requirements

## **Functional Requirements**

1. **User Management**
    - Users should be able to log into the system.
    - Admins can manage user roles (e.g., users, technical staff, administrators) and create user.
    - Users can update their profiles and manage their account settings.
2. **Ticket Creation and Submission**
    - Users must be able to create new tickets for technical issues.
    - Tickets should include a detailed description of the issue, priority level, and relevant attachments (e.g., screenshots).
    - Users should be able to select categories for the issue (e.g., network, hardware, software, etc.).
3. **Ticket Assignment**
    - Technical staff should be able to assign themselves open tickets.
4. **Ticket Tracking and Status Updates**
    - Users should be able to track the status of their submitted tickets (e.g., open, in progress, resolved, closed).
    - Technical staff should update ticket statuses and provide comments or solutions.
5. **Communication**
    - Users and technical staff should be able to communicate through the ticket interface (adding comments, updates, or clarifications).
6. **Search and Filter Tickets**
    - Users and technical staff should be able to search and filter tickets based on status, priority, and date.
7. **Ticket Prioritization**
    - The system should allow users or admins to set the priority of each ticket (e.g., low, medium, high).
    - Technical staff can sort and manage tickets based on priority.
8. **Reporting and Analytics**
    - Admins should have access to reporting tools that provide insights into system performance, such as the number of open tickets, average resolution time, and staff performance.
    - The system should generate daily, weekly, and monthly reports on ticket statuses and activities.
9. **Ticket Closure and Resolution**
    - Technical staff must be able to mark tickets as resolved.
    - Users should have the ability to close tickets if the issue is satisfactorily resolved.
10. **Role-Based Access Control (RBAC)**
    - Different levels of access should be granted based on user roles (admin, technical staff, user).

    
