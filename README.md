# php-utils
Disclaimer: This is so early in development it doesn't even have any useful stuff yet. Please come back later.


    # ────────────────────────────────────────────────────────── #
    #                                                            #
    #    $$\   $$\ $$$$$$$$\ $$$$$$\ $$\       $$$$$$\           #
    #    $$ |  $$ |\__$$  __|\_$$  _|$$ |     $$  __$$\          #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     $$ /  \__|         #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     \$$$$$$\           #
    #    $$ |  $$ |   $$ |     $$ |  $$ |      \____$$\          #
    #    $$ |  $$ |   $$ |     $$ |  $$ |     $$\   $$ |         #
    #    \$$$$$$  |   $$ |   $$$$$$\ $$$$$$$$\\$$$$$$  |         #
    #     \______/    \__|   \______|\________|\______/          #
    #                                                            #
    # ────────────────────────────────────────────────────────── #
    # ----[    General but useful PHP utilities. ]-------------  #
    # ----[    Made with ❤️ by darknetzz         ]-------------  #
    # ----[    https://github.com/Darknetzz/     ]-------------  #
    # ────────────────────────────────────────────────────────── #

This library includes a bunch of useful tools for PHP. I wrote this because I kept re-inventing the wheel every time I started a new PHP project.
There are other more complete alternatives out there (like Laravel), this was just made for fun and to learn.

# Get started
Simply open your PHP project and clone this repo.
```
git clone git@github.com:Darknetzz/php-utils.git
```

Then include the `_All.php` if you want to be able to use anything from this library on demand.
```php
include_once("php-utils/_All.php");

# Then you can instantiate any of the classes and start using them.
$crypto = new Crypto;
$hashedPassword = $crypto->hash("MyPassword123");
```

# Modules
Here is a list of all the modules (classes) and their methods.

* [API](Docs/API.md)
* [Auth](Docs/Auth.md)
* [Calendar](Docs/Calendar.md)
* [Crypto](Docs/Crypto.md)
* [Debugger](Docs/Debugger.md)
* [Files](Docs/Files.md)
* [Funcs](Docs/Funcs.md)
* [Images](Docs/Images.md)
* [Navigation](Docs/Navigation.md)
* [Network](Docs/Network.md)
* [Random](Docs/Random.md)
* [Resources](Docs/Resources.md)
* [Session](Docs/Session.md)
* [SQL](Docs/SQL.md)
* [Strings](Docs/Strings.md)
* [Times](Docs/Times.md)
* [Vars](Docs/Vars.md)
