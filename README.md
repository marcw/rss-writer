# RssWriter

[![Build Status](https://travis-ci.org/marcw/rss-writer.svg?branch=master)](https://travis-ci.org/marcw/rss-writer)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8/mini.png)](https://insight.sensiolabs.com/projects/515dfe1b-e319-46a2-9b12-b1fc9508b5a8)
[![Coverage Status](https://coveralls.io/repos/github/marcw/rss-writer/badge.svg?branch=master)](https://coveralls.io/github/marcw/rss-writer?branch=master)

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

#### HttpFoundation

The library provides an extension to the `Symfony\Component\HttpFoundation\Response` class for streaming rss responses to the client. See [`RssStreamedResponse.php`](src/Bridge/Symfony/HttpFoundation/RssStreamedResponse.php).
Use it from your controllers like this:

    use MarcW\RssWriter\Bridge\Symfony\HttpFoundation\RssStreamedResponse;

    public function myAction()
    {
        // $channel = ... (whatever you use to create your Channel object)

        return new RssStreamedResponse($channel, $this->get('marcw_rss_writer.rss_writer'));
    }


#### Form

An iTunes category choice list is available to use in your forms. Follow this example:

    <?php

    namespace AppBundle\Form;

    use AppBundle\Entity\File;
    use MarcW\RssWriter\Bridge\Symfony\Form\ChoiceList\Loader\ItunesCategoryChoiceLoader;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\FormBuilderInterface;

    class MyFormType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            // ...
            $builder->add('category', ChoiceType::class, ['choice_loader' => new ItunesCategoryChoiceLoader()])
            // ...
        }
    }

### Symfony Bundle

This library also provides a Symfony bundle.

Add this to your `AppKernel.php` file.

    new MarcW\RssWriter\Bundle\MarcWRssWriterBundle()

You can now use the `marcw_rss_writer.rss_writer` service.

## Can I contribute?

Sure! Feel free to report issues, send pull-requests, or ask for help.

## LICENSE

See the LICENSE file.
