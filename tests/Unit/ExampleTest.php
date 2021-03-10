<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2021 Daniel Bannert
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/narrowspark/php-library-template
 */

namespace Narrowspark\Library\Tests\Unit;

use Narrowspark\Library\Example;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @covers \Narrowspark\Library\Example
 *
 * @small
 */
final class ExampleTest extends TestCase
{
    public function testFromNameReturnsExample(): void
    {
        $name = 'test';

        $example = Example::fromName($name);

        self::assertSame($name, $example->name());
    }
}
