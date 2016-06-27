<?php

namespace MarcW\RssWriter\Extension\Core;

/**
 * Cloud.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class Cloud
{
    private $domain;
    private $port;
    private $path;
    private $registerProcedure;
    private $protocol;

    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setRegisterProcedure($registerProcedure)
    {
        $this->registerProcedure = $registerProcedure;

        return $this;
    }

    public function getRegisterProcedure()
    {
        return $this->registerProcedure;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;

        return $this;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }
}
