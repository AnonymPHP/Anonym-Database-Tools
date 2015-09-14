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
     * create a new instance
     *
     * @param Container|null $container
     */
    public function __construct(Container $container = null)
    {
        $this->setContainer($container);
    }

    public function resolve($abstact)
    {
        if (isset($this->container)) {
            $instance = $this->container->make($abstact);
        } else {
            $instance = new $abstact;
        }

        if (isset($this->command)) {
            $instance->setCommand($this->command);
        }
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
