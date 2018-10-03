<?php

namespace App\Inspections;

class Spam
{
    /**
     * All registered inspections
     *
     * @var array
     */
    protected $inspections = [
        InvalidKeywords::class
    ];

    /**
     * detects spam
     *
     * @param string $body
     * @return void
     */
    public function detect($body)
    {
        foreach ($this->inspections as $inspection) {
            app($inspection)->detect($body);
        }

        return false;
    }
}
