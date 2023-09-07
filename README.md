---

# LibConfig-PHP

LibConfig-PHP is a PHP library that simplifies the management of YAML configuration files.

## Installation

You can install this library using [Composer](https://getcomposer.org/):

```bash
composer require amitxd/libconfig:^1.0
```

## Usage

### Initializing LibConfig

```php
use AmitxD\LibConfig\LibConfig;

// Initialize LibConfig with the path to your YAML configuration file
$config = new LibConfig('path/to/your/config.yaml');
```

### Getting Configuration Values

```php
// Get a configuration value by key, providing a default value if not found
$value = $config->get('key', 'default_value');
```

### Setting Configuration Values

```php
// Set a configuration value by key
$config->set('key', 'new_value');

// Save the changes back to the YAML file
$config->save();
```

## Example

Here's a simple example of how to use LibConfig:

```php
use AmitxD\LibConfig\LibConfig;

// Initialize LibConfig with the path to your YAML configuration file
$config = new LibConfig('config.yaml');

// Get a configuration value
$siteTitle = $config->get('site.title', 'My Website');

// Output the site title
echo "Site Title: $siteTitle\n";

// Set a new configuration value
$config->set('site.title', 'Updated Website Title');

// Save the changes back to the YAML file
$config->save();
```

## Requirements

- PHP ^8.0
- Symfony Yaml Component ^6.3

## License

This library is open-source software licensed under the [MIT License](LICENSE).


---