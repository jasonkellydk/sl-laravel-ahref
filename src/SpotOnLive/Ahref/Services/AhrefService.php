<?php

namespace SpotOnLive\Ahref\Services;

use SpotOnLive\Ahref\Contracts\Services\AhrefServiceInterface;
use SpotOnLive\Ahref\Options\ApiOptions;

class AhrefService implements AhrefServiceInterface
{
    // The default target for ahref
    const DEFAULT_TARGET = 'domain';

    // The default output format
    const DEFAULT_OUTPUT = 'json';

    /** @var  ApiOptions */
    protected $config;

    /** @var  GuzzleService */
    protected $guzzleService;

    /** @var  string */
    protected $target;

    /** @var  string */
    protected $mode;

    /** @var  int */
    protected $limit;

    /** @var  string */
    protected $orderBy;

    /** @var  string */
    protected $output;

    /**
     * AhrefService constructor.
     * @param array $config
     * @param GuzzleService $guzzleService
     */
    public function __construct(array $config, GuzzleService $guzzleService)
    {
        $this->config = new ApiOptions($config);
        $this->guzzleService = $guzzleService;
        $this->target = self::DEFAULT_TARGET;
        $this->output = self::DEFAULT_OUTPUT;
    }

    public function getDomainRank()
    {
        $params = [
            'from' => 'ahrefs_rank',
            'target' => $this->getTarget(),
            'mode' => $this->getMode(),
            'limit' => $this->getLimit(),
            'output' => $this->getOutput(),
            'order_by' => $this->getOrderBy(),
        ];
        return $this->guzzleService->get('/', $this->config->get('token'), $params);
    }

    public function getDomainRefs()
    {
        $params = [
            'from' => 'refdomains',
            'target' => $this->getTarget(),
            'mode' => $this->getMode(),
            'limit' => $this->getLimit(),
            'output' => $this->getOutput()
        ];
        return $this->guzzleService->get('/', $this->config->get('token'), $params);
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     * @return AhrefService
     */
    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     * @return AhrefService
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     * @return AhrefService
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param mixed $orderBy
     * @return AhrefService
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param mixed $output
     * @return AhrefService
     */
    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }


}
