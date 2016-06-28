<?php

namespace MarcW\RssWriter\Bundle;

use MarcW\RssWriter\Bundle\DependencyInjection\Compiler\WriterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MarcWRssWriterBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new WriterPass());
    }
}
