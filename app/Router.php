<?php

namespace App;

class Router
{
    public function load(array $request)
    {
        $key = '\App\Controller\\';
        array_map(function($item) use(&$key) {
            if (!empty($item)) {
                $key .= ucfirst($item);
            }
        }, explode('/', $request['REQUEST_URI']));
        
        if (! class_exists($key)) {
            throw new \RuntimeException("Class $key not found");
        }

        return (new $key)->run();
    }
}