<?php

namespace Tests\Loggers {

    use Tests\Contracts\LoggerInterface;

    class NullLogger implements LoggerInterface
    {
        public function log(string $message): mixed
        {
            return "[NULL] {$message}";
        }
    }
}
