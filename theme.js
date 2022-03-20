const path = require('path')
const fs = require('fs')
const project = require('./theme.json')

const glob = require('glob')
require('pretty-error').start()

/**
 * This script is ran to execute all custom variable and textdomain
 * replacements of the child theme in once. Overwrites project files
 * based on ./theme.json configuration.
 *
 * @example npm run setup
 * @return {Promise<void>}
 */
glob(
  /*
   * {String} Pattern to be matched (target all files)
   *          https://github.com/isaacs/node-glob#glob-primer
   */
  '**/*.*',

  /*
   * {Object} Options (exclude matches)
   *          https://github.com/isaacs/node-glob#options
   */
  {
    ignore: [
      path.basename(__filename), // This script
      'project.json', // The project's data
      'assets/**',
      'README.md',
      // 'composer.json',
      'package.json',
      'LICENSE',
      'node_modules/**',
      'vendor/**',
      'screenshot.png',
      'composer.lock',
      'package-lock.json',
      'yarn.lock',
    ],
  },

  /**
   * Callback function.
   *
   * @param {Array<String>} filesArray filenames found matching the pattern.
   */
  function (err, filesArray) {
    if (err) throw err
    // console.log(filesArray)

    filesArray.forEach((fileName, index, array) => {
      /*
       * Read every file and return the content of each.
       */
      fs.readFile(fileName, 'utf8', (err, fileContent) => {
        if (err) throw err

        /*
         * Replace matched search values on each file.
         * @example replace(searchValue, newValue)
         */
        const replace = fileContent
          .replace(/THEME_NAME_/g, project.THEME_NAME_)
          .replace(/ThemeName/g, project.ThemeName)
          .replace(/Theme_Name/g, project.Theme_Name)
          .replace(/parentthemename/g, project.parentthemename)
          .replace(/textdomain/g, project.textdomain)

        /*
         * Rewrite values and save the new files.
         */
        fs.writeFile(fileName, replace, 'utf8', function (err) {
          if (err) throw err
        })
      })
    })
  }
)
