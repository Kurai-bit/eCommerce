<?php

namespace App\Core;

class Request
{
    protected $parameters;
    protected $headers;
    protected $files;
    protected $serverParams;

    public function __construct()
    {
        $this->determineHeaders();
        $this->determineParameters();
        $this->determineFiles();
        $this->setServerParameters();
    }

    protected function determineParameters()
    {
        if (isset($this->headers['CONTENT_TYPE']) && strpos($this->headers['CONTENT_TYPE'], 'application/json') !== false) {
            $this->parameters = json_decode(file_get_contents('php://input'), true);
        } else {
            $this->parameters = ($_SERVER['REQUEST_METHOD'] === 'GET') ? $_GET : $_POST;
        }
    }

    protected function setServerParameters()
    {
        $this->serverParams = $_SERVER;
    }

    public function needsJson()
    {
        if (isset($this->headers['X-REQUESTED-WITH']) && $this->headers['X-REQUESTED-WITH'] === 'XMLHttpRequest') {
            return true;
        }

        if (isset($this->headers['ACCEPT']) && strpos($this->headers['ACCEPT'], 'json') !== false) {
            return true;
        }

        return false;
    }

    protected function determineHeaders()
    {
        $headers = [];
        $contentHeaders = ['CONTENT_LENGTH' => true, 'CONTENT_TYPE' => true];
        foreach ($_SERVER as $key => $value) {
            // headers that are prefixed with HTTP_
            if (0 === strpos($key, 'HTTP_')) {
                $headers[substr($key, 5)] = $value;
            }
            elseif (isset($contentHeaders[$key])) {
                $headers[$key] = $value;
            }
        }

        $this->headers = $headers;
    }

    protected function determineFiles()
    {
        $this->files = $_FILES;
    }

    public function get($name)
    {
        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        }

        return null;
    }

    public function header($name)
    {
        if (isset($this->headers[$name])) {
            return $this->headers[$name];
        }

        return null;
    }

    public function file($name)
    {
        if (isset($this->files[$name])) {
            return $this->files[$name];
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param mixed $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $files
     */
    public function setFiles($files)
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getServerParams()
    {
        return $this->serverParams;
    }

    /**
     * @param mixed $serverParams
     */
    public function setServerParams($serverParams)
    {
        $this->serverParams = $serverParams;
    }
}
