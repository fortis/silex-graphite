# Silex 2 Hosted Graphite Service Provider

## Installation

```bash
  composer require fortis/silex-graphite
```

## Usage
### Register

```php
  $app->register(new GraphiteServiceProvider(), [
    'graphite.options' => [
      'apiKey' => 'fcd8e41a-808e-449d-bfa0-5537a4ce168e7',
      'host'      => 'udp://8a1ga0ff.carbon.hostedgraphite.com',
      'port'      => 2003,
      'prefix' => 'some.metric.namespace'
    ]
  ]);
```

## License

MIT License
