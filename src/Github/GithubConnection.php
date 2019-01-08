<?php namespace Anomaly\GithubExtension\Github;

use Abraham\GithubOAuth\GithubOAuth;

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
     * The github connection.
     *
     * @var GithubOAuth
     */
    protected $connection;

    /**
     * Create a new GithubConnection instance.
     *
     * @param GithubOAuth $connection
     */
    public function __construct(GithubOAuth $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get the connection.
     *
     * @return GithubOAuth
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
