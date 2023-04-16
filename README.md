# Simple Sylius Slider Plugin
Add slider functionality to your store.

![Sylius Slider Plugin](docs/slider.gif)

## Installation

### Download the plugin via composer

```bash
composer require allekslar/slider-plugin
 or
composer require allekslar/slider-plugin:dev-main
```

### Enable the plugin
Check if the plugin is registered in `config/bundles.php` file

```php
<?php

return [
    // ...
    Allekslar\SliderPlugin\AllekslarSliderPlugin::class => ['all' => true],
];
```

### Configure the plugin

```bash
composer run-script post-install-cmd -d ./vendor/allekslar/slider-plugin
```

### Update your database

```bash
bin/console doctrine:migrations:diff
bin/console doctrine:migrations:migrate
```



### Install assets & clear cache

```bash
bin/console assets:install
bin/console cache:clear
```

If you are using a theme in your project, you may need to run
```bash
bin/console sylius:theme:assets:install
 or
bin/console sylius:theme:assets:install public/_themes/<author>/<theme-name>

bin/console cache:clear
```

## Usage

##### 1. Create a slider in the admin to display on the main page, the "code" field must have the value as indicated below.

+ `code`: `homeslider`



### Remove plugin

```bash
composer run-script remove-cmd -d ./vendor/allekslar/slider-plugin

composer remove allekslar/slider-plugin
```


## TODO
