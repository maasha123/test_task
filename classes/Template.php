<?php

class Template
{
    public static function render($template, $data = [])
    {
        $templatePath = 'templates/' . $template . '.php';
        if (!file_exists($templatePath)) {
            throw new Exception("Template not found: " . $templatePath);
        }
        ob_start();
        extract($data);
        require($templatePath);
        return ob_get_clean();
    }
}

