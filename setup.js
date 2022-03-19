const fs = require('fs');
const glob = require('glob');
const path = require('path');
var project = require('./project.json');

/**
 * We run this script to execute all replacements of the child theme in once.
 * @example npm run script
 */
glob(
  '**/*.*',
  {
    // onlyFiles: true,
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
  function (err, files) {
    if (err) throw err;

    /**
     * We execute string replacement on each file.
     */
    files.forEach((fileName, index, array) => {
      fs.readFile(fileName, 'utf8', (err, fileData) => {
        if (err) return console.log(err);

        const replace = fileData
          .replace(/THEME_NAME_/g, project.THEME_NAME_)
          .replace(/ThemeName/g, project.ThemeName)
          .replace(/Theme_Name/g, project.Theme_Name)
          .replace(/parentthemename/g, project.parentthemename)
          .replace(/textdomain/g, project.textdomain);

        // TO DO: REWRITE
        // fs.writeFile(fileName, replace, 'utf8', function (err) {
        //   if (err) return console.log(err);
        // });
      });
    });
  }
);
