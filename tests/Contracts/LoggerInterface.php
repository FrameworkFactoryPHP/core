<?php

namespace Tests\Contracts {

    interface LoggerInterface
    {
        public function log(string $message): mixed;
    }
}
