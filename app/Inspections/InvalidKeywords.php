<?php

namespace App\Inspections;

use Exception;

class InvalidKeywords
{
    /**
     * All registered invalid keywords
     *
     * @var array
     */
    protected $keywords = [
        'yahoo customer support'
    ];

    /**
     * detects invalid keywords
     *
     * @param string $body
     * @return void
     */
    public function detect($body)
    {
        foreach ($this->keywords as $keyword) {
            if (stripos($body, $keyword) !== false) {
                throw new Exception('Your reply contains spam');
            }
        }
    }
}
