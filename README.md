TradeTracker
============

Development Assessment for TradeTracker

Full description here: <https://github.com/prewk/xml-string-streamer>

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

### Without Vagrant
	$ git clone https://github.com/rootree/TradeTracker.git .
	$ cd TradeTracker/src
	$ make all

That is pretty simple.

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
