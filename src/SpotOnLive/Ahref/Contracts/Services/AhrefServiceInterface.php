<?php

namespace SpotOnLive\Ahref\Contracts\Services;

interface AhrefServiceInterface
{
    /**
     * Set the target
     * @var string
     */
    public function setTarget();

    /**
     * Set the mode
     * "domain"|"exact"|"subdomains"|"prefix"
     * @var string
     */
    public function setMode();

    /**
     * @return $mode
     */
    public function getMode();

    /**
     * Set the limit of returned rows
     * @var int
     */
    public function setLimit();

    /**
     * @return $limit
     */
    public function getLimit();

    /**
     * Set the order by
     * @var string
     */
    public function setOrderBy();

    /**
     * @return $orderBy
     */
    public function getOrderBy();

    /**
     * Set the output format
     * "json"|"xml"
     * @var string
     */
    public function setOutput();

    /**
     * @return $output
     */
    public function getOutput();

    /**  */
    public function getDomainRank();

    /**  */
    public function getDomainRefs();
}
