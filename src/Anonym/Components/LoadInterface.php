<?php

/**
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @copyright AnonymMedya, 2015
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