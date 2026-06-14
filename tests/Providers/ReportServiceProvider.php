<?php

namespace Tests\Providers {

    use FrameworkFactory\Contracts\Container\ContainerInstance;
    use FrameworkFactory\Contracts\Providers\ServiceProvider;
    use Tests\Contracts\LoggerInterface;
    use Tests\Loggers\FileLogger;
    use Tests\Loggers\NullLogger;
    use Tests\Services\CacheWarmer;
    use Tests\Services\ReportService;

    class ReportServiceProvider extends ServiceProvider
    {
        public function register(): void
        {
            // container bindings
            $this->container->bind(LoggerInterface::class, fn () => new NullLogger());

            $this->container->bind(
                ReportService::class,
                fn (ContainerInstance $c) => new ReportService(
                    $c->get(LoggerInterface::class)
                )
            );

            $this->container->bind(
                CacheWarmer::class,
                fn (ContainerInstance $c) => new CacheWarmer(
                    $c->get(LoggerInterface::class)
                )
            );

            // context-api
            $this->container
                ->when(ReportService::class)
                ->needs(LoggerInterface::class)
                ->give(FileLogger::class);

            $this->container
                ->when(CacheWarmer::class)
                ->needs(LoggerInterface::class)
                ->give(NullLogger::class);

        }
    }
}
