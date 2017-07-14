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

/**
 * Plugin Name:     Sunny Purge Extra URLs Example
 * Plugin URI:      https://www.typist.tech/projects/sunny-purge-extra-urls-example
 * Description:     Example of purging extra urls by filters and strategies.
 * Version:         0.2.0
 * Author:          Typist Tech
 * Author URI:      https://www.typist.tech/
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
 */

declare(strict_types=1);

namespace TypistTech\SunnyPurgeExtraUrlsExample;

use TypistTech\Sunny\Vendor\League\Container\Container;
use WP_Post;

//======================================================================
// Related URLs Filter Example
//======================================================================

add_filter('sunny_post_related_urls', __NAMESPACE__ . '\add_extra_related_urls_by_filter', 10, 2);

/**
 * Add extra related urls.
 *
 * @param string[] $urls The original related urls of $post.
 * @param WP_Post  $post The post object that triggered this purge
 *
 * @return string[] The related urls of $post.
 */
function add_extra_related_urls_by_filter(array $urls, WP_Post $post): array
{
    // http and https are different!
    // You should make use of $post to determine these urls. Otherwise, use `targets` instead.
    $urls['extra-related-urls-filter'] = [
        'https://example.com/related-urls/added-by-filter-1',
        'https://example.com/related-urls/added-by-filter-2',
    ];

    return $urls;
}

//======================================================================
// Related URLs Strategy example
//======================================================================

// $priority is set to a higher integer ensuring the default strategies have already been registered.
add_action('sunny_register', __NAMESPACE__ . '\register_custom_related_urls_strategy', 1000);

function register_custom_related_urls_strategy(Container $container)
{
    // Require source file within action ensuring the strategy interface have already been loaded.
    require_once plugin_dir_path(__FILE__) . 'CustomRelatedUrlsStrategy.php';

    $strategies = $container->get('related_urls_strategies');

    $strategies[] = new CustomRelatedUrlsStrategy;

    $container->share('related_urls_strategies', $strategies);
}

//======================================================================
// Targets Filter Example
//======================================================================

add_filter('sunny_targets', __NAMESPACE__ . '\add_extra_targets_by_filter');

/**
 * Add extra targets.
 *
 * @param string[] $urls The original targets.
 *
 * @return string[] The related urls of $post.
 */
function add_extra_targets_by_filter(array $urls): array
{
    // http and https are different!
    $urls['extra-targets-filter'] = [
        'https://example.com/targets/added-by-filter-1',
        'https://example.com/targets/added-by-filter-2',
    ];

    return $urls;
}

//======================================================================
// Targets Strategy example
//======================================================================

// $priority is set to a higher integer ensuring the default strategies have already been registered.
add_action('sunny_register', __NAMESPACE__ . '\register_custom_targets_strategy', 1000);

function register_custom_targets_strategy(Container $container)
{
    // Require source file within action ensuring the strategy interface have already been loaded.
    require_once plugin_dir_path(__FILE__) . 'CustomTargetsStrategy.php';

    $strategies = $container->get('targets_strategies');

    $strategies[] = new CustomTargetsStrategy;

    $container->share('targets_strategies', $strategies);
}
