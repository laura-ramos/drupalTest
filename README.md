# DDEV powered Drupal 10 With Composer Installation

This is a sample Drupal 10 with Composer installation pre-configured for use with DDEV.

Features:

- Drupal 10 Composer Project
- Using the [DDEV](https://ddev.readthedocs.io/en/latest/)
- PHP 8.3 and MySQL 8.0 settings

## Setup instructions

### Step #1: DDEV environment setup

**This is a one time setup - skip this if you already have a working DDEV environment.**

Follow [DDEV Installation](https://ddev.readthedocs.io/en/stable/users/install/ddev-installation/)

  ```bash
  brew install ddev/ddev/ddev
  mkcert -install
  ```

### Step #2: Project setup

1. Clone this repo into your Projects directory

    ```bash
    git clone git@github.com:felimargom/drupal10.git drupal10
    cd drupal10
    ```

2. Initialize the site

    This will initialize local settings and install the site via DDEV

    ```bash
    ddev start
    ```

   A `composer.lock` file will be generated. This file should be committed to
   your repository.

3. Import database

    ```bash
    ddev import-db --file=DB_drupal10.sql
    ```

4. Run composer and drush

    ```bash
    ddev composer install
    ddev drush cr
    ddev drush updb
    ```

5. Point your browser to

    ```bash
    ddev launch
    ```

When the automated install is complete the command line output will display the
admin username and password.

## Security notice

This repo is intended for quick start demos and includes a hardcoded value for
`hash_salt` in `settings.php`.
If you are basing your project code base on this repo, make sure you regenerate
and update the `hash_salt` value.
A new value can be generated with
`ddev drush ev '$hash = Drupal\Component\Utility\Crypt::randomBytesBase64(55); print
$hash . "\n";'`
