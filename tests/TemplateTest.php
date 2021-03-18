<?php declare(strict_types=1);

namespace DL2\Tests;

use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class TemplateTest extends TestCase
{
    /**
     * @template TProviderType as array<int,int>
     *
     * @return Generator<TProviderType>
     *
     * @internal
     */
    public function dataProviderForSomething(): Generator
    {
        yield [1, 2];
        yield [2, 3];
        yield [3, 4];
        yield [4, 5];
        yield [5, 7];
    }

    /**
     * @dataProvider dataProviderForSomething
     */
    public function testSomething(int $input, int $expected): void
    {
        static::assertSame($input + 1, $expected);
    }
}
