all: composer.phar vendors bower settings

composer.phar:
	curl -sS https://getcomposer.org/installer | php

vendors:
	php composer.phar self-update && php composer.phar install -o -vvvv

bower:
	bower install bootstrap --config.directory=public/bower_components
	bower install twig.js --config.directory=public/bower_components

settings:
	cp config/autoload/local.php.dist config/autoload/local.php