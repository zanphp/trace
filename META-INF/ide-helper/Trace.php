<?php

namespace Zan\Framework\Sdk\Trace;

use ZanPHP\Contracts\Trace\Trace as TraceContract;

class Trace implements TraceContract
{
    private $Trace;

    public function __construct($config, $rootId = null, $parentId = null)
    {
        $this->Trace = new \ZanPHP\Trace\Trace($config, $rootId, $parentId);
    }

    public function initHeader($msgId = null)
    {
        $this->Trace->initHeader($msgId);
    }

    public function transactionBegin($type, $name)
    {
        $this->Trace->transactionBegin($type, $name);
    }

    public function getRootId()
    {
        $this->Trace->getRootId();
    }

    public function getParentId()
    {
        $this->Trace->getParentId();
    }

    public function commit($handle, $status, $sendData = '')
    {
        $this->Trace->commit($handle, $status, $sendData);
    }

    public function logEvent($type, $status, $name = "", $context = "")
    {
        $this->Trace->logEvent($type, $status, $name, $context);
    }

    public function setRemoteCallMsgId($remoteCallMsgId)
    {
        $this->Trace->setRemoteCallMsgId($remoteCallMsgId);
    }

    public function getRemoteCallMsgId()
    {
        $this->Trace->getRemoteCallMsgId();
    }

    public function send()
    {
        $this->Trace->send();
    }
}