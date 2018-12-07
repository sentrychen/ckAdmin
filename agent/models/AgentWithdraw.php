<?php

namespace agent\models;

class AgentWithdraw extends \common\models\AgentWithdraw
{
    public static function getAgentBank($agentId = null,$key = null)
    {
        $Agentbank = AgentBank::find()->where(['agent_id'=>$agentId,'status'=>1])->all();
        $data = [];
        foreach ($Agentbank as $item) {
            $data[$item->id] = $item->bank_account;
        }
        return $data;
    }
}
