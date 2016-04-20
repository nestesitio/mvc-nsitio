<?php

namespace apps\Taskings\tasks;

/**
 * Description of Task
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Mar 3, 2016
 */
class Task {
    
    private static $options = [];
    private static $fp;

    public static function execute($options, $fp) {
        self::$options = $options;
        self::$fp = $fp;
        if (isset(self::$options['t'])) {
            $task = self::$options['t'];

            if ($task == 'model') {
                $exec = new \lib\crud\Generate();
                # php task.php -t model
                $exec->buildModel();
            } elseif ($task == 'admin' || $task == 'app') {
                self::doGenerate();
            }
        } else {
            self::manual();
        }
    }
    
    private static function manual() {
        echo "-t [model, admin, app] \n";
        echo "-t model \n";
        echo "-t admin -t admin -a (app_name) -n (control_name) -m (model_name) -[f] filename (actions | config | model | models | form) \n";
        echo "-t app -a (app_name) -t (table_name) \n";
        echo "-t convert -a folder -n (sell-out | sell-in) \n";
    }
    
    
    private static function doGenerate(){
        $exec = new \lib\crud\Generate();
        # php task.php -t admin -a app -n control -m model -f ...
        if (self::$options['a'] && self::$options['n'] && self::$options['m']) {
            $file = (isset(self::$options['f'])) ? self::$options['f'] : null;
            // buildApp($app, $name, $model, $area, $file = null)
            $exec->buildApp(self::$options['a'], self::$options['n'], self::$options['m'], self::$options['t'], $file);
        } else {
            echo "no arguments to build app -n appname, -m table_name ... \n";
        }
    }

}
