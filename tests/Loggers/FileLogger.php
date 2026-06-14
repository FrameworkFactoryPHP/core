<?php

namespace Tests\Loggers {

    use Tests\Contracts\LoggerInterface;

    class FileLogger implements LoggerInterface
    {
        public function log(string $message): mixed
        {
            return "[FILE] {$message}";
        }
    }
}
