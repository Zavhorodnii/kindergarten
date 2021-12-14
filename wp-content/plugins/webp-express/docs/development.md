## Updating the vendor dir:

1. Run `composer update` in the root (plugin root).
2. Run `composer dump-autoload -o`
(for some reason, `vendor/composer/autoload_classmap.php` looses all its mappings on composer update). It also looses them on a `composer dump-autoload` (without the -o option).
It actually seems that the mappings are not needed. It seems to work fine when I alter autoload_real to not use the static loader. But well, I'm reluctant to change anything that works.

3. Remove unneeded files:

- Open bash
- cd into the folder

```
rm -r vendor/rosell-dk/webp-convert/docs
rm -r vendor/rosell-dk/webp-convert/src/Helpers/*.txt
rm vendor/rosell-dk/dom-util-for-webp/phpstan.neon
rm composer.lock
rmdir vendor/bin
```

3. Commit on git


## Copying WCFM
I created the following script for copying WCFM build to webp-express:
```
#!/bin/bash

WCFM_PATH=/home/rosell/github/webp-convert-filemanager
WE_PATH=/home/rosell/github/webp-express/lib/wcfm
WCFMPage_PATH=/home/rosell/github/webp-express/lib/classes/WCFMPage.php

copyassets() {
  # remove assets in WebP Express
  rm -f $WE_PATH/index*.css
  rm -f $WE_PATH/index*.js
  rm -f $WE_PATH/vendor*.js

  # copy assets from WCFM
  cp $WCFM_PATH/dist/assets/index*.css $WE_PATH/
  cp $WCFM_PATH/dist/assets/index*.js $WE_PATH/
  cp $WCFM_PATH/dist/assets/vendor*.js $WE_PATH/


  #CSS_FILE = $(ls /home/rosell/github/webp-express/lib/wcfm | grep 'index.*css' | tr '\n' ' ' | sed 's/\s//')
  CSS_FILE=$(ls $WE_PATH | grep 'index.*css' | tr '\n' ' ' | sed 's/\s//')
  JS_FILE=$(ls $WE_PATH | grep 'index.*js' | tr '\n' ' ' | sed 's/\s//')


  if [ ! $CSS_FILE ]; then
    echo "No CSS file! - aborting"
    exit
  fi
  if [ ! $JS_FILE ]; then
    echo "No JS file! - aborting"
    exit
  fi

  echo "CSS file: $CSS_FILE"
  echo "JS file: $JS_FILE"

  # Update WCFMPage.PHP references
  sed -i "s/index\..*\.css/$CSS_FILE/g" $WCFMPage_PATH
  sed -i "s/index\..*\.js/$JS_FILE/g" $WCFMPage_PATH
}

if [ ! $1 ]; then
  echo "Missing argument. Must be build, copy or build-copy"
  exit
fi

buildwcfm() {
  npm run build --prefix $WCFM_PATH
}

if [ $1 = "copy" ]; then
  echo "copy"
  copyassets
fi

if [ $1 = "build" ]; then
  echo "build"
  buildwcfm
fi

if [ $1 = "build-copy" ]; then
  echo "build-copy"
  buildwcfm
  copyassets
fi
```