<?php
declare(strict_types=1);

namespace unzxin\zswCore\Contract\Events;

use Swoole\Http\Server as HttpServer;
use Swoole\Server;
use Swoole\WebSocket\Server as WsServer;

interface SwooleWorkerInterface extends SwooleEventInterface
{
    /**
     * 工作进程启动（Worker/Task）
     * @param Server|HttpServer|WsServer $server
     * @param int                        $workerId
     */
    public function onWorkerStart($server, int $workerId): void;

    /**
     * 工作进程终止（Worker/Task）
     * @param Server|HttpServer|WsServer $server
     * @param int                        $workerId
     */
    public function onWorkerStop($server, int $workerId): void;

    /**
     * 工作进程退出（Worker）
     * @param Server|HttpServer|WsServer $server
     * @param int                        $workerId
     */
    public function onWorkerExit($server, int $workerId): void;

    /**
     * 工作进程异常（Worker/Task）
     * @param Server|HttpServer|WsServer $server
     * @param int                        $workerId
     * @param int                        $workerPid
     * @param int                        $exitCode
     * @param int                        $signal
     */
    public function onWorkerError($server, int $workerId, int $workerPid, int $exitCode, int $signal): void;
}
