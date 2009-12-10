# Symphony CMS (German)

Überträgt [Symphony CMS](http://www.symphony-cms.com) ins Deutsche.

- Version: 1.0
- Author: Nils Hörrmann, post@nilshoerrmann.de
- Build Date: 10th December 2009
- Requirements: Symphony CMS 2.0.x

## Installation

### Option 1

This option allows authors to specify personal preferences for a language and allows you to change the system language in your system preferences through the administration panel.

Download the [Localisation Manager](http://github.com/nilshoerrmann/localisationmanager) and install this extension. This language file is supposed to be included in the [Localisation Manager](http://github.com/nilshoerrmann/localisationmanager) in the near future. If it is not available yet, move the `lang.de.php` file to the `/extensions/localisationmanager/lang` directory in your [Symphony CMS](http://www.symphony-cms.com) installation.

After installing Localisation Manager successfully, you'll find a new setting in your preferences allowing you to switch the system language. Authors can override this global preference with a custom setting in their profiles.

### Option 2

This option works without the [Localisation Manager](http://github.com/nilshoerrmann/localisationmanager) and is less flexible. It only allows you to set the system language manually in the configuration file, and does not allow authors to specify a personal preference for a language.

Move `lang.de.php` to the `/symphony/lib/lang` directory. Open `/manifest/config.php` and look for `'lang' => 'en'`. Replace this line with `'lang' => 'de'`.

## Contributing

If you like to contribute an updated language file, please fork this repository and commit your changes.


## Change log

### Version 1.0, 10th December 2009:

- Initial release.