# BeepPHP

[![Build Status](https://travis-ci.org/sverraest/Beep-php.svg?branch=master)](https://travis-ci.org/sverraest/Beep-php)
[![codecov](https://codecov.io/gh/sverraest/Beep-php/branch/master/graph/badge.svg)](https://codecov.io/gh/sverraest/Beep-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sverraest/Beep-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sverraest/Beep-php/?branch=master)
[![Maintainability](https://api.codeclimate.com/v1/badges/ef5f5dd14aeac02f0daf/maintainability)](https://codeclimate.com/github/sverraest/Beep-php/maintainability)
[![Latest Stable Version](https://poser.pugx.org/sverraest/Beep-php/v/stable)](https://packagist.org/packages/sverraest/Beep-php)
[![License](https://poser.pugx.org/sverraest/Beep-php/license)](https://packagist.org/packages/sverraest/Beep-php)
[![composer.lock](https://poser.pugx.org/sverraest/Beep-php/composerlock)](https://packagist.org/packages/sverraest/Beep-php)

> PHP API Client and bindings for the [Beep Solutions API](https://github.com/BeepPay/Beep-apidoc)

Using this PHP API Client you can interact with your Beep Solutions:
- 💳 __Transactions__

## Installation

Requires PHP 7.0 or higher

The recommended way to install Beep-php is through [Composer](https://getcomposer.org):

First, install Composer:

```
$ curl -sS https://getcomposer.org/installer | php
```

Next, install the latest Beep-php:

```
$ php composer.phar require sverraest/Beep-php
```

Finally, you need to require the library in your PHP application:

```php
require "vendor/autoload.php";
```

## Development

- Run `composer test` and `composer phpcs` before creating a PR to detect any obvious issues.
- Please create issues for this specific API Binding under the [issues](https://github.com/sverraest/revolut-php/issues) section.
- [Contact Beep Solutions](https://beep.solutions) directly for Beep Solutions API support.


## Quick Start
### BeepPHP\Client
First get your `production` or `sandbox` API key from [Beep Solutions](https://app.beep.solutions/dashboard/apps).

If you want to get a `production` client:

```php
use BeepPHP\Client;

$client = new Client('apikey', 'appid');
```

If you want to get a `sandbox` client:

```php
use BeepPHP\Client;

$client = new Client('apikey', 'appid', 'sandbox');
```

If you want to pass additional [GuzzleHTTP](https://github.com/guzzle/guzzle) options:

```php
use BeepPHP\Client;

$options = ['headers' => ['foo' => 'bar']];
$client = new Client('apikey', 'appid', 'sandbox', $options);
```

## Available API Operations

The following exposed API operations from the Beep Solutions API are available using the API Client.

See below for more details about each resource.

💳 __Transactions__

Create a new transaction with or without a specific payment method.

## Usage details

### 💳 Transactions
#### Create transaction with a specific payment method

```php
use BeepPHP\Client;

$client = new Client('apikey', 'appid');

$json = [
 "provider" => "alipay", // Payment method enabled for your merchant account such as bcmc, alipay, card
 "currency" => "GBP",
 "amount" => 1000, // 10.00 GBP
 "redirectUrl" => "https://foo.bar/order/123" // Optional redirect after payment completion
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction["url"]); // Go to transaction payment page
```

#### Create transaction without a payment method that will redirect to the payment method selection screen

```php
use BeepPHP\Client;

$client = new Client('apikey', 'appid');

$json = [
 "currency" => "GBP",
 "amount" => 1000, // 10.00 GBP
 "redirectUrl" => "https://foo.bar/order/987" // Optional redirect after payment completion
];

$transaction = $client->transactions->create($json);
header('Location: '. $transaction["url"]); // Go to payment method selection screen
```


## About

➡️ You can follow me on 🐦 [Twitter](https://www.twitter.com/simondoestech) or ✉️ email me at simon[-at-]beep.solutions.

⭐ Sign up as a merchant at https://beep.solutions and start receiving payments in seconds.
