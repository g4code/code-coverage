code-coverage
======

> code-coverage - [php](http://php.net) command line tool for analysing [phpunit](https://phpunit.de) xml code coverage report

## Install
Via Composer

```sh
composer require g4/code-coverage
```

## Usage

```sh
usage: code-coverage [<options>]

Analyze phpunit coverage report.

OPTIONS
  --file, -f         Path to phpunit's code coverage xml report
  --help, -?         Display this help.
  --percentage, -p   Minimum coverage percentage to be considered "highly"
                     covered.

e.g.
./vendor/bin/code-coverage -p 90 -f tests/unit/coverage/code-coverage.xml

```

## Development

### Install dependencies

    $ composer install

### Run tests

    $ make unit-tests

## License

(The MIT License)
see LICENSE file for details...
