<?php

function pageIsActive($route)
{
    $page = url()->current();
    if ($route == $page) {
        return 'class="mm-active"';
    }
}

function getPageUrl()
{
    return request()->segment(2);
}
