<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 08.08.2015
 * Time: 15:52
 */

namespace Anonym\Database\Tools;

/**
 * Interface BackupInterface
 * @package Anonym\Database\Tools\Backup
 */
interface BackupInterface
{

    /**
     * Verileri yedekler
     *
     * @param string $tables
     * @param string $name
     * @param $src
     * @return mixed
     */
    public function backup($tables = '*', $name = '', $src = BACKUP);
}
