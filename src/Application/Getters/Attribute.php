<?php

namespace FrameworkFactory\Application\Getters {

    class Attribute
    {
        /** @var array $reflections cached reflection classes */
        private static array $reflections = [];

        /** @var array cached attributes */
        private static array $cache = [];

        /**
         * Returns a cached instance of an attribute passed in at
         * class level.
         *
         * @param string $class
         * @param string $attribute
         *
         * @return object|null
         */
        public static function get(string $class, string $attribute): ?object
        {
            $key = "{$class}:{$attribute}";

            if (!array_key_exists($key, self::$cache)) {
                $attrs = self::reflection($class)->getAttributes($attribute);

                self::$cache[$key] = $attrs ? $attrs[0]->newInstance() : null;
            }

            return self::$cache[$key];
        }

        /**
         * Determines whether a class has an attribute.
         *
         * @param string $class
         * @param string $attribute
         *
         * @return bool
         */
        public static function has(string $class, string $attribute): bool
        {
            return self::get($class, $attribute) !== null;
        }

        /**
         * Returns a ReflectionClass instance.
         *
         * @param string $class
         *
         * @return \ReflectionClass
         */
        private static function reflection(string $class): \ReflectionClass
        {
            return self::$reflections[$class] ??= new \ReflectionClass($class);
        }
    }
}
