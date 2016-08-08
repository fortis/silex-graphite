<?php

namespace Graphite\Silex\Client;

class Client
{
    private $config = null;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Data to send to Graphite host
     *
     * @param string $data
     *
     * @return bool
     */
    public function send($data)
    {
        $data = $this->config['prefix'].".$data ".time().PHP_EOL;

        return $this->sendData($this->config['host'], $this->config['port'], $data);
    }

    /**
     * @param string $endpoint
     * @param string $data
     *
     * @return bool
     */
    protected function sendData($endpoint, $port, $data)
    {
        $connection = fsockopen($endpoint, $port);
        fwrite($connection, $data);

        return fclose($connection);
    }
}