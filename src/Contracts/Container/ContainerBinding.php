<?php

namespace FrameworkFactory\Contracts\Container {

	final readonly class ContainerBinding
	{
		/**
		 * A class that models the shape of a container binding
		 *
		 * @param mixed $factory
		 * @param bool  $shared
		 */
		public function __construct(
			public mixed $factory,
			public bool $shared
		) {}
	}
}