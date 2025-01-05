# BLOOD CONNECT: A Blood Bank Management System

*BLOOD CONNECT* is a comprehensive, web-based platform designed to streamline blood donation processes and enhance interactions among donors, users, hospitals, and administrators. The platform provides real-time access to a network of registered blood donors and ensures seamless communication and efficient management for all stakeholders. 

---

## Features
- *Donor Management:* Registration, profile updates, and donation request handling.  
- *User Search:* Search donors by blood group and availability, send requests, and track history.  
- *Hospital Interface:* Manage blood requests with verified donors.  
- *Admin Control:* Secure user registration, manage requests, approve/reject donations, and site content management.  
- *Real-Time Accessibility:* Access the system anytime, anywhere for seamless interaction.  

---

## Installation and Setup

Follow these steps to install and run the *Blood Connect* project on your local system using PHP, MySQL, and Apache server.

---

### Prerequisites
Ensure you have the following installed:
- *XAMPP* (Recommended for Apache, PHP, and MySQL)
- *Git* (optional for cloning the repository)

---

### Step 1: Clone or Download the Project
1. Clone the repository using Git:
   bash
   git clone https://github.com/your-repo/BloodConnect.git
   
   Or download the project as a ZIP file and extract it.

---

### Step 2: Set Up the Database
1. Start the *XAMPP* Control Panel and activate:
   - *Apache*
   - *MySQL*

2. Open *phpMyAdmin* in your browser at http://localhost/phpmyadmin.

3. Create a new database named blood_connect.

4. Import the SQL file:
   - Locate the file blood_connect.sql in the project folder.
   - Use the *Import* tab in phpMyAdmin to upload and import the file into your blood_connect database.

---

### Step 3: Configure the Project
1. Open the project folder and navigate to config or db directory (depending on the structure).  
2. Edit the database configuration file (e.g., db_config.php) and update it with your database credentials:
   php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "blood_connect";
   

---

### Step 4: Deploy the Project
1. Move the project folder to the htdocs directory in your XAMPP installation:
   
   C:\xampp\htdocs\BloodConnect
   

2. Start the Apache server from the XAMPP Control Panel.

3. Access the application in your browser:
   
   http://localhost/BloodConnect
   

---

### Step 5: Testing and Usage
- Use the default admin credentials (if provided in the project documentation) to log in as an administrator.
- Register as a donor, user, or hospital to explore the platform functionalities.

---

## Contributing
We welcome contributions to enhance this project! Follow these steps:
1. Fork the repository.
2. Create a new branch:
   bash
   git checkout -b feature-branch
   
3. Commit your changes:
   bash
   git commit -m "Add a new feature"
   
4. Push to the branch:
   bash
   git push origin feature-branch
   
5. Open a pull request.

---

## License
This project is licensed under the MIT License. See the LICENSE file for more details.

---

## Contact
If you encounter any issues or have questions, feel free to reach out:
- Email: (arjunsanthosh440@gmail.com)
- GitHub: ()

---


Happy coding! 🚀
