<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020 Daniel Bannert
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/narrowspark/php-library-template
 */

namespace Narrowspark\Library\Tests\AutoReview;

use PHPUnit\Framework\TestCase;
use function json_decode;
use function file_get_contents;

/**
 * @internal
 *
 * @coversNothing
 * @group auto-review
 * @group covers-nothing
 */
final class ComposerTest extends TestCase
{
    /**
     * Should be removed, And a class version should be used.
     *
     * @var string
     */
    private const VERSION = '1.0.0';

    public function testBranchAlias(): void
    {
        $composerJson = json_decode(file_get_contents(__DIR__.'/../../composer.json'), true);

        if (!isset($composerJson['extra']['branch-alias'])) {
            $this->addToAssertionCount(1); // composer.json doesn't contain branch alias, all good!
            return;
        }

        static::assertSame(
            ['dev-master' => $this->convertAppVersionToAliasedVersion(self::VERSION)],
            $composerJson['extra']['branch-alias']
        );
    }

    /**
     * @param string $version
     *
     * @return string
     */
    private function convertAppVersionToAliasedVersion(string $version): string
    {
        $parts = explode('.', $version, 3);

        return sprintf('%d.%d-dev', $parts[0], $parts[1]);
    }
}
