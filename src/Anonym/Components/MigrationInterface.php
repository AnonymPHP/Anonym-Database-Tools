<?php
/**
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @copyright AnonymMedya, 2015
 */

namespace Anonym\Components\Tools;

/**
 * Interface MigrationInterface
 * @package Anonym\Components\Tools\MigrationDatabase\Tools\Migration
 */
interface MigrationInterface
{

    /**
     * Eklenecek verileri bu fonksiyon içinde ayarlarız
     *
     * @return mixed
     */
    public function up();

    /**
     * Silinecek verileri bu fonksiyon içinde ayarlarız
     *
     * @return mixed
     */
    public function down();
}