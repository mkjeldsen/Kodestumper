# A selection of PHP-script to use in split testing calculations

## ztable.php

A function for looking up a value in a z-table.

### Examples

Todo: Look up the value for z=1.4 and alpha=0.05:
```php
echo ztable(1.4,5); // returns 0.4265
```

Todo: Look up the value for z=0.6 and alpha=0.02:
```php
echo ztable(0.6,2); // returns 0.2324
```

Todo: Look up the value for z=3.6 and alpha=0.07:
```php
echo ztable(3.6,7); // returns 0.4999
```
