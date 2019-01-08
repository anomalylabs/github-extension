<?php namespace Anomaly\GithubExtension\Github;

use Abraham\GithubOAuth\GithubOAuth;
use Github\Client;

/**
 * Class GithubConnection
 *
 * This is a singleton bound to the
 * pre-configured GithubOauth class.
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GithubConnection
{

    /**
     * The GitHub connection.
     *
     * @var Client
     */
    protected $connection;

    /**
     * Create a new GithubConnection instance.
     *
     * @param Client $connection
     */
    public function __construct(Client $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get the connection.
     *
     * @return Client
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Pass methods through.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }

}
