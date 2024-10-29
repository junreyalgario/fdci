<?php

namespace Fdci\Core;

class Request
{
    private $get;
    private $post;
    private $put;

    public function __construct()
    {
        $this->get = $this->sanitizeInput($_GET);
        $this->post = $this->sanitizeInput($_POST);
        $this->put = [];
        parse_str(file_get_contents("php://input"), $this->put);
        $this->put = $this->sanitizeInput($this->put);
    }

    private function sanitizeInput($data)
    {
        // Sanitize array
        if (is_array($data)) {
            return array_map([$this, 'sanitizeInput'], $data);
        }

        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    private function validateData($value, $validation = null)
    {
        if ($validation && is_callable($validation)) {
            return $validation($value);
        }

        return true;
    }

    public function get($key, $default = null, $validation = null)
    {
        if (isset($this->get[$key])) {
            $value = $this->get[$key];

            if ($this->validateData($validation, $value)) {
                return $value;
            }
        }

        return $default;
    }

    public function post($key, $default = null, $validation = null)
    {
        if (isset($this->post[$key])) {
            $value = $this->post[$key];

            if ($this->validateData($validation, $value)) {
                return $value;
            }
        }

        return $default;
    }

    public function put($key, $default = null, $validation = null)
    {
        if (isset($this->put[$key])) {
            $value = $this->put[$key];

            if ($this->validateData($validation, $value)) {
                return $value;
            }

        }

        return $default;
    }
}
