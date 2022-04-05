# wordpress-child

> An intuitive WordPress child theme boilerplate with basic setup of VSCode, Prettier and CodeSniffer to enforce a consistent HTML, CSS, JavaScript & PHP coding styles taking care of the WordPress coding conventions.

## Requirements

- [Composer](https://getcomposer.org/) (_PHP >=7.4_)
- [Node](https://nodejs.org/) (_LTS recommended_)
- [VSCode](https://code.visualstudio.com/) (_with recommended extensions installed_)

## Installation

To start using all the project's tools you need to install the necessary dependencies with Node.js and Composer:

```sh
npm install
```

```sh
composer install
```

## Initial Setup

Edit the [**`theme.json`**](./theme.json) file on project's root with your child theme variables and execute:

```sh
npm run setup
```

The child theme is ready **_— Happy coding!_** 🤖

## Configuration

### `theme.json`

```json
{
  "parentthemename": "The name of the parent-theme",
  "textdomain": "Theme text domain for i18n",
  "Theme_Name": "It appears on code comment's headers",
  "THEME_NAME_": "Global variables",
  "ThemeName": "Namespaces"
}
```

### PHP 7+

Set the path to a PHP 7+ executable in your VSCode **`settings.json`** or in the workspace, example:

```json
{
  "php.executablePath": "/Applications/XAMPP/xamppfiles/bin/php"
}
```

## Developer

- 💬 If you have a **question or suggestion** leave a message on [Issues](https://github.com/whoisjorge/wordpress-child/issues) section.
- 🐞 You can open a [Pull Request](https://github.com/whoisjorge/wordpress-child/pulls) to **add new features** or **fix a bug**.

### Known Issues

Unintended behavior using MacOS with built-in PHP (php@7.4 should fix the following on VSCode extensions):

- `phpcs` extension doesn't lint correctly (_PHP 8.1_)
- `phpcbf` extension doesn't format using WPCS sniffs (_PHP 8.1_)

### Useful Documentation

> ~~📄 The project **documentation** is available at ...~~

- [Prettier configuration](https://prettier.io/docs/en/options.html)
- [PHP_CodeSniffer repository](https://github.com/squizlabs/PHP_CodeSniffer)
- [WordPress Coding Standards for PHP_CodeSniffer](https://github.com/WordPress/WordPress-Coding-Standards)
- [phpcs extension for VSCode](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs)
- [phpcbf extension for VSCode](https://marketplace.visualstudio.com/items?itemName=persoderlind.vscode-phpcbf)
- [Official WordPress Developer Resources](https://developer.wordpress.org/)
- [phpDocumentor](https://docs.phpdoc.org/guide/references/phpdoc/tags/index.html#tag-reference)

## License

This is free software: you can redistribute it and/or modify it under the terms of the [GNU General Public License](LICENSE).
