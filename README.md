# Sport Chek
This is a project developed for Fanshawe College. It is a custom CMS for Sport Chek products.

## Features
Here are some features of the project:

* User authentication - Access the admin panel when you go to /admin
* Filtering - You can go through products by category
* Add a product and user
* Edit a product and user
* Delete a product and user

## What You Need

You must have [git](https://git-scm.com/downloads), [npm]((https://www.npmjs.com/get-npm), and your choice of a solution stack such as MAMP, XAMPP, or WAMP.

### Installing

1. Clone the branch
```
git clone https://github.com/jobaile/Baile_J_3014_CMS
```

2. Install dependencies:
```
npm install
```

3. Compile Sass:
```
gulp sass
```

4. Import database (`database/db_cms`) to your phpMyAdmin and configure database connection in `admin/script/connect.php`;

5. Copy entire project folder to `www` or `htdocs` folder of your localhost

## Built With
* [PHP](https://www.php.net/)

## The Team

* [Joanna Baile](http://joannabaile.com) - Developer
* [Nando D'Oria](http://nandodoria.ca) - Designer
