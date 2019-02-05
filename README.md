# theStormwinter\ErrorHandler

This handler creates an \***Exception** instead od **E_**\*


### Requirements



```
PHP 7.1+
```

### Installing

Add to your `composer.json` file:

```
{
    "require": {
        "thestormwinter/errorhandler": "*"
    }
}
```

Or you can execute with composer:

```
composer require thestormwinter/errorhandler
```

## Usage

Usage is really easy:

```

$this->handler = new \theStormwinter\ErrorHandler\ErrorHandler;

try{
...
ask for undefined variable
...
}catch(\theStormwinter\ErrorHandler\Exceptions\NoticeException $e){

echo $e->getMessage();
}
```
If you want to disable this handler and use default:
```
$this->handler->disable();
```
## Changelog

**1.1.0**
 - Changed Exceptions namespaces
 - Method enable() is now public and deleted constructor
 


## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to
 us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Jiří Zima** - [theStormwinter](https://github.com/thestormwinter)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


