<?php

namespace SpotOnLive\Ahref\Options;

use SpotOnLive\Ahref\Contracts\Options\OptionsInterface;

class ApiOptions extends Options implements OptionsInterface
{
    /** @var array */
    protected $defaults = [
        'api_url' => 'https://apiv2.ahrefs.com',
        'guzzle_timeout' => 60,
    ];
}
