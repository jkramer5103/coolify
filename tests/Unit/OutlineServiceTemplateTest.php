<?php

use Symfony\Component\Yaml\Yaml;

it('uses a PostgreSQL version that supports Outline trigger replacement migrations', function () {
    $compose = Yaml::parseFile(__DIR__.'/../../templates/compose/getoutline.yaml');
    $image = $compose['services']['postgres']['image'];

    expect($image)->toMatch('/^postgres:\d+(?:\.\d+)*-alpine$/');

    $majorVersion = (int) explode(':', $image)[1];

    expect($majorVersion)->toBeGreaterThanOrEqual(14);
});
