# Unique-URL-for-Website-s-Static-Content---PHP-Script
The script is fundamentally utilized for producing unique and irregular url with the end goal of securing site's primary static directory connect url while utilizing sql database for storing every unique key with components of permitted attempts and session for that connection.It can be utilized for ensuring both file downloads attempts and page going to visit in particular time.

1. Change the credentials of your main database in dbconnect.php with provided fields in it

2. Replace all the files in one folder including webpage/file which you want to protect from users with unique url

3. Change the values of attempts & session time in main_key.php according to your needs

4. Input the details of your downloadable file or webpage in unique_url_key.php file, it will generate the unique url for every user while storing every key in sql database

5. Send the unique link generated from unique_url_key.php file to user, it will follows the instructions mentioned by you in main_key.php for session out and valid attempts to the file or webpage

6. If there is only need to protect static webpage with unique url & session rather than some downloadable file then just redirect the user to unique_url_key.php file with providing some button
