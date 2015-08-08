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
        public function up();

        public function down();
    }