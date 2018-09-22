<?php
/**
 * Copyright: IMPER.INFO Adrian Szuszkiewicz
 * Date: 22.09.18
 * Time: 14:40
 */

namespace Imper86\S3SimpleClientBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('imper86_s3_client');

        $rootNode
            ->children()
                ->scalarNode('version')->defaultValue('latest')->end()
                ->scalarNode('region')->defaultValue('')->end()
                ->arrayNode('credentials')
                    ->children()
                        ->scalarNode('key')->defaultValue('%env(S3_KEY)%')->isRequired()->end()
                        ->scalarNode('secret')->defaultValue('%env(S3_SECRET)%')->isRequired()->end()
                    ->end()
                ->end()
                ->scalarNode('endpoint')->defaultValue('%env(S3_ENDPOINT)%')->isRequired()->end()
                ->booleanNode('use_path_style_endpoint')->defaultTrue()->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
