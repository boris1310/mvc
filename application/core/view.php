<?php

class View
{
    public $template_view = 'template_view.php';

    function generate($content_view, $template_view, $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        include 'application/views/' . $template_view;
    }
}