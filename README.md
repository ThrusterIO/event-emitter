# EventEmitter Component

[![Latest Version](https://img.shields.io/github/release/ThrusterIO/event-emitter.svg?style=flat-square)]
(https://github.com/ThrusterIO/event-emitter/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)]
(LICENSE)
[![Build Status](https://img.shields.io/travis/ThrusterIO/event-emitter.svg?style=flat-square)]
(https://travis-ci.org/ThrusterIO/event-emitter)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/ThrusterIO/event-emitter.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/event-emitter)
[![Quality Score](https://img.shields.io/scrutinizer/g/ThrusterIO/event-emitter.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/event-emitter)
[![Total Downloads](https://img.shields.io/packagist/dt/thruster/event-emitter.svg?style=flat-square)]
(https://packagist.org/packages/thruster/event-emitter)

[![Email](https://img.shields.io/badge/email-team@thruster.io-blue.svg?style=flat-square)]
(mailto:team@thruster.io)

The Thruster EventEmitter Component.


## Install

Via Composer

``` bash
$ composer require thruster/event-emitter
```


## Usage

### Creating an Emitter

```php
$emitter = new EventEmitter();
```

### Adding Listeners

```php
$emitter->on('foo.bar', function (Foo $bar) {
    // ... Something happend
});
```

### Emitting Events

```php
$emitter->emit('foo.bar', [$fooBar]);
```

### Using Advance Event Emitter

 ```php
$emitter = new AdvanceEventEmitter();

$emitter->on('foo.bar', function (EventInterface $event) {
   // ... Do something good

   $event->stopPropagation(); // you can stop further execution
});

$emitter->on('foo.bar', function (EventInterface $event) {
   // ... Never gets called
});

$emitter->emit('foo.bar', new Event($fooBar));
```

## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## License

Please see [License File](LICENSE) for more information.
