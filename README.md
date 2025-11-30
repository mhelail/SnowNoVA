# SnowNoVA – OWASP Top 10 Educational Web Security Site

SnowNoVA is a small web application I built to practise and explain web security concepts from the OWASP Top 10.  
It runs locally on XAMPP and shows simple vulnerable examples next to more secure versions.

## What the site includes

- Example pages for common web security issues, such as:
  - SQL Injection (SQLi)
  - Cross-Site Scripting (XSS)
  - Insecure login / authentication problems
  - Security Logging and Monitoring Failures
  - Software and Data Integrity Failures
- Short notes on each page about:
  - what the vulnerability is,
  - how an attacker could abuse it,
  - and what a more secure approach looks like.
- Simple logging examples to compare weak logging vs better logging.

## Tech Stack

- **Frontend:** HTML, CSS, basic JavaScript  
- **Backend:** PHP (XAMPP / local server)  
- **Database:** MySQL  

## How to run (local XAMPP)

1. Copy the project folder into your XAMPP `htdocs` directory, for example:  
   `C:\xampp\htdocs\SnowNoVA`

2. Start Apache and MySQL from XAMPP Control Panel.

3. Create the database in MySQL:  
   - Go to `http://localhost/phpmyadmin`  
   - Create a database (e.g. `snow_nova`)  

4. Update the database config in the project:  
   - Open the PHP config file that holds the connection details (e.g. `config.php` or `config/db.php`)  
   - Set your own:
     - host  
     - username  
     - password  
     - database name  

5. Open the site in your browser:  
   `http://localhost/SnowNoVA`
