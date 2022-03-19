const glob = require('glob');
const path = require('path');
const fs = require('fs');
var project = require('./project.json');

/**
 * This script is ran to execute all custom variable replacements of the child
 * theme in once. Example: npm run setup
 * @async
 * @return {Promise<void>}
 */
(async () => {
  glob(
    /*
     * Target all files pattern.
     * https://github.com/isaacs/node-glob#glob-primer
     */
    '**/*.*',

    /*
     * Add a pattern or an array of glob patterns to exclude matches.
     */
    {
      ignore: [
        path.basename(__filename), // This script
        'project.json', // The project's data
        'assets/**',
        'README.md',
        'package.json',
        'LICENSE',
        'node_modules/**',
        'screenshot.png',
        'package-lock.json',
        'yarn.lock',
      ],
    },

    /*
     * Execute the function.
     */
    function (err, filesArray) {
      if (err) throw err;

      filesArray.forEach((fileName, index, array) => {
        /**
         * Read every file and return the content of each.
         */
        fs.readFile(fileName, 'utf8', (err, fileContent) => {
          if (err) throw err;

          /**
           * Replace matched search values on each file.
           * @example replace(searchValue, newValue)
           */
          const replace = fileContent
            .replace(/THEME_NAME_/g, project.THEME_NAME_)
            .replace(/ThemeName/g, project.ThemeName)
            .replace(/Theme_Name/g, project.Theme_Name)
            .replace(/parentthemename/g, project.parentthemename)
            .replace(/textdomain/g, project.textdomain);

          /**
           * Rewrite values and save the new files.
           */
          fs.writeFile(fileName, replace, 'utf8', function (err) {
            if (err) return console.log(err);
          });
        });
      });
    }
  );
})();
