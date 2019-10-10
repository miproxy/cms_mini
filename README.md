# cms_mini

1. To start application just copy folder to www location on your server.
Name should stay same (cms_mini). Due to short time this option is not developed to be changeable.

2. Next step is to open cms_mini/config/config.php file and to set credentials for loading database.
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_NAME', 'demo');

Database name could be anything. At first running of application, it will be run installation mechanism for setting
new database (with any chosen name), all needed tables and inserting demo data.

 - Admin account is accessible with following credentials:
       username: admin
       password: demo123
 - User accounts are accessible with following credentials:
       username: user{name_of_user}
       password: 123456

3. If there is no errors after first run, application is all set and good to go!

Remark: Email sending will work only if SMTP settings are correctly set on server (php.ini)
