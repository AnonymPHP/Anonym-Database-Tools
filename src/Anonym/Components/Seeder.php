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

use Illuminate\Container\Container;

/**
 * Class Seeder
 * @package Anonym\Database\Tools\Backup
 */
class Seeder
{

    /**
     * @var string
     */
    protected $container;

    /**
     *
     * @var string
     */
    protected $namespace = 'App\\Database\\Seeds\\';

    public function __construct(Container $container = null)
    {

    }

    /**
     * @return string
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param string $container
     * @return Seeder
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
        return $this;
    }

}
