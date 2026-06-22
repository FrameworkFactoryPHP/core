<?php

use FrameworkFactory\Application\Bootstrap\Autoloader;

describe('autoloader tests', function () {

    test('the autoloader can register a namespace and the classes in that namespace to it', function () {

        $autoloader = new Autoloader();

        $autoloader->addNamespace('App', __DIR__ . '/../Autoloader');

        $classList = $autoloader->getClasses();
        $classname = \App\TestClass::class;

        expect($classList)->toContain($classname);

    });

})->group('autoloader');
