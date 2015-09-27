TradeTracker
============

Development Assessment for TradeTracker

Full description here: <http://trade-tracker.engwave.com/data/Developer%20Assessment%20v3.pdf>

Working solution here: <http://trade-tracker.engwave.com/>

Requirements
------------
* VirtualBox <http://www.virtualbox.com>
* Vagrant <http://www.vagrantup.com>
* Git <http://git-scm.com/>

Usage
-----

### Startup
	$ git clone https://github.com/rootree/TradeTracker.git .
	$ cd TradeTracker
	$ vagrant up

### Without Vagrant (bower has to be installed)
	$ git clone https://github.com/rootree/TradeTracker.git .
	$ cd TradeTracker/src
	$ make all

That is pretty simple.

Not necessary but if you copy config/autoload/local.php.dist to config/autoload/local.php and set up settings in this file, it will be nice.

	cp config/autoload/local.php.dist config/autoload/local.php

#### Apache
The Apache server is available at <http://localhost:8080>

Technical Details
-----------------
* Ubuntu 14.04 64-bit
* Apache 2
* PHP 5.5

### Backend

* Zend Framework 2
* PhpUnit 
* xml-string-streamer

### Frontend

* jQuery
* Bootstrap  
* Twig.js

And like any other vagrant file you have SSH access with

	$ vagrant ssh


### UnitTest

To run UnitTests go to src folder and perform this command:

	./vendor/bin/phpunit --stop-on-error --stop-on-failure
