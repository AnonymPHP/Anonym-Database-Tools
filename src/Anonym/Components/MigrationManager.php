<?php
    /**
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @copyright AnonymMedya, 2015
     */

    namespace Anonym\Components\Tools;

    use Anonym\Components\Tools\MigrationDatabase\Base;
    use Anonym\Components\Tools\MigrationHelpers\Config;
    use Anonym\Components\Tools\MigrationPatterns\Singleton;
    use Exception;
    use Symfony\Component\Finder\Finder;

    class MigrationManager
    {
        /**
         * @var \PDO|\mysqli
         */
        /**
         * @var Base
         */
        private $base;

        public function createName($name = '')
        {
            return DATABASE . 'Migrations/' . $name . '.php';
        }

        /**
         * Uygulamayı alır ve toplamaya başlar
         */
        public function __construct()
        {
            $this->base = new Base();
            Singleton::make('Anonym\Components\Tools\MigrationDatabase\Tools\Migration\Schema', [$this->base->getConnection()]);
        }

        /**
         * Migration sınıfını yürütür
         * @param null $name
         * @return array
         */
        public function run($name = null)
        {

            if (null !== $name) {
                    $return = [$this->execute($name)];
            } else {

                $list = Finder::create()->files()->name('*.php')->in(DATABASE . 'Migrations/');

                    foreach ($list as $l) {
                        $return[] = $this->execute(first(explode('.', $l->getFilename())));
                    }
            }

            return $return;
        }

        /**
         * @param string $name
         * @throws Exception
         * @return bool
         */
        public function execute($name = '')
        {

            $migration = "Application\Database\Migrations\\$name";
            $migration = new $migration;

            $return = [
                'up' => null,
                'down' => null,
                'name' => $name
            ];

            if ($migration instanceof MigrationInterface) {
                $return['up'] = $migration->up();
                $return['down'] = $migration->down();

                return $return;
            } else {
                throw new Exception('migration sınıfınız MigrationInterface e sahip değil');
            }

        }

    }