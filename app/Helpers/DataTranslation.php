<?php

function translate_englishBoolean($value)
{
    if (! $value) {
        return null;
    }

    $value = strtolower(trim($value));

    return $value == 'yes' ? true : false;
}

function isTaskWorkflow()
{
    return request()->query('task') ?? false;
}
