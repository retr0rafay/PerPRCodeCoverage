# Crumb: A Cookie Manager
=============

**Example Usage**

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();
$crumb->set('cookie-name', 'cookie-value');

// Results in "cookie-value"
echo 'Cookie value is: '.$crumb->get('cookie-name');
?>
```

You can also customize the cookies a bit more:

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();

$cookie = Cookie::instance('cookie-name', 'cookie->value')
    ->setTimeout(1800)
    ->setDomain('localhost.com');

$crumb->set($cookie);
?>
```

## Using the Manager

The examples above show how to create a simple manager without any options. There's more you can do with this class than just that.

### Initializing with cookie values

If you already have values you want to create as simple cookies, you can also feed them in as a constructor parameter to the `Manager` and they'll be set up:

```php
<?php
$cookies = [
    'cookie1' => 'value1',
    'cookie2' => 'value2'
];
$crumb = new \SalesforceEng\Crumb\Manager($cookies);
?>
```

Additionally, this also can take in `Cookie` class instances if you need more configuration than just the key/value pair:

```php
<?php
$cookies = [
    Cookie::instance('cookie1', 'value1')->setTimeout(5000),
    Cookie::instance('cookie2', 'value2')->setSecure(true)
];
$crumb = new \SalesforceEng\Crumb\Manager($cookies);
?>
```

### Forcing the verification of cookies

Since users can delete cookies and `Crumb` only verifies if it finds a signature cookie, there's a way to can tell the manager that the cookies have to have the signature cookie otherwise the verification fails. This is done using the `forceVerify` method:

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();
$crumb->forceVerify();

// Or more concisely
$crumb = \SalesforceEng\Crumb\Manager::instance()->forceVerify();
?>
```

### Forcing all cookies to have a signature

You can also tell the manager that you want all cookies to have matching signature cookies created when they're made with the `signAll` method:

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();
$crumb->signAll();

// Or, again more concisely
$crumb = \SalesforceEng\Crumb\Manager::instance()->signAll();
?>
```

## Cookie methods

In the example above you see the `setTimeout` and `setDomain` methods being used on a `Cookie` instance. Here's the full list of methods that can be used to configure the cookies:

- `setTimeout(integer)`: The number of seconds to add to the current time (Unix epoch) for the lifetime of the cookie (default is `3600`)
- `setDomain(string)`: The domain to use on the cookie (defaults to value found in `$_SERVER['HTTP_HOST']`)
- `setHttpOnly(boolean)`: Set the cookie to be HTTP only (default is `false`)
- `setPath(string)`: Set the path for the cookie (defaults to `/`)
- `setSecure(boolean)`: Set the "secure" flag on the cookie (defaults to `false`)

So, an example of using all of these together could be:

```php
<?php

$cookie = Cookie::instance('cookie-name', 'cookie->value')
    ->setTimeout(1800)
    ->setDomain('localhost.com')
    ->setSecure(true)
    ->setHttpOnly(true)
    ->setPath('/foo');

?>
```

This sets a cookie named "cookie-name" with a value of "cookie-value" that will timeout in 30 minutes, will only be sent on HTTPS connections, is HTTP Only and has a path of `/foo`.

## Signing Cookies

*Crumb* also includes the ability to "sign" cookies to ensure the value in the original cookie was not tampered with. This verification happens behind the scenes of the cookie was created as "signed".

This can be done by adding the `sign()` method call to the cookie configuration:

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();
$crumb->set(
    Cookie::instance('cookie-name', 'cookie->value')->sign()
);

// You can also call the Manager with an "instance" method and do the same thing:
$crumb = \SalesforceEng\Crumb\Manager::instance()->set(
    Cookie::instance('cookie-name', 'cookie->value')->sign()
);
?>
```

When the "cookie-name" cookie is created, a secondary cookie will also be created, "cookie-name-hash" (the "-hash" is a hard-coded postfix value), that contains a HMAC hash (SHA256) of the contents of the cookie and a secret value from the code. When the `get()` method is called on the `Manager`, it checks for one of these hash cookies and performs the verification automatically.

```php
$crumb = new \SalesforceEng\Crumb\Manager();

// If the signature doesn't validate an \Exception is thrown here, otherwise the value is returned
$value = $crumb->get('cookie-name');
```

If you want to be *100% sure* they have a validation cookie (a user can delete them, after all) you can use the `forceVerify` method on the `Manager`:

```php
<?php
$crumb = new \SalesforceEng\Crumb\Manager();
$crumb->forceVerify();

$crumb->set(
    Cookie::instance('cookie-name', 'cookie->value')->sign()
);

// Now, if they delete the "cookie-name-hash" cookie manually, they'll get an \Exception calling:
$result = $crumb->get('cookie-name');
?>
```

## Verifying from external sources

You can use the `compare` method on the `Manager` class to evaluate the cookie and its signature against another data source. For example, you could pull a value from a database connection and compare the two for a match:

```php
<?php
$db = new \PDO('mysql:unix_socket=/tmp/mysql.sock;dbname=test', 'testuser', 'testpass');

// The closure should always return a boolean
$crumb->compare('testing3', function($cookie, $signature) use ($db) {
    $sth = $db->prepare('select * from hashes where user_id = 1');
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return ($result['hash'] === $signature);
});
?>
```

If the comparison fails `false` will be returned. You can also set the comparison function for later use:

```php

$db = new \PDO('mysql:unix_socket=/tmp/mysql.sock;dbname=test', 'testuser', 'testpass');

// The closure should always return a boolean
$crumb->setCompare(function($cookie, $signature) use ($db) {
    $sth = $db->prepare('select * from hashes where user_id = 1');
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return ($result['hash'] === $signature);
});

echo 'compare result: '.var_export($crumb->compare('testing3'), true);
```

## Split Cookies vs Single Cookies

When the verification is enabled, there are two modes that `Crumb` will use to store the signature hashes use in verification, either using a separate, secondary cookie or appended to the value in the current cookie.

By default it will append the signature to the cookie value itself with a delimiter between the hash and the actual cookie value. This means the cookie value might look something like `1234%7C%7Ca70653caf41f37eccea2fbdcd1746c02109f7a1806ef43cbf653e4698aa8ac98f4f40bee4c9d2c16a5b8be833e6344aa0e0f4bce` (using the double-pipe `||` as the operator). When the `get()` method is called on the `Manager` to get the cookie value, this signature hash is removed from the value and only the actual cookie value is passed back.

The other option uses a second cookie to contain the hash. You can enable this "split cookie" handling by calling the `splitCookies` method on the `Manager` instance:

```php
<?php
$manager = Manager::instance('super-secret');
$manager->splitCookies();
?>
```

This has the benefit of not potentially causing damage to the actual cookie value while allowing the hash enforcement to still work. Be careful, however, as this would effectively double the number of cookies used in your application (and there are browser limits on how many cookies are supported).
