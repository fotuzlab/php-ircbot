#!/usr/bin/env bash

apt-get update
sudo apt-get install php7.0 php7.0-curl php7.0-cli doxygen graphviz -y
php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');"
php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer --version
rm -rf /tmp/composer-setup.php
cd /vagrant
composer install
doxygen .setup/doxygen/Doxyfile
