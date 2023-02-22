<?php

namespace App\Core;

class ExceptionHandler
{
    public function handle($e)
    {
        $this->report($e);
        $this->render($e);
    }

    protected function report($e)
    {
        //TODO - log this exception
        echo "reporting the exception\n";
    }

    protected function render($e)
    {
        //TODO - return a custom blade for errors
        echo "rendering the exception\n";
    }
}
