<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 08.08.2015
 * Time: 15:55
 */

namespace Anonym\Database\Tools\Backup;

/**
 * Interface LoadInterface
 * @package Anonym\Database\Tools\Backup
 */
interface  LoadInterface
{


    /**
     * Yedeklenmiş verileri geri yükler
     *
     * @param string $name geri yüklenecek dosya ismidir, eğer girilmesze hepsi yüklenir
     * @return mixed
     */
    public function execute($name = '');
}