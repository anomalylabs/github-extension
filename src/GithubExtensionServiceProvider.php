<?php namespace Anomaly\GithubExtension;

use Abraham\GithubOAuth\GithubOAuth;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\GithubExtension\Github\GithubConnection;
use Anomaly\GithubExtension\Github\GithubExtensionPlugin;
use Github\Client;
use Illuminate\Contracts\Config\Repository;

/**
 * Class GithubExtensionServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GithubExtensionServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        GithubExtensionPlugin::class,
    ];

    /**
     * Boot the addon.
     *
     * @param Repository $config
     */
    public function boot(Repository $config)
    {

        /**
         * Setup our pre-configured GitHub client instance alias.
         */
        if ($token = $config->get('anomaly.extension.github::github.token')) {
            $this->app->singleton(
                GithubConnection::class,
                function () use ($token) {

                    $client = new Client();

                    $client->authenticate($token, null, 'http_token');

                    return new GithubConnection($client);
                }
            );
        }
    }

}
