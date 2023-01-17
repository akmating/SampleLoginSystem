# SampleLoginSystem
#To be able to use tha application, install xampp first
<br>
#On phpmyadmin create a database named "loginsystem"
<br>
#Create a table inside the database using this sql
```sql
  CREATE TABLE users (
  id_number int(20) AUTO_INCREMENT PRIMARY KEY not null,
  user_id TINYTEXT not null,
  user_pwd LONGTEXT not null,
  user_email TINYTEXT not null
  );
```
