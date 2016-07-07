# RssWriter

[![Build Status](https://travis-ci.org/marcw/rss-writer.svg?branch=master)](https://travis-ci.org/marcw/rss-writer)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8/mini.png)](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8)

A simple, yet powerful and fully customizable RSS 2.0 writing library, with a
native support of iTunes podcasting tags and other RSS extensions.

## Why a new Rss writing library?

At the time of writing this library, the current state of feed writing
libraries was not satisfying. What I found was either difficult to extend, too
generic, or wasn't taking advantage of best practices in order to reduce the
[Time To First Byte](https://en.wikipedia.org/wiki/Time_To_First_Byte).

## Why should I use this over other libraries?

Use this library if you want:

- RSS2 feeds (because there's no support for other types of feed).
- Extensions for iTunes podcasting, Slash, Sy, DublinCreator, Atom, or just your own.
- Best performance (memory and TTFB) thanks to XML Streaming.
- Object oriented feed creation with POPO

## How can I install it?

Run `composer require marcw/rss-writer`.

## How does it work?

### Feed creation

See [this file](tests/RssWriterTest.php).

### Rss Streamed Response

See [this file](tests/Bridge/Symfony/HttpFoundation/RssStreamedResponseTest.php).

### Symfony Bridge

The library provides an extension to the `Symfony\Component\HttpFoundation\Response` class for streaming rss responses to the client. See [`RssStreamedResponse.php`](src/Bridge/Symfony/HttpFoundation/RssStreamedResponse.php).

### Symfony Bundle

This library also provides a Symfony bundle.

Add this to your `AppKernel.php` file.

    new MarcW\RssWriter\Bundle\MarcWRssWriterBundle()

You can now use the `marcw_rss_writer.rss_writer` service.

You can also return a `RssStreamedResponse` from your controller like this:

    use MarcW\RssWriter\Bridge\Symfony\HttpFoundation\RssStreamedResponse;

    public function myAction()
    {
        // $channel = ... (whatever you use to create your Channel object)

        return new RssStreamedResponse($channel, $this->get('marcw_rss_writer.rss_writer'));
    }

## Can I contribute?

Sure! Feel free to report issues, send pull-requests, or ask for help.

## LICENSE

See the LICENSE file.
