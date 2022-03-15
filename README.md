# wordpress-child

> A minimalistic WordPress child theme boilerplate with basic setup of VSCode and Prettier to enforce a consistent coding style for the PHP language.

## Requirements

- [Node](https://nodejs.org/) (_LTS recommended_)
- [VSCode](https://code.visualstudio.com/) (_with recommended extensions installed_)

## Install

```sh
npm install # or yarn
```

## Example

### Input

<!-- prettier-ignore -->
```php
<?php
array_map(function($arg1,$arg2) use ( $var1, $var2 ) {
    return $arg1+$arg2/($var+$var2);
}, array("complex"=>"code","with"=>
    function() {return "inconsistent";}
,"formatting"=>"is", "hard" => "to", "maintain"=>true));
```

### Output

```php
<?php

array_map(
  function ($arg1, $arg2) use ($var1, $var2) {
    return $arg1 + $arg2 / ($var + $var2);
  },
  [
    'complex' => 'code',
    'with' => function () {
      return 'inconsistent';
    },
    'formatting' => 'is',
    'hard' => 'to',
    'maintain' => true,
  ]
);
```

## Configuration

### Replacements

- `THEME_NAME_`
- `ThemeName`
- `parentthemename`

### Preferred bracet style

- "braceStyle": "psr-2"
- "braceStyle": "1tbs"

### Ignoring code

Use `.prettierignore` to ignore (i.e. not reformat) certain files and folders completely.

Use `// prettier-ignore` comments to ignore parts of files.

### Caveats

- Formatting of files that contain mixed PHP and HTML is still considered unstable, see [plugin-php issues](https://github.com/prettier/plugin-php/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc+label%3Ainline).
  - Another solution could be [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client).

## License

See the [LICENSE](LICENSE) file for details.
