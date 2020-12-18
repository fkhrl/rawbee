<?php 

if (! function_exists('formatDate')) {
    function formatDate($date = '', $format = 'M/d/Y'){
        if($date == '' || $date == null)
            return;

        return date($format,strtotime($date));
    }
}

if (! function_exists('formatDateTime')) {
    function formatDateTime($date = '', $format = 'm/d/Y H:i:s'){
        if($date == '' || $date == null)
            return;

        return date($format,strtotime($date));
    }
}

if (! function_exists('db_esc_like_raw')) {
    /**
     * @param string $str
     * @return string
     */
    function db_esc_like_raw($str)
    {
        $ret = str_replace([ '%', '_' ], [ '\%', '\_' ], $str);
        return $ret;
    }
}

set_time_limit(300);