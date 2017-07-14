<?php
/**
 * Sunny Purge Extra URLs Example
 *
 * Example of purging extra urls by filters and strategies.
 *
 * @package   SunnyPurgeExtraUrlsExample
 *
 * @author    Typist Tech <sunny@typist.tech>
 * @copyright 2017 Typist Tech
 * @license   GPL-2.0+
 *
 * @see       https://www.typist.tech/projects/sunny-purge-extra-urls-example
 */

declare(strict_types=1);

namespace TypistTech\SunnyPurgeExtraUrlsExample;

use TypistTech\Sunny\Targets\Strategies\StrategyInterface;

final class CustomTargetsStrategy implements StrategyInterface
{
    /**
     * Key of the strategy.
     *
     * @return string
     */
    public function getKey(): string
    {
        return 'custom-related-urls-strategy';
    }

    /**
     * Locate related urls.
     *
     * @return string[] The related urls of $post.
     */
    public function all(): array
    {
        // You should make use of $post to determine these urls. Otherwise, use `targets` instead.
        // http and https are different!
        $related = [
            'https://example.com/targets/added-by-strategy-1',
            'https://example.com/targets/added-by-strategy-2',
        ];

        return array_values(array_filter($related));
    }
}
