<?php

if (!function_exists('logp'))
{
    function logp($msg, $char = '*')
    {
        $msg = logGetValue($msg);
        $repeat = str_repeat($char, 50);
        \Illuminate\Support\Facades\Log::info("\n" . $repeat . "\n" . $msg . "\n" . $repeat);
    }
}

if (!function_exists('logGetValue'))
{

    function logGetValue($x)
    {

        if ($x instanceof \Illuminate\Database\Eloquent\Model) {
            return print_r($x->toArray(), true);
        }
        return is_array($x) || is_object($x) ? print_r($x, true) : $x;

    }

}
