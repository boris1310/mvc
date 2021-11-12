<?php

namespace Framework\Core;

class View
{
    public $template_view = 'App/View/Layouts/layout.php';

    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     * @param null $data2
     * @param null $data3
     */

    public function generate($content_view, $template_view, $data = null, $data2 = null, $data3 = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        if (is_array($data2)) {
            extract($data2);
        }

        if (is_array($data3)) {
            extract($data3);
        }

        require_once 'App/View/Layouts/' . $template_view;
    }
}