<?php

namespace Zan\Framework\Sdk\Trace;


class TraceBuilder
{
    private $TraceBuilder;

    public function __construct()
    {
        $this->TraceBuilder = new \ZanPHP\Trace\TraceBuilder();
    }

    public function buildHeader(array $header)
    {
        $this->TraceBuilder->buildHeader($header);
    }

    public function buildTransaction(array $transaction)
    {
        $this->TraceBuilder->buildTransaction($transaction);
    }

    public function commitTransaction(array $transaction)
    {
        $this->TraceBuilder->commitTransaction($transaction);
    }

    public function buildEvent(array $event)
    {
        $this->TraceBuilder->buildEvent($event);
    }

    public function isNotEmpty()
    {
        $this->TraceBuilder->isNotEmpty();
    }

    public function getData()
    {
        $this->TraceBuilder->getData();
    }

    public static function generateId()
    {
        \ZanPHP\Trace\TraceBuilder::generateId();
    }
}