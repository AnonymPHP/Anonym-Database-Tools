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


    public function __construct($pattern = '',array $values = []){

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
