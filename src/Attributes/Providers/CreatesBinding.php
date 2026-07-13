<?php

namespace FrameworkFactory\Attributes\Providers {

    use Attribute;

    #[Attribute(Attribute::TARGET_CLASS)]
    readonly class CreatesBinding
    {
        /**
         * @param string $id       the id for the container binding
         * @param string $concrete the class to use for the binding
         */
        public function __construct(public string $id, public string $concrete)
        {
            // ...
        }
    }
}
