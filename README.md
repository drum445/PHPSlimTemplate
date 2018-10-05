## Prereqs  
$ sudo apt install apache2  

$ sudo apt install php libapache2-mod-php php-mysql  
$ sudo apt install composer  

in app's root folder  
$ composer require slim/slim "^3.0"  

### To allow url rerouting
$ sudo a2enmod rewrite  
$ sudo nano /etc/apache2/apache2.conf  
	change <Directory /var/www/>  
		to have AllowOverride All  

### Finally
$ sudo service apache2 restart

## Simple DB base
Run dbinit.sql into MySQL  

## Hosting/Running
Have apache serve up the folder and browse to: http://localhost/app  

## Endpoints
### Person
**Check if user is logged in, if so returns username and token**  
GET: http://localhost/app/person  

**Attempt to login, currently simply checks if username is drum**  
POST: http://localhost/app/person
```json
{
  "username": "drum",
  "password": "password"
}
```

**Logout**  
DELETE: http://localhost/app/person

### Customers (Requires auth)
**Return all**  
GET: http://localhost/app/customer  

## Configuration
**Changes you may want to make**  
Session name: config/bootstrap.php  
CORS Origins: config/middleware.php  
DB Connection: config/settings.php

