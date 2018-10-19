<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name 定时任务名称
 * @property string $route 任务路由
 * @property string $crontab_str crontab格式
 * @property int $switch 任务开关 0关闭 1开启
 * @property int $status 任务运行状态 0正常 1任务报错
 * @property int $run_times 运行次数
 * @property int $error_times 任务失败次数
 * @property int $last_run_at 任务上次运行时间
 * @property int $next_run_at 任务下次运行时间
 * @property int $exec_mem 任务执行消耗内存(单位/byte)
 * @property int $exec_time 任务执行消耗时间
 */
class Task extends \yii\db\ActiveRecord
{

    const TASK_STATUS_NORMAL = 0;
    const TASK_STATUS_ERROR = 1;
    const TASK_SWITCH_OPEN = 1;
    const TASK_SWITCH_CLOSE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%task}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'route', 'crontab_str'], 'required'],
            [['switch', 'status', 'run_times', 'error_times', 'last_run_at', 'next_run_at', 'exec_mem', 'exec_time'], 'integer'],
            [['name', 'route', 'crontab_str'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '定时任务名称',
            'route' => '任务路由',
            'crontab_str' => 'crontab格式',
            'switch' => '任务开关 0关闭 1开启',
            'status' => '任务运行状态 0正常 1任务报错',
            'run_times' => '运行次数',
            'error_times' => '任务失败次数',
            'last_run_at' => '任务上次运行时间',
            'next_run_at' => '任务下次运行时间',
            'exec_mem' => '任务执行消耗内存(单位/byte)',
            'exec_time' => '任务执行消耗时间',
        ];
    }
}
