<?php

use Tests\Services\CacheWarmer;
use Tests\Services\ReportService;

describe('context api tests', function () {

    test('the context api properly switches services out based on their contextual requirements', function () {
        $reportService = \FrameworkFactory\Application::get(ReportService::class);
        $warmerService = \FrameworkFactory\Application::get(CacheWarmer::class);

        expect($reportService->generate())
            ->toBe('[FILE] Generating report...')
            ->and($warmerService->warm())
            ->toBe('[NULL] Warming cache...');

    });

})->group('context_api');
