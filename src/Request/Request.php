<?php

// namespace Sruuua\Request;
namespace App\Request;


class Request
{
    private array $header;

    private array $get;

    private array $body;

    private string $requestedPage;

    private string $method;

    public static function getRequest()
    {
        return new static;
    }

    public function __construct()
    {
        $this->header = getallheaders();
        $this->get = $_GET;
        $this->body = $_POST;
        $this->requestedPage = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getAuthorization(): ?string
    {
        return $this->header['Authorization'] ?? null;
    }

    public function getRequestedPage(): string
    {
        return $this->requestedPage;
    }

    public function get(): array
    {
        return $this->get;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function getMethod()
    {
        return $this->method;
    }
}
