<?php

if(function_exists("automatic_code")) {
    function automatic_code(): string
    {
        return \Illuminate\Support\Str::random(10);
    }
}
