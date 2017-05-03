# atm
Distributed ATM

Built using PHP

# Usage
- Clone Repo into folder e.g `git clone git@github.com:PaulKish/atm.git`
- Run `composer install` to install dependencies
- Setup schema into a MySQL instance. Schema can be found in schema folder
- Create a db and set the correct configuration in index.php
- You can then run the app using the php server e.g `php -S localhost:8000`
- You can create a user by navigating to the url `http://localhost:8000/register/1000/1234/paul`, this will create a user paul, with account number 1000 and pin 1234
- You can also login using account no 1000 pin 1234
