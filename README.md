# wordpress-child

> An intuitive WordPress child theme boilerplate with basic setup of VSCode and Prettier to enforce a consistent coding style for the PHP language.

## Requirements

- [Node](https://nodejs.org/) (_LTS recommended_)
- [VSCode](https://code.visualstudio.com/) (_with recommended extensions installed_)

## Installation

To start using all the tools you need to install the necessary Node.js dependencies:

```sh
npm install # or yarn
```

## 🤖 Initial setup

Edit **`project.json`** file on root with your Child Theme variables and execute:

```sh
npm run setup # or yarn setup
```

## Configuration

### **_`./project.json`_**

```json
{
  "parentthemename": "The name of the parent-theme",
  "textdomain": "Theme text domain for i18n",
  "Theme_Name": "It appears on code comment's headers",
  "THEME_NAME_": "Global variables",
  "ThemeName": "Namespaces"
}
```

### Ignoring code:

1. `.prettierignore` to ignore certain files and/or folders completely.
2. `// prettier-ignore` comments to ignore parts of files.

## Caveats

- `@prettier/plugin-php` - Formatting of files that contain mixed PHP and HTML is still considered unstable, see [plugin-php issues](https://github.com/prettier/plugin-php/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc+label%3Ainline).

## License

This is free software; you can redistribute it and/or modify it under the terms of the [GPL-2.0 License](LICENSE).
