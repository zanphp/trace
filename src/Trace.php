<?php

namespace ZanPHP\Trace;

use ZanPHP\Contracts\Config\Repository;
use ZanPHP\Contracts\Trace\Trace as TraceContract;
use ZanPHP\Contracts\Trace\Tracer;
use ZanPHP\Exception\ZanException;
use ZanPHP\Support\Arr;

class Trace implements TraceContract
{
    private $run;

    /**
     * @var Tracer
     */
    private $traceImp;

    public function __construct($config, $rootId = null, $parentId = null)
    {
        $this->run = false;

        if (!$config || !isset($config['run']) || $config['run'] == false) {
            return;
        }

        $repository = make(Repository::class);
        $zanTraceConfig = $repository->get('monitor.zan_trace', []);
        if (!empty($zanTraceConfig)) {
            $config = Arr::merge($zanTraceConfig, $config);
        }

        if (isset($config['trace_class'])) {
            $traceClass = $config['trace_class'];
            if (is_subclass_of($traceClass, Tracer::class)) {
                $this->run = true;
                $this->traceImp = new $traceClass($rootId, $parentId);
                return;
            } else {
                throw new ZanException("$traceClass should be an Implementation of ITracer");
            }
        }
    }

    public function initHeader($msgId = null)
    {
        if (!$this->run) {
            return false;
        }

        $this->traceImp->initHeader($msgId);
    }

    public function transactionBegin($type, $name)
    {
        if (!$this->run) {
            return false;
        }

        return $this->traceImp->transactionBegin($type, $name);
    }

    public function getRootId()
    {
        if (!$this->run) {
            return false;
        }

        return $this->traceImp->getRootId();
    }

    public function getParentId()
    {
        if (!$this->run) {
            return false;
        }

        return $this->traceImp->getParentId();
    }

    public function commit($handle, $status, $sendData = '')
    {
        if (!$this->run) {
            return false;
        }

        $this->traceImp->transactionEnd($handle, $status, $sendData);
    }

    public function logEvent($type, $status, $name = "", $context = "")
    {
        if (!$this->run) {
            return false;
        }

        $this->traceImp->logEvent($type, $status, $name, $context);
    }

    public function setRemoteCallMsgId($remoteCallMsgId)
    {
        if (!$this->run) {
            return false;
        }

        $this->traceImp->setRemoteCallMsgId($remoteCallMsgId);
    }

    public function getRemoteCallMsgId()
    {
        if (!$this->run) {
            return false;
        }

        return $this->traceImp->getRemoteCallMsgId();
    }

    public function send()
    {
        if (!$this->run) {
            yield false;
            return;
        }

        yield $this->traceImp->uploadTraceData();
    }

    public static function generateId()
    {
        return TraceBuilder::generateId();
    }
}