<?php
/**
 *  Bu Sınıf AnonymFramework'de Veritabanı' nı yedeklemede kullanılır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 */

namespace Anonym\Components\Tools;

/**
 * Class Table
 * @package Anonym\Components\Tools
 */
class Table implements TableInterface
{

    /**
     * Eşleştirilecek yapıları tutar
     *
     * @var array
     */
    private $patterns = [
        'create' => 'CREATE TABLE IF NOT EXISTS `%s`(',
        'auto_increment' => '`%s` INT(%d) UNSIGNED AUTO_INCREMENT PRIMARY KEY,',
        'int' => '`%s` INT(%d) %s NULL,',
        'varchar' => '`%s` VARCHAR(%d) CHARACTER SET %s %s,',
        'timestamp' => '`%s` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,',
        'date' => '`%s` DATE %s,',
        'year' => '`%s` YEAR %s,',
        'time' => '`%s` TIME %s,',
        'datetime' => '`%s` DATETIME %s,',
        'text' => '`%s` TEXT CHARACTER SET %s %s,',
        'end' => ') DEFAULT CHARSET=%s;',
        'drop' => 'DROP TABLE `%s`;'
    ];

    private $null = 'NOT NULL';
    private $selected = [
        'patterns' => [],
        'values' => []
    ];

    /**
     * @var string
     */
    private $create;
    /**
     * Karekter setini tutar
     *
     * @var string
     */
    private $charset = 'utf8';

    /**
     * Karekter setini ayarlar
     * @param string $charset
     * @return $this
     */
    public function charset($charset = 'utf-8')
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @param string $tableName
     * @return $this
     */
    public function create($tableName = '')
    {
        $this->create = $tableName;
        return $this;
    }


    /**
     * @return string
     */
    private function uniqid()
    {
        return uniqid(rand(1,100));
    }
    /**
     * timestamp değeri ekler
     * @param string $tableName
     * @return $this
     */
    public function timestamp($tableName = '')
    {
        $uniqid = $this->uniqid();

        $this->selected['patterns'][$uniqid] = 'timestamp';
        $this->selected['values']['timestamp'][$uniqid] = [$tableName, $this->null];
        return $this;
    }

    /**
     * date değeri ekler
     * @param string $tableName
     * @return $this
     */
    public function date($tableName = '')
    {
        $uniqid = $this->uniqid();

        $this->selected['patterns'][$uniqid] = 'date';
        $this->selected['values']['date'][$uniqid] = [$tableName, $this->null];
        return $this;
    }

    /**
     * içeriği oluşturur ve döndürür
     * @param string $tableName
     * @return string
     */
    public function drop($tableName = '')
    {
        return sprintf($this->patterns['drop'], $tableName);
    }

    /**
     * time değeri ekler
     * @param string $tableName
     * @return $this
     */
    public function time($tableName = '')
    {
        $uniqid = $this->uniqid();
        $this->selected['patterns'][$uniqid] = 'time';
        $this->selected['values']['time'][$uniqid] = [$tableName, $this->null];
        return $this;
    }

    /**
     * datetime değeri ekler
     * @param string $tableName
     * @return $this
     */
    public function datetime($tableName = '')
    {
        $uniqid= $this->uniqid();
        $this->selected['patterns'][$uniqid] = 'datetime';
        $this->selected['values']['datetime'][$uniqid] = [$tableName, $this->null];
        return $this;
    }


    /**
     * text değeri ekler
     * @param string $tableName
     * @return $this
     */
    public function text($tableName = '')
    {
        $uniqid = $this->uniqid();
        $this->selected['patterns'][$uniqid] = 'text';
        $this->selected['values']['text'][$uniqid] = [$tableName, $this->charset, $this->null];
        return $this;
    }

    /**
     * Sonlandırır
     */
    public function end()
    {
        $this->selected['patterns'][] = 'end';
        $this->selected['values']['end'] = [];
        return $this;
    }

    /**
     * Yapıya primary key ekler
     * @param string $id
     * @return $this
     */
    public function primary($id = 'id')
    {
        $uniqid = $this->uniqid();
        $this->selected['patterns'][$uniqid] = 'auto_increment';
        $this->selected['values']['auto_increment'][$uniqid] = [$id];
        return $this;
    }

    /**
     * İnt değeri ekler
     * @param string $table
     * @param int $limit
     * @return $this
     */

    public function int($table = '', $limit = 255)
    {
        $uniqid = $this->uniqid();
        $this->selected['patterns'][$uniqid] = 'int';
        $this->selected['values']['int'][$uniqid] = [$table, $limit, $this->null];
        return $this;
    }

    /**
     * Varchar değeri ekler
     * @param string $table
     * @param int $limit
     * @return $this
     */
    public function varchar($table = '', $limit = 255)
    {
        $uniqid = $this->uniqid();

        $this->selected['patterns'][$uniqid] = 'varchar';
        $this->selected['values']['varchar'][$uniqid] = [$table, $limit, $this->charset, $this->null];
        return $this;
    }

    /**
     * Sınıfta kullanılacak değerlerin null olarak kullanılıp kullanılamyacağını ayarlar
     * @param string $null
     * @return $this
     */
    public function null($null = 'NOT NULL')
    {
        $this->null = $null;
        return $this;
    }


    /**
     * @return mixed
     */
    public function fetch()
    {
        $string = isset($this->create) ? sprintf($this->patterns['create'], $this->create): '';
        $selected = $this->selected;
        $patterns = $this->patterns;

        foreach($selected['patterns'] as $uniqid => $type){

            $pattern = $this->patterns[$type];
            $selectedType = $selected['values'][$type];
            $selectedData = $selectedType[$uniqid];

            $selectedDataWithPattern = array_merge((array)$pattern, $selectedData);
            $string .= call_user_func_array('sprintf', $selectedDataWithPattern);

        }

        $string = rtrim($string, ',');
        $string .= sprintf($patterns['end'], $this->charset);

        return $string;
    }
}
