<?php
/**
 * Sunny Purge Extra URLs Example
 *
 * Example of purging extra urls by filters and strategy classes.
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

use TypistTech\Sunny\Posts\RelatedUrls\Strategies\StrategyInterface;
use WP_Post;

final class CustomStrategy implements StrategyInterface
{
    /**
     * Key of the strategy.
     *
     * @return string
     */
    public function getKey(): string
    {
        return 'custom-strategy';
    }

    /**
     * Locate related urls.
     *
     * @param WP_Post $post The WP_Post object from which relationships are determined.
     *
     * @return string[] The related urls of $post.
     */
    public function locate(WP_Post $post): array
    {
        // http and https are different!
        $related = [
            'https://example.com/added-by-strategy-1',
            'https://example.com/added-by-strategy-2',
        ];

        return array_values(array_filter($related));
    }
}
