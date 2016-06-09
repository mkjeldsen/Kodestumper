# Mysql Result Output to Table - Generic

## Description
A generic function to dynamically output a MySQL result in a html table or javascript console.table().

Takes whatever it recieve in the MySQL result and turns it into a standard table, including a row with the corresponding column names.

Ideal for debugging :-)

## How to use

1. Include the function in your PHP project.
2. Whereever you want to output the table, call `mysql_output_result_table($sql,$conn,$output_to);`.
  - `$sql` is the raw sql statement, e.g. `"SELECT * FROM table"`.
  - `$conn` is a _working_ [mysqli database connection](http://php.net/manual/en/mysqli.quickstart.connections.php).
3. Done!

### Output to javascript console:
`$output_to` will output a html table as default. Set `$output_to` to `console` to output the table in your browser's javascript console instead.

*Like this:*
```php
mysql_output_result_table($sql,$conn,'console');
```

