# SymBlog

SymBlog is a simple Blog made in Symfony.

Dependencies
-------------

1. PHP (Tested and developed with PHP 8.1.1)

2. PHP connector for MySQL (sudo apt-get intall php8.1-mysql).

3. Composer.

4. Symphony.


Deployment
-------------
Execute in the root project folder:

1. php composer.phar install
2. Edit the .env file with your DB information (it can be MySQL/SQLite...), make sure that the DB exists.
3. php bin/console doctrine:migrations:migrate
4. php bin/console doctrine:fixtures:load
5. symfony serve

The admin access credentials are:
- User: admin@alvaro.com
- Password: admin

Features
-------------
- View Post
- Search Post
- Admin Panel
	- Create Post
	- Delete Post
	- Edit Post

Images
-------------
### Main Page
![Main Page](https://raw.githubusercontent.com/alvarodh5/SymBlog/main/readme_imgs/1.png)

### Post
![Post](https://raw.githubusercontent.com/alvarodh5/SymBlog/main/readme_imgs/2.png)

### Search Feature
![Search Feature](https://raw.githubusercontent.com/alvarodh5/SymBlog/main/readme_imgs/3.png)

### Admin Dashboard
![Admin Dashboard](https://raw.githubusercontent.com/alvarodh5/SymBlog/main/readme_imgs/4.png)

### Admin Create Post
![Admin Post](https://github.com/alvarodh5/SymBlog/blob/main/readme_imgs/5.png)



*This project is a simple PHP fork version from [news_cms](https://github.com/NESTicle/news_cms/)*
