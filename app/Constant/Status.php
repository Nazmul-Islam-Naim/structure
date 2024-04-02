<?php

namespace App\Constant;

use ReflectionClass;

class Status {
    /**
     * constant proertis
     * with name and value
     */
    const INACTIVE    = 0;
    const ACTIVE      = 1;

    /**
     * get reflaction class
     * @param className
     * @return newReflactionClass
     */
    protected static function getReflectionClass() {
        return new ReflectionClass(__CLASS__);
    }

    /**
     * get constant by its value
     * @param $value
     * @return $name
     */
    public static function getPropertyName($value) {
        $properties = self::getReflectionClass()->getConstants();
        foreach ($properties as $name => $constantValue) {
            if ($constantValue === $value) {
                return $name;
            }
            throw new \Exception("Type not found!", 1);
        }
    }

    /**
     * get propertis
     * @return proertis
     */
    public static function getProperties() {
        return self::getReflectionClass()->getConstants();
    }
}