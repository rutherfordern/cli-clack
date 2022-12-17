start:
	./cliclack

test:
	composer exec --verbose phpunit tests

dump:
	composer dump-autoload

install:
	composer install