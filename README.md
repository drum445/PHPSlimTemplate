## Setup
$ composer install  

## Simple DB base
Run dbinit.sql into MySQL  

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

