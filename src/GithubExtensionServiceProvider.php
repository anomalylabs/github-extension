<?php namespace Anomaly\GithubExtension;

use Abraham\GithubOAuth\GithubOAuth;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\GithubExtension\Github\GithubConnection;
use Anomaly\GithubExtension\Github\GithubExtensionPlugin;
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
         * Setup our pre-configured GithubOAuth instance alias.
         */
        if ($config->get('anomaly.extension.github::github.consumer_key')) {
            $this->app->singleton(
                GithubConnection::class,
                function () use ($config) {
                    return new GithubConnection(
                        new GithubOAuth(
                            $config->get('anomaly.extension.github::github.consumer_key'),
                            $config->get('anomaly.extension.github::github.consumer_secret'),
                            $config->get('anomaly.extension.github::github.access_token'),
                            $config->get('anomaly.extension.github::github.access_token_secret')
                        )
                    );
                }
            );
        }
    }

}
