# Sainsbury's test

Is script for crawl products from HTML and transfer them into structured JSON format.

### Dependency
* PHP 5.3.0+
* [Guzzle] - HTTP client
* [Symfony DOM Crawler] - HTML Dom crawler for parsing HTML
* [Symfony CSS selector] - CSS Selector for searching and filtering in HTML

[Guzzle]: <https://github.com/guzzle/guzzle>
[Symfony DOM Crawler]: <http://symfony.com/doc/current/components/dom_crawler.html>
[Symfony CSS selector]: <http://symfony.com/doc/current/components/css_selector.html>
[composer]: <https://getcomposer.org/>
[git]: <https://git-scm.com/downloads>
### Version
1.0

### Instalation
To install this library we will need to have installed [git] and [composer]

```bash
# Clone project
git clone https://github.com/kamilhurajt/snbury.git
cd snbury
```
Next, run composer command from root directory where composer.json is located to install and download dependencies and update library to latest version

```bash
#updating and sintalling dependencies
composer update
```

### Usage
From root/src/public/ directory of library run command:
```bash
cd src/public/
php index.php
```

### Runing unit tests
From root directory of library run command:
```bash
 ./vendor/bin/phpunit ./tests/
```

License
----

MIT

**Free Software, Hell Yeah!**

