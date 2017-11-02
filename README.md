code-coverage
======

> code-coverage - [php](http://php.net) command line tool for analysing [phpunit](https://phpunit.de) xml code coverage report

## Install
Via Composer

```sh
composer require g4/code-coverage
```

## Usage

Before running code-coverage, run phpunit with --coverage-clover option to generate code-coverage xml file

```sh
./vendor/bin/phpunit --coverage-clover=path/to/code-coverage.xml
```

```sh
usage: code-coverage [<options>]

Analyze phpunit coverage report.

OPTIONS
  --file, -f         Path to phpunit's code coverage xml report
  --help, -?         Display this help.
  --percentage, -p   Minimum coverage percentage to be considered "highly"
                     covered.

e.g.
./vendor/bin/code-coverage -p 90 -f path/to/code-coverage.xml

output:
 Required:     90.00%
   Methods:    91.43%
   Statements: 95.58%
   Elements:   94.59%
```

## Development

### Install dependencies

    $ composer install

### Run tests

    $ composer unit-test

## License

(The MIT License)
see LICENSE file for details...
