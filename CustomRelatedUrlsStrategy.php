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

use TypistTech\Sunny\Posts\RelatedUrls\Strategies\StrategyInterface;
use WP_Post;

final class CustomRelatedUrlsStrategy implements StrategyInterface
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
     * @param WP_Post $post The WP_Post object from which relationships are determined.
     *
     * @return string[] The related urls of $post.
     */
    public function locate(WP_Post $post): array
    {
        // You should make use of $post to determine these urls. Otherwise, use `targets` instead.
        // http and https are different!
        $related = [
            'https://example.com/related-urls/added-by-strategy-1',
            'https://example.com/related-urls/added-by-strategy-2',
        ];

        return array_values(array_filter($related));
    }
}
