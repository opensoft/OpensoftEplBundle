OpensoftEplBundle
==================

[![Build Status](https://travis-ci.org/opensoft/OpensoftEplBundle.png?branch=master)](https://travis-ci.org/opensoft/OpensoftEplBundle)

Installation
============

### Add this bundle to your project

**Using the composer**

```php composer.phar require opensoft/opensoft-epl-bundle```

**Using the vendors script**

Add the following lines in your deps file:

    [OpensoftEplBundle]
        git=git://github.com/opensoft/OpensoftEplBundle.git
        target=bundles/Opensoft/EplBundle
    [epl]
        git=http://github.com/opensoft/epl.git

Run the vendors script:

```bash
$ php bin/vendors install
```

**Using Git submodule**

```bash
$ git submodule add git://github.com/opensoft/OpensoftEplBundle.git vendor/bundles/Opensoft/EplBundle
```

### Add the EPL namespace to your autoloader

```php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    'Epl'       => __DIR__.'/../vendor/epl/src',
    'Opensoft'  => __DIR__.'/../vendor/bundles',
    // your other namespaces
));
```

### Add this bundle to your application's kernel

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        // ...
        new Opensoft\EplBundle\OpensoftEplBundle(),
        // ...
    );
}
```


#### Documentation and configuration
It is simple configuration bundle for epl library. Two configuration parameters are available.

```yaml
opensoft_epl:
    composite: Epl\CommandComposite # implements Epl\CommandCompositeInterface
    helper: Epl\CommandHelper       # implements Epl\CommandHelperInterface
```


#### License

See `Resources/meta/LICENSE`.


#### Original Credits

* Petrov Dmitry as main author.
