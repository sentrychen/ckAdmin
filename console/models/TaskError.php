<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "task_error".
 *
 * @property string $id 任务失败记录ID
 * @property int $task_id
 * @property int $task_start_at 任务开始时间
 * @property int $task_end_at 任务结束时间
 * @property int $exec_time 任务所用时间(ms)
 * @property int $exec_mem 任务所消耗内存(byte)
 * @property int $available_mem 可用内存
 * @property string $params 任务参数
 * @property string $error_msg 错误信息
 * @property int $retry_times 重试次数
 * @property int $retry_result 重试结果
 */
class TaskError extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_error';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'task_start_at', 'task_end_at', 'exec_time', 'exec_mem', 'available_mem', 'retry_times', 'retry_result'], 'integer'],
            [['params', 'error_msg'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '任务失败记录ID',
            'task_id' => 'Task ID',
            'task_start_at' => '任务开始时间',
            'task_end_at' => '任务结束时间',
            'exec_time' => '任务所用时间(ms)',
            'exec_mem' => '任务所消耗内存(byte)',
            'available_mem' => '可用内存',
            'params' => '任务参数',
            'error_msg' => '错误信息',
            'retry_times' => '重试次数',
            'retry_result' => '重试结果',
        ];
    }
}
