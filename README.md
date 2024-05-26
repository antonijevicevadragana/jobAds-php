This job classifieds application is built using the principles of <b> Object-Oriented Programming (OOP) using vanila PHP </b>. It enables posting and browsing job listings
(HTML5, CSS, Bootstrap 5, PHP).
![JOBADS-PHP](/public/images/jobadsCover.png)

<h3 align="left">Iinstallation and settings</h3>

1. Clone the repository
2. Create a database called `joblistings`
3. Import the `joblistings.sql` file into your database
4. Rename `config/_db.php` to `config/db.php` amd update with your credentials
5. Run compose install to set up the autoloading
6. Set your document root to the public directory

<h3 align="left">Setting the Document Root</h3>
You will need to set your document root to public directory:
If you are using the PHP built-in server, you can run the following command:


`php -S localhost:8000 -t public`

If you are using XAMPP, you can set the document root in the `httpd.conf` file. Here is an example:

```conf
DocumentRoot "C:/xampp/htdocs/jobAds-php/public"
<Directory "C:/xampp/htdocs//jobAds-php/public">
```
If you are using MAMP, you can set the document root in the `httpd.conf` file. Here is an example:

```conf
DocumentRoot "/Applications/MAMP/htdocs/jobAds-php/public"
<Directory "/Applications/MAMP/htdocs/jobAds-php/public">
```
