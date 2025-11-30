# \# SnowNoVA – OWASP Top 10 Educational Web Security Site

# 

# SnowNoVA is a small web application I built to practise and explain web security concepts from the OWASP Top 10.  

# It runs locally on XAMPP and shows simple vulnerable examples next to more secure versions.

# 

# \## What the site includes

# 

# \- Example pages for common web security issues, such as:

# &nbsp; - SQL Injection (SQLi)

# &nbsp; - Cross-Site Scripting (XSS)

# &nbsp; - Insecure login / authentication problems

# &nbsp; - Security Logging and Monitoring Failures

# &nbsp; - Software and Data Integrity Failures

# \- Short notes on each page about:

# &nbsp; - what the vulnerability is,

# &nbsp; - how an attacker could abuse it,

# &nbsp; - and what a more secure approach looks like.

# \- Simple logging examples to compare weak logging vs better logging.

# 

# \## Tech Stack

# 

# \- \*\*Frontend:\*\* HTML, CSS, basic JavaScript  

# \- \*\*Backend:\*\* PHP (XAMPP / local server)  

# \- \*\*Database:\*\* MySQL  

# 

# \## How to run (local XAMPP)

# 

# 1\. Copy the project folder into your XAMPP `htdocs` directory, for example:  

# &nbsp;  `C:\\xampp\\htdocs\\SnowNoVA`

# 

# 2\. Start Apache and MySQL from XAMPP Control Panel.

# 

# 3\. Create the database in MySQL:  

# &nbsp;  - Go to `http://localhost/phpmyadmin`  

# &nbsp;  - Create a database (e.g. `snow\_nova`)  

# &nbsp;  - Import the SQL file used by the project (if provided).

# 

# 4\. Update the database config in the project:  

# &nbsp;  - Open the PHP config file that holds the connection details (e.g. `config.php` or `config/db.php`)  

# &nbsp;  - Set your own:

# &nbsp;    - host  

# &nbsp;    - username  

# &nbsp;    - password  

# &nbsp;    - database name  

# 

# 5\. Open the site in your browser:  

# &nbsp;  `http://localhost/SnowNoVA`



