<?php

namespace Tests\Providers {

    use FrameworkFactory\Contracts;
    use Tests\Services\MessageService;

    class DeferredServiceProvider extends Contracts\Providers\ServiceProvider
    {
        /**
         * @inheritdoc
         */
        public function register(): void
        {
            $this->singleton('deferred_message', fn () => new MessageService());
        }

        /**
         * @inheritdoc
         */
        public function provides(): array
        {
            return ['deferred_message'];
        }
    }
}
