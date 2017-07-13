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

/**
 * Plugin Name:     Sunny Purge Extra URLs Example
 * Plugin URI:      https://www.typist.tech/projects/sunny-purge-extra-urls-example
 * Description:     Example of purging extra urls by filters and strategy classes.
 * Version:         0.1.0
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
// Filter Example
//======================================================================

add_filter('sunny_post_related_urls', __NAMESPACE__ . '\add_extra_urls_by_filter', 10, 2);

/**
 * Add extra urls.
 *
 * @param string[] $urls The related urls of $post.
 * @param WP_Post  $post The post object that triggered this purge
 *
 * @return string[] The related urls of $post.
 */
function add_extra_urls_by_filter(array $urls, WP_Post $post): array
{
    // http and https are different!
    $urls['custom-filter'] = [
        'https://example.com/added-by-filter-1',
        'https://example.com/added-by-filter-2',
    ];

    return $urls;
}

//======================================================================
// Strategy Class example
//======================================================================

// $priority is set to a higher integer ensuring the default strategies have already been registered.
add_action('sunny_register', __NAMESPACE__ . '\register_custom_strategy', 1000);

function register_custom_strategy(Container $container)
{
    // Require source file within action ensuring the strategy interface have already been loaded.
    require_once plugin_dir_path(__FILE__) . 'CustomStrategy.php';

    $strategies = $container->get('related_urls_strategies');

    $strategies[] = new CustomStrategy;

    $container->share('related_urls_strategies', $strategies);
}
