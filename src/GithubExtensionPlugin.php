<?php namespace Anomaly\GithubExtension\Github;

use Abraham\GithubOAuth\GithubOAuth;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria;
use Anomaly\Streams\Platform\Support\Collection;

/**
 * Class GithubExtensionPlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GithubExtensionPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'github',
                function ($method) {
                    return new PluginCriteria(
                        'get',
                        function (Collection $options, GithubConnection $connection) use ($method) {

                            /* @var GithubOAuth $connection */
                            return $connection->get($method, $options->all());
                        }
                    );
                }
            ),
        ];
    }
}
