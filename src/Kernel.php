<?php

namespace App;

use App\Request\Request;


use Sruuua\DependencyInjection\Container;
use Sruuua\DependencyInjection\ContainerBuilder;
use Symfony\Component\Dotenv\Dotenv;

class Kernel
{
    /**
     * @var Container
     */
    private Container $container;

    /**
     * @var string[]
     */
    private array $env;

    public function __construct()
    {
        $dotenv = new Dotenv();
        $dotenv->load('../.env');

        $this->env = $_ENV;
        $this->container = (new ContainerBuilder($this))->getContainer();
    }

    /**
    * Handle the request
    *
    * @param Request $request request to handle
    */
    public function handle(Request $request): void
    {
        $page = $this->container->get('router')->getRouter()->getRoute($request->getRequestedPage());
        $func = $page->getFunction()->getName();
        $page->getController()->$func();
    }

    /**
     * Return the env values
     * 
     * @return array
     */
    public function getEnv(): array
    {
        return $this->env;
    }
}
