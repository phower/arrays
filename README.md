Phower Arrayss
=============

Array based classes to handle collections, stacks and queues in PHP.

Requirements
------------

Phower Arrays requires:

-   [PHP 5.6](http://php.net/releases/5_6_0.php) or above; 
    version [7.0](http://php.net/releases/7_0_0.php) is recommended

Instalation
-----------

Add Phower Arrays to any PHP project using [Composer](https://getcomposer.org/):

```bash
composer require phower/arrays
```

Getting Started
---------------

### Collections

Collections is the base concept of this package. Each collection wraps an array
into a class with methods to handle its elements in a normalized way. Both concrete 
and abstract classes are provided.

```php
// index.php
require('path/to/vendor/autoload.php');

use Phower\Arrays\Collection;

$collection = new Collection();
```

Please review [Collection Interface](src/CollectionInterface.php) for more details
on available methods.

### Stacks

Stacks are collections where elements are always added to the top of the internal
array. This strategy allows a LIFO (Last In-First Out) handling.

```php
use Phower\Arrays\Stack;

$stack = new Stack();
```

Please review [Stack Interface](src/StackInterface.php) for more details
on available methods.

## Queues

Queues are collections with the ability to enqueue/dequeue elements. While enqueue
is similiar to add method, dequeue always remove the returned element from the queue.

```php
use Phower\Arrays\Queue;

$queue = new Queue();
```

Please review [Queue Interface](src/QueueInterface.php) for more details
on available methods.

Running Tests
-------------

Tests are available in a separated namespace and can run with [PHPUnit](http://phpunit.de/)
in the command line:

```bash
vendor/bin/phpunit
```

Coding Standards
----------------

Phower code is written under [PSR-2](http://www.php-fig.org/psr/psr-2/) coding style standard.
To enforce that [CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) tools are also 
provided and can run as:

```bash
vendor/bin/phpcs
```

Reporting Issues
----------------

In case you find issues with this code please open a ticket in Github Issues at
[https://github.com/phower/arrays/issues](https://github.com/phower/arrays/issues).

Contributors
------------

Open Source is made of contribuition. If you want to contribute to Phower please
follow these steps:

1.  Fork latest version into your own repository.
2.  Write your changes or additions and commit them.
3.  Follow PSR-2 coding style standard.
4.  Make sure you have unit tests with full coverage to your changes.
5.  Go to Github Pull Requests at [https://github.com/phower/arrays/pulls](https://github.com/phower/arrays/pulls)
    and create a new request.

Thank you!

Changes and Versioning
----------------------

All relevant changes on this code are logged in a separated [log](CHANGELOG.md) file.

Version numbers follow recommendations from [Semantic Versioning](http://semver.org/).

License
-------

Phower code is maintained under [The MIT License](https://opensource.org/licenses/MIT).
