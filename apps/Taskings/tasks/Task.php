<?php

namespace apps\Taskings\tasks;

/**
 * Description of Task
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 3, 2016
 */
class Task {

    /**
     * @var array
     */
    private static $options = [];

    /**
     * @var
     */
    private static $fp;

    /**
     * @param $options
     * @param $fp
     */
    public static function execute($options, $fp) {
        self::$options = $options;
        self::$fp = $fp;
        if (isset(self::$options['t'])) {
            $task = self::$options['t'];

            if ($task == 'model') {
                //initiate pdo
                $exec = new \lib\crud\Generate();
                # php task.php -t model
                $exec->buildModel();
            } elseif ($task == 'create') {
                $exec = new \lib\crud\Generate();
                $exec->buildDataBase();
            } elseif ($task == 'admin' || $task == 'app' || $task == 'cms') {
                self::doGenerate();
            }
        } else {
            self::manual();
        }
    }

    /**
     *
     */
    private static function manual() {
        echo "-t [model, admin, app, cms] \n";
        echo "-t model \n";
        echo "-t admin | cms -a (app_name) -n (control_name) -m (model_name) -[f] filename (actions | config | model | models | form) \n";
        echo "-t app -a (app_name) \n";
        echo "-t create \n";
    }


    /**
     *
     */
    private static function doGenerate() {
        \lib\db\PdoMysql::getConn();
        $exec = new \lib\crud\Generate();
        # php task.php -t admin -a app -n control -m model -f ...
        if (isset(self::$options['a']) &&
                isset(self::$options['n'])) {
            $file = (isset(self::$options['f'])) ? self::$options['f'] : null;
            // buildApp($app, $name, $model, $area, $file = null)
            if (self::$options['t'] == 'admin') {
                $exec->buildAdmin(self::$options['a'], self::$options['n'], self::$options['m'], self::$options['t'], $file);
            } elseif (self::$options['t'] == 'cms') {
                $exec->buildCms(self::$options['a'], self::$options['n']);
            } else {
                $exec->buildApp(self::$options['a'], self::$options['n']);
            }
            
        } else {
            echo "-t admin | cms -a (app_name) -n (control_name) -m (model_name) -[f] filename (actions | config | model | models | form) \n";
            echo "no arguments to build app -n appname ... \n";
        }
    }

}
