<?php

namespace MarcW\RssWriter\Bundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * WriterPass.
 *
 * @author Marc Weistroff <marc@weistroff.net> 
 */
class WriterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('marcw_rss_writer.rss_writer')) {
            return;
        }

        $definition = $container->getDefinition('marcw_rss_writer.rss_writer');

        foreach ($container->findTaggedServiceIds('marcw_rss_writer.extension.writer') as $id => $writer) {
            $definition->addMethodCall('registerWriter', [new Reference($id)]);
        }
    }
}
