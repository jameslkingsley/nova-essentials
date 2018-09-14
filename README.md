# Laravel Nova Essentials

This package adds some useful field macros for text case, JSON and more to come. To install it simply require the composer package (and register the service provider if you're using an older version of Laravel).

```
composer require jameslkingsley/nova-essentials
```

### Text Case

This macro is available for all fields.

```php
Text::make('Brand')
    ->studlyCase()
    ->camelCase()
    ->snakeCase()
    ->kebabCase()
    ->titleCase()
```

### JSON From Object

Sometimes your JSON field is converted to an object in your application. For this situation you can use this macro. **Note: this macro will automatically call the native Nova `json()` method.**

```php
Code::make('Notifications')->jsonFromObject()
```
