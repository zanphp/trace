<?php

namespace Zan\Framework\Sdk\Trace;

use ZanPHP\Contracts\Trace\Tracer;

class ZanTracer extends Tracer
{

    public function __construct($rootId = null, $parentId = null)
    {

    }

    public function initHeader($msgId = null)
    {

    }

    public function transactionBegin($type, $name)
    {

    }

    public function transactionEnd($handle, $status, $sendData = '')
    {

    }

    public function logEvent($type, $status, $name = "", $context = "")
    {

    }

    public function uploadTraceData()
    {

    }
}