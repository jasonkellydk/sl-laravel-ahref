<?php

namespace SpotOnLive\Ahref\Services;

use GuzzleHttp\Client;
use SpotOnLive\Ahref\Options\ApiOptions;

class GuzzleService
{
    /** @var ApiOptions */
    protected $config;

    /** @var  Client */
    protected $client;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new ApiOptions($config);
        $this->client = new Client([
            'base_uri' => $this->config->get('api_url'),
            'timeout' => $this->config->get('guzzle_timeout'),
        ]);
    }

    /**
     * @param $url
     * @param $token
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($url, $token, $params = [])
    {
        return $this->client->request('GET', $url . '?token=' . $token . '&' . http_build_query($params));
    }

    /**
     * @param $url
     * @param $token
     * @param array $params
     * @param array $body
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($url, $token, $params = [], $body = [])
    {
        return $this->client->request('POST', $url . '?token=' . $token . '&' . http_build_query($params), $body);
    }

    /**
     * @param $url
     * @param $token
     * @param array $params
     * @param array $body
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function put($url, $token, $params = [], $body = [])
    {
        return $this->client->request('PUT', $url . '?token=' . $token . '&' . http_build_query($params), $body);
    }

    /**
     * @param $url
     * @param $token
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function delete($url, $token, $params = [])
    {
        return $this->client->request('DELETE', $url . '?token=' . $token . '&' . http_build_query($params));
    }
}
