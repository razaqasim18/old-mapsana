
<?php

if (!function_exists('getCurrentPrefix')) {
    function getCurrentPrefix()
    {
        $action = app('request')->route()->getAction();
        $prefix = $action['prefix'];
        return $prefix;
    }
}
?>
