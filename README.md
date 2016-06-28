# RssWriter

[![Build Status](https://travis-ci.org/marcw/rss-writer.svg?branch=master)](https://travis-ci.org/marcw/rss-writer)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8/mini.png)](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8)

A simple, yet powerful and fully customizable RSS 2.0 writing library.

## Why a new Rss writing library?

At the time of writing this library, the current state of feed writing
libraries was not satisfying. What I found was either hard to extend, too
generic, or were not taking advantage of best practices in order to reduce the
[Time To First Byte](https://en.wikipedia.org/wiki/Time_To_First_Byte).

## Why should I use this over other libraries?

Use this library if you want:

- RSS2 feeds (because there's no support for other types of feed).
- Extensions for iTunes podcasting, Slash, Sy or GeoRSS.
- Minimal memory footprint thanks to XML streaming.
- Minimal TTFB thanks to XML streaming.
- Object oriented feed creation with POPO

## How does it work?

### Feed creation

See [this file](blob/master/tests/RssWriterTest.php).

### Rss Streamed Response

See [this file](blob/master/tests/Bridge/Symfony/HttpFoundation/RssStreamedResponseTest.php).

## Can I contribute?

Sure. Feel free to contribute issues or pull-requests. Feel free to ask
questions as well.

## LICENSE

See the LICENSE file.
