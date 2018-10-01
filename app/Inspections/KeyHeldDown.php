<?php

namespace App\Inspections;

use Exception;

class KeyHeldDown
{
    /**
     * detects key held down
     *
     * @param string $body
     * @return void
     */
    public function detect($body)
    {
        if (preg_match('/(.)\\1{4,}/', $body)) {
            throw new Exception('Your reply contains spam');
        }
    }
}
