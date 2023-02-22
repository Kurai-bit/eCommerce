<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class BaseController
{
    protected $request;
    protected $bladeRenderer;

    public function __construct()
    {
        $this->bladeRenderer = new Blade(basePath().'/views', appPath().'/cache');

    }

    public function response($data, $viewPath = null)
    {
        $headers = $this->request->getHeaders();

        if (isset($headers['Content-Type']) && $headers['Content-Type'] === 'application/json') {
            return $this->jsonResponse($data);
        }

        return $this->bladeResponse($data, $viewPath);
    }

    public function jsonResponse($data, $code = 200)
    {
        http_response_code($code);
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    public function bladeResponse($data, $viewPath)
    {
        echo $this->bladeRenderer->render($viewPath, $data);
        exit;
    }

    public function setRequest($request)
    {
        $this->request = $request;
    }
}
