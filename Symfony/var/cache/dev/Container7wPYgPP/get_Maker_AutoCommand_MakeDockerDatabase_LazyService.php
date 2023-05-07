<?php

namespace Container7wPYgPP;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Maker_AutoCommand_MakeDockerDatabase_LazyService extends App_KernelDevContainer
{
    /*
     * Gets the private '.maker.auto_command.make_docker_database.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.maker.auto_command.make_docker_database.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('make:docker:database', [], 'Adds a database container to your docker-compose.yaml file', false, function () use ($container): \Symfony\Bundle\MakerBundle\Command\MakerCommand {
            return ($container->privates['maker.auto_command.make_docker_database'] ?? $container->load('getMaker_AutoCommand_MakeDockerDatabaseService'));
        });
    }
}
