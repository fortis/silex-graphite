<?php

namespace Graphite\Silex\Client;

class GraphiteClient
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
        $message = $this->config['prefix'].".$data ".time().PHP_EOL;
        return $this->sendData($this->config['host'], $this->config['port'], $message);
    }

    /**
     * @param string $host
     * @param int    $port
     * @param string $message
     *
     * @return int
     */
    protected function sendData($host, $port, $message)
    {
        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        return socket_sendto($socket, $message, strlen($message), 0, $host, $port);
    }
}
