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

/**
 * Class TableStore
 * @package Anonym\Database\Tools\Backup
 */
class TableStore
{

    /**
     * the repository for patterns
     *
     * @var array
     */
    private $pattern;

    /**
     * an array for pattern values
     *
     * @var array
     */
    private $values;

    /**
     * create a new instance and register patterns
     *
     * @param string $pattern
     * @param array $values
     */
    public function __construct($pattern = '',array $values = []){
        $this->pattern = $pattern;
        $this->values = $values;
    }

    /**
     * @return array
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param array $pattern
     * @return TableStore
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }


    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param array $values
     * @return TableStore
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }

}
