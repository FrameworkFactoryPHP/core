<?php

use FrameworkFactory\Application;

describe('lifecycle hook tests', function () {

    it('the container instance is executing lifecycle hooks, and executing them in the correct order', function () {
        $container = Application::container();

        $events = [];

        $container->bind('service', function () use (&$events) {
            $events[] = 'resolve';
            return new stdClass();
        });

        $container->beforeResolving('service', function () use (&$events) {
            $events[] = 'before';
        });

        $container->afterResolving('service', function () use (&$events) {
            $events[] = 'after';
        });

        $container->get('service');

        expect($events)->toBe([
            'before',
            'resolve',
            'after',
        ]);
    });

})->group('lifecycle');
