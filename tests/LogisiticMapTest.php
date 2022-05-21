<?php

use PHPUnit\Framework\TestCase;
use Maalls\LogisticMap;

final class LogisiticMapTest extends TestCase
{
    public function testGenerate(): void
    {
        $map = new LogisticMap(3.545, 3.65);
        $map->generate();

    }
}