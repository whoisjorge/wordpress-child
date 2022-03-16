# wordpress-child

> A minimalistic WordPress child theme boilerplate with basic setup of VSCode and Prettier to enforce a consistent coding style for the PHP language.

## Requirements

- [Node](https://nodejs.org/) (_LTS recommended_)
- [VSCode](https://code.visualstudio.com/) (_with recommended extensions installed_)

## Install

```sh
npm install # or yarn
```

## Usage

Simplest as start developing!

## Configuration

### Replacements

- `THEME_NAME_`
- `ThemeName`
- `parentthemename`

### Development

Comment `files.exclude` from `.vscode/settings.json` to have full flexibility of the project files and features.

### Caveats

- Formatting of files that contain mixed PHP and HTML is still considered unstable, see [plugin-php issues](https://github.com/prettier/plugin-php/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc+label%3Ainline).

## License

This is free software; you can redistribute it and/or modify it under the terms of the [GPL-2.0 License](LICENSE).
