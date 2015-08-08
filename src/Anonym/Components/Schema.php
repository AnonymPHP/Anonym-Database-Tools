<?php
/**
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @copyright AnonymMedya, 2015
 */

namespace Anonym\Components\Tools;

use Exception;

/**
 * Class Schema
 * @package Anonym\Components\Tools
 */
class Schema
{

    /**
     * Bağlantı sağlayıcısını tutar
     *
     * @var \PDO|\mysqli|null
     */
    private static $connection;

    /**
     * Tablo yöneticisini tutar
     *
     * @var Table
     */
    private $table;


    /**
     * Sınıfı başlatır
     *
     */
    public function __construct()
    {
        $this->table = new Table();

    }

    /**
     * Tablo oluşturur ve işler
     * @param string $tableName
     * @param callable $callback
     * @return bool|\mysqli_result|\PDOStatement
     * @throws Exception
     */
    public function create($tableName = '', callable $callback)
    {
        $table = $this->table;
        $table->create($tableName);

        // çağrı yapılıyor
        $response = $callback($table);

        if ($response instanceof TableInterface) {
            $string = $response->fetch();
            return static::getConnection()->query($string);

        } else {
            throw new Exception('%s %s den dönen veri bir TableInterface değil', __CLASS__, __FUNCTION__);
        }
    }

    /**
     * $tableName'e girilen tabloyu siler
     *
     * @param string $tableName
     * @return bool|\mysqli_result|\PDOStatement
     */
    public function drop($tableName = '')
    {
        $query = $this->table->drop($tableName);
        return $this->connection->query($query);

    }

    /**
     * @return Table
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param Table $table
     * @return Schema
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    /**
     * Bağlantı verisini döndürür
     *
     * @return \mysqli|null|\PDO
     */
    public static function getConnection()
    {
        return self::$connection;
    }

    /**
     * @param \mysqli|null|\PDO $connection
     */
    public static function setConnection($connection)
    {
        self::$connection = $connection;
    }



}