<?php

namespace Zan\Framework\Sdk\Trace;

use ZanPHP\Contracts\Trace\Tracer;

class ZanTracer extends Tracer
{
    private $ZanTracer;

    public function __construct($rootId = null, $parentId = null)
    {
        $this->ZanTracer = new \ZanPHP\Trace\ZanTracer($rootId, $parentId );
    }

    public function initHeader($msgId = null)
    {
        $this->ZanTracer->initHeader($msgId);
    }

    public function transactionBegin($type, $name)
    {
        $this->ZanTracer->transactionBegin($type, $name);
    }

    public function transactionEnd($handle, $status, $sendData = '')
    {
        $this->ZanTracer->transactionEnd($handle, $status, $sendData);
    }

    public function logEvent($type, $status, $name = "", $context = "")
    {
        $this->ZanTracer->logEvent($type, $status, $name, $context);
    }

    public function uploadTraceData()
    {
        $this->ZanTracer->uploadTraceData();
    }
}