# Sunny Purge Extra URLs Example

[![License](https://img.shields.io/github/license/typisttech/sunny-purge-extra-urls-example.svg)](https://github.com/TypistTech/sunny-purge-extra-urls-example/blob/master/LICENSE)
[![Donate via PayPal](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.typist.tech/donate/sunny/)
[![Hire Typist Tech](https://img.shields.io/badge/Hire-Typist%20Tech-ff69b4.svg)](https://www.typist.tech/contact/)


This repository is an example of adding extra purge urls to [Sunny](https://wordpress.org/plugins/sunny/) by filters and strategy classes intended to facilitate communication with developers.

**It is not stable and not intended for installation on production sites.**

If you are not a developer or looking for [the `Sunny` plugin](https://wordpress.org/plugins/sunny/), install `Sunny` via [WordPress.org](https://wordpress.org/plugins/sunny/) instead.

Bug reports and pull requests are welcome.



## Examples

### Filter

Adding extra urls by using the `sunny_post_related_urls` filter. 

See [sunny-purge-extra-urls-example.php](./sunny-purge-extra-urls-example.php)

### Strategy class

1. Define a strategy class implementing `StrategyInterface`
2. Add the strategy instance into Sunny's container by using the `sunny_register` action. 

See [sunny-purge-extra-urls-example.php](./sunny-purge-extra-urls-example.php) and [CustomStrategy.php](./CustomStrategy.php)



## Support!

### Donate via PayPal [![Donate via PayPal](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.typist.tech/donate/sunny/)

Love Sunny? Help me maintain Sunny, a [donation here](https://www.typist.tech/donate/sunny/) can help with it. 

### Why don't you hire me?

Ready to take freelance WordPress jobs. Contact me via the contact form [here](https://www.typist.tech/contact/) or, via email [info@typist.tech](mailto:info@typist.tech)

### Want to help in other way? Want to be a sponsor? 

Contact: [Tang Rufus](mailto:tangrufus@gmail.com)



## Feedback

**Please provide feedback!** We want to make this library useful in as many projects as possible.
Please submit an [issue](https://github.com/TypistTech/sunny-purge-extra-urls-example/issues/new) and point out what you do and don't like, or fork the project and make suggestions.
**No issue is too small.**



## Security

If you discover any security related issues, please email sunny@typist.tech instead of using the issue tracker.



## Credits

[Sunny Purge Extra URLs Example](https://github.com/TypistTech/sunny-purge-extra-urls-example) is a [Typist Tech](https://www.typist.tech) project and maintained by [Tang Rufus](https://twitter.com/Tangrufus), freelance developer for [hire](https://www.typist.tech/contact/).

Full list of contributors can be found [here](https://github.com/TypistTech/sunny-purge-extra-urls-example/graphs/contributors).



## License

[Sunny Purge Extra URLs Example](https://github.com/TypistTech/sunny-purge-extra-urls-example) is licensed under the GPLv2 (or later) from the [Free Software Foundation](http://www.fsf.org/).
Please see [License File](LICENSE) for more information.
