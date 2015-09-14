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
class Table
{

    /**
     * Eşleştirilecek yapıları tutar
     *
     * @var array
     */
    private $patterns = [
        'create' => 'CREATE TABLE IF NOT EXISTS `%s`(',
        'auto_increment' => '`%s` INT(%d) UNSIGNED AUTO_INCREMENT PRIMARY KEY,',
        'int' => '`%s` INT(%d),',
        'varchar' => '`%s` VARCHAR(%d) CHARACTER SET %s ,',
        'timestamp' => '`%s` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,',
        'date' => '`%s` DATE,',
        'year' => '`%s` YEAR,',
        'time' => '`%s` TIME,',
        'datetime' => '`%s` DATETIME,',
        'text' => '`%s` TEXT CHARACTER SET %s,',
        'end' => ') DEFAULT CHARSET=%s;',
        'drop' => 'DROP TABLE `%s`;'
    ];

    /**
     * Karekter setini tutar
     *
     * @var string
     */
    private $charset = 'utf8';


    /**
     * add a text string to value
     *
     * @param string $name
     * @return Chield
     */
    public function text($name)
    {
        return $this->addCommand('varchar', $this->madeArray($name));
    }

    /**
     * add a new varchar command
     *
     * @param string $name
     * @param int $limit
     * @return Chield
     */
    public function varchar($name, $limit = 255){
        return $this->addCommand('varchar', $this->madeArray($name, $limit));
    }


    /**
     * add a new date command
     *
     * @param  string $name
     * @return Chield
     */
    public function date($name){
        return $this->addCommand('date', $this->madeArray($name));
    }

    /**
     * get all args
     *
     * @param mixed $param
     * @return array
     */
    private function madeArray($param){
        return func_num_args() === 1 ? [$param] : func_get_args();
    }

    /**
     * build blueprint command
     *
     * @param string $type
     * @param array $variables
     * @return Chield
     */
    private function addCommand($type, $variables){
        return Blueprint::command(new Chield($this, $this->patterns[$type], $variables) );
    }

    /*
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
    */
}
