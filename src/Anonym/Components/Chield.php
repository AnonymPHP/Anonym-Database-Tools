<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Anonym\Database\Tools\Backup;


class Chield
{

    /**
     * the pattern of command
     *
     * @var string
     */
    private $pattern;

    /**
     * determine if it is null
     *
     * @var bool
     */
    private $null = false;

    /**
     *
     *
     * @var string
     */
    private $default;


    /**
     * the datas of pattern
     *
     * @var array
     */
    private $values;

    /**
     * @param string $pattern
     * @param array $values
     */
    public function __construct($pattern, array $values = [])
    {
        $this->pattern = $pattern;
        $this->values = $values;
    }


    /**
     * register null variable
     *
     * @param bool|true $null
     * @return $this
     */
    public function null($null = true)
    {
        $this->null = $null;
        return $this;
    }

    /**
     * register default variable
     *
     * @param mixed $defualt
     * @return $this
     */
    public function defualt($defualt){
        $this->default = $defualt;

        return $this;
    }


    /**
     * rende parameters
     *
     *
     * @return string
     */
    public function rende(){

    }
}
