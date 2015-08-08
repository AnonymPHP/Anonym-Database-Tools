<?php
/**
 *  Bu S�n�f AnonymFramework'de Veritaban�' n� yedeklemede kullan�l�r.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
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
