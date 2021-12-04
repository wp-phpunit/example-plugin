# Example Plugin

[![Build Status](https://app.travis-ci.com/wp-phpunit/example-plugin.svg?branch=master)](https://app.travis-ci.com/wp-phpunit/example-plugin)

A complete example for using WP PHPUnit in the context of plugin development.

## Features

**Travis CI Configuration**

A ready to use `.travis.yml` configured with a reasonable test matrix
- Includes all currently supported versions of PHP (7.4 and 8.0) and the current WP minimum required PHP 5.6
- Tests against the latest version of WordPress, as well as an older version (4.9) although it could be easily extended to include multiple older versions, multisite, etc.

**Just Add Tests**

This project includes a working example `test-example.php` test case. Adding tests is as simple as adding methods to this example class! Getting up and running couldn't be easier.

## Local Development

Install Composer dependencies

```sh
$ composer install
```

Create a database for your tests to use and update your `tests/wp-config.php` as necessary.

```sh
$ mysqladmin create wp_phpunit_tests -u root
```

The database name defaults to `wp_phpunit_tests`, but you can change this in the `tests/wp-config.php` without affecting the Travis configuration which is environment variable-based.

Run the tests

```sh
$ composer test
```
