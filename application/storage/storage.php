<?php

    ob_start();
    include_once 'storages/storage.txt';
    $products = ob_get_contents();
    ob_end_clean();



