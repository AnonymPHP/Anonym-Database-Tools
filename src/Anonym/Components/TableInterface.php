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
 * Interface TableInterface
 * @package Anonym\Database\Tools\Backup
 */
interface  TableInterface
{

    /**
     * add a text string to value
     *
     * @param string $name
     * @return Chield
     */
    public function text($name);

    /**
     * add a new varchar command
     *
     * @param string $name
     * @param int $limit
     * @return Chield
     */
    public function varchar($name, $limit = 255);


    /**
     * add a new date command
     *
     * @param  string $name
     * @return Chield
     */
    public function date($name);


    /**
     * add a new integer command
     *
     * @param string $name
     * @param int $limit
     * @return Chield
     */
    public function int($name, $limit = 255);

    /**
     * add a new time string
     *
     * @param string $name
     * @return Chield
     */
    public function time($name);


    /**
     * add a new timestamp column to mysql
     *
     * @param string $name
     * @return Chield
     */
    public function timestamp($name);

    /**
     * add a new year timestamp column to mysql
     *
     * @param string $name
     * @return Chield
     */
    public function year($name);
}
