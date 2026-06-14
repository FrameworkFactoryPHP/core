<?php

namespace Tests\Accessors {

    use FrameworkFactory\Application\Accessor;

    /**
     * @method static display(string $message): string
     */
    class Message extends Accessor
    {
        /** @inheritdoc */
        protected static string $key = 'message';
    }
}
