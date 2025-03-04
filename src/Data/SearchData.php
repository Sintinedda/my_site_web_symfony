<?php

namespace App\Data;

use App\Entity\Classe;
use App\Entity\SpellSchool;

class SearchData
{

    /**
     * @var Classe[]
     */
    public $classes = [];

    /**
     * @var SpellSchool[]
     */
    public $schools = [];

    /**
     * @var Source[]
     */
    public $sources = [];

    /**
     * @var integer
     */
    public $min;

    /**
     * @var integer
     */
    public $max;
    
}