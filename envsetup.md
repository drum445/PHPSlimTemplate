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

## Hosting/Running
Have apache serve up the folder and browse to: http://localhost/app  