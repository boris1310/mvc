<?php

namespace Framework\Core;

class View
{
    public $template_view = 'App/View/Layouts/layout.php';

    public function generate($content_view, $template_view, $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        require_once 'App/View/Layouts/' . $template_view;
    }
}