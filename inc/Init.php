<?php
/**
 * @package CtPlugin
 */

namespace Inc;

final class Init{
    
    /**
     * Store all the classes inside an array
     * @return array full list of classes
     */
    public static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingLinks::class
        ];
    }

    /**
     * loop through the classes, initilize them,
     * and call the register() method of it exist
     * @return 
     */
    public static function register_services() {
        foreach (self::get_services() as $class){
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }

      /**
       * Initilize the class
       * @param class $class class from the services array
       * @return class instance  new instance of the class
       */

    private static function instantiate($class){
        $service = new $class();
        return $service;
    }


}