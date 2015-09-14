<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Anonym\Components\Tools;

/**
 * Class Chield
 * @package Anonym\Components\Tools
 */
class Chield implements TableInterface
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
     * the instance of table
     *
     * @var Table
     */
    private $app;

    /**
     * @param Table $table
     * @param string $pattern
     * @param array $values
     */
    public function __construct(Table $table, $pattern, array $values = [])
    {
        $this->app = $table;
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

    /**
     * @param string $name
     * @param array $method
     * @return mixed
     */
    public function __call($name, $method){
        return call_user_func_array([$this->app, $name], $method);
    }
}
