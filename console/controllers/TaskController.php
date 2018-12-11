<?php

namespace console\controllers;

use console\models\Task;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * 定时任务调度控制器
 */
class TaskController extends Controller
{

    /**
     * 定时任务入口 每分钟运行一次
     * @return int Exit code
     */
    public function actionIndex()
    {

        $Task = Task::findAll(['switch' => Task::SWITCH_ENABLED]);
        $tasks = [];

        foreach ($Task as $task) {

            // 第一次运行,先计算下次运行时间
            if (!$task->next_run_at) {
                $task->next_run_at = $task->getNextRunDate();
                $task->save(false);
                continue;
            }

            // 判断运行时间到了没
            if ($task->next_run_at <= time()) {
                $tasks[] = $task;
            }
        }

        $this->executeTask($tasks);

        return ExitCode::OK;
    }

    /**
     * @param  array $tasks 任务列表
     * @author jlb
     */
    public function executeTask(array $tasks)
    {

        $pool = [];
        $startExectime = microtime(true);

        foreach ($tasks as $task) {

            $pool[] = proc_open("php yii $task->route", [], $pipe);
        }

        // 回收子进程
        while (count($pool)) {
            foreach ($pool as $i => $result) {
                $etat = proc_get_status($result);
                if ($etat['running'] == FALSE) {
                    proc_close($result);
                    unset($pool[$i]);
                    # 记录任务状态
                    $tasks[$i]->exec_time = round((microtime(true) - $startExectime) * 1000);
                    $tasks[$i]->last_run_at = strtotime(date('Y-m-d H:i'));
                    $tasks[$i]->next_run_at = $tasks[$i]->getNextRunDate();
                    $tasks[$i]->status = 0;
                    // 任务出错
                    if ($etat['exitcode'] !== ExitCode::OK) {
                        $tasks[$i]->status = 1;
                        $tasks[$i]->error_times = $tasks[$i]->error_times + 1;
                    }
                    $tasks[$i]->run_times = $tasks[$i]->run_times + 1;
                    $tasks[$i]->save(false);
                }
            }
        }
    }

}
