<?php

namespace Graphite\Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Graphite\Silex\Client\GraphiteClient;

class GraphiteServiceProvider implements ServiceProviderInterface
{
    /**
     * The package version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * {@inheritdoc}
     */
    public function register(Container $app)
    {
        $app['graphite'] = function (Application $app) {
            $client = new GraphiteClient($app['graphite.options']);

            return $client;
        };
    }

    /**
     * {@inheritdoc}
     * @codeCoverageIgnore
     */
    public function boot(Application $app)
    {
        //
    }
}
