<?php

namespace Tests\Providers {

    use FrameworkFactory\Contracts;
    use Tests\Services\MessageService;

    class MessageServiceProvider extends Contracts\Providers\ServiceProvider
    {
        /**
         * @inheritdoc
         */
        public function register(): void
        {
            $this->bind('message', fn () => new MessageService());
        }
    }
}
