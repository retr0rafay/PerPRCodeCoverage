csrf
====

CSRF Token Generation &amp; Validation

This library generates randomized CSRF validation tokens allowing various sources for the randomized base data. Curently it supports:

- OpenSSL
- /dev/urandom

It generates the random data (a nonce) and uses the secret provided along with the nonce to create a HMAC hash and base64 encode the result. The `verify` method does the reverse, ensuring that the HMAC signature matches the string provided.

### Usage:

This is an example usage of the token generation with the default SHA256 hashing and OpenSSL generator (randomization):

```php
<?php

require_once 'vendor/autoload.php';

use \SalesforceEng\CSRF\Manager as Manager;

$secret = 'Sup3rs3kr3tV4lu3G0e5H4re!%$#@*^@';
$csrf = new Manager($secret);

$token = $csrf->generate();

echo 'token: '.$token."\n";

if ($csrf->verify($token) === true) {
    echo "verified!\n";
}
?>
```

#### Using secondary cookie validation

The "double submit" method of CSRF protection includes the use of a cookie set to the same value as the hash returned from the `generate` method. The library will automatically handle this for you if you enable it, removing the need for you to set the cookie manually. To use the feature, enable it with the second optional parameter on the constructor:

```php
<?php
$csrf = new Manager($secret, true);
?>
```

By default it's disabled. When enabled, the library will automatically check for a cookie with a certain name and verify not only that the hash matches the one provided as a parameter to the `verify` call but that the HMAC is also valid.

#### "Strength" Levels

There are also different "levels" of strength you can use that make use of different hash/key length combinations. You can set this with the optional `level` parameter on the constructor:

```php
<?php
// It defaults to LEVEL_REGULAR using SHA256 with a 32 byte key length
$csrf = new Manager($secret, false, Manager::LEVEL_REGULAR);

// Or use LEVEL_LONG to move to SHA512 with a 64 byte key length
$csrf = new Manager($secret, false, Manager::LEVEL_LONG);
?>
```

You can also use a different generator through additional options on the creation of the object:

```php
<?php

require_once 'vendor/autoload.php';

use \SalesforceEng\CSRF\Manager as Manager;

$secret = 'Sup3rs3kr3tV4lu3G0e5H4re!%$#@*^@';
$csrf = new Manager(
    $secret,
    false,
    Manager::LEVEL_REGULAR,
    Manager::GENERATOR_URANDOM
);

?>
```

The other generator available is `Manager::GENERATOR_OPENSSL`.

