<?php

namespace common\widgets;

use yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

class ActiveField extends \yii\widgets\ActiveField
{
    public $options = [
        'class' => 'form-group'
    ];

    public $labelOptions = [
        'class' => 'col-sm-2 control-label',
    ];

    public $size = '5';

    public $template = "{label}\n<div class=\"col-sm-{size}\">{input}\n{hint}\n{error}</div>";

    public $errorOptions = [
        'class' => 'help-block m-b-none'
    ];

    public function init()
    {
        parent::init();

        if( !isset($this->options['class']) ){
            $this->options['class'] = 'form-group';
        }

        if(!isset($this->labelOptions['class'])){
            $this->labelOptions['class'] = 'col-sm-2 control-label';
        }

        if(!isset($this->errorOptions['class'])){
            $this->errorOptions['class'] = 'help-block m-b-none';
        }
    }

    /**
     * @inheritdoc
     */
    public function render($content = null)
    {
        if ($content === null) {
            if (! isset($this->parts['{input}'])) {
                $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
            }
            if (! isset($this->parts['{label}'])) {
                if( $this->model->isAttributeRequired($this->attribute) && ( !isset( $this->labelOptions['requiredSign'] ) || $this->labelOptions['requiredSign'] ) ){
                    $requiredSign = !isset( $this->labelOptions['requiredSign'] ) ? "<span style='color:red'>*</span> " : $this->labelOptions['requiredSign'];
                    $this->labelOptions['label'] = $requiredSign . ( isset( $this->labelOptions['label'] ) ? $this->labelOptions['label'] : $this->model->getAttributeLabel($this->attribute) );
                }
                $this->parts['{label}'] = Html::activeLabel($this->model, $this->attribute, $this->labelOptions);
            }
            if (! isset($this->parts['{error}'])) {
                $this->parts['{error}'] = Html::error($this->model, $this->attribute, $this->errorOptions);
            }
            if (! isset($this->parts['{hint}'])) {
                $this->parts['{hint}'] = '';
            }

            $this->parts['{size}'] = $this->size;
            $content = strtr($this->template, $this->parts);
        } elseif (! is_string($content)) {
            $content = call_user_func($content, $this);
        }

        return $this->begin() . "\n" . $content . "\n" . $this->end();
    }

    /**
     * @inheritdoc
     */
    public function checkbox($options = [], $enclosedByLabel = false)
    {
        static $i = 1;
        $unique = uniqid() . $i;
        $i++;
        if($i >= 10000) $i = 1;
        $for = 'inlineCheckbox' . $unique;
        $options['id'] = $for;
        $options['tag'] = 'a';
        $this->labelOptions = [];
        $this->options['class'] = '';
        $this->template = "<span class=\"checkbox checkbox-success checkbox-inline\">{input}
                              {label}
                            </span>";
        return parent::checkbox($options, $enclosedByLabel);
    }

    /**
     * @inheritdoc
     */
    public function dropDownList($items, $options = [], $generateDefault = true)
    {
        if ($generateDefault === true && ! isset($options['prompt'])) {
            $options['prompt'] = yii::t('app', 'Please select');
        }
        return parent::dropDownList($items, $options);
    }

    /**
     * 美化过的select选框
     *
     * @param array $items 需要设置的option元素,数组key作为值，数组value显示为option选项内容
     * @param bool $multiple 是否多选，默认单选
     * @param array $options htmp属性设置
     *  - 具体的参数配置请参考jquery chosen官方文档: https://harvesthq.github.io/chosen/options.html
     * @param bool $generateDefault 是否生成请选择选项，默认是
     * @return \yii\widgets\ActiveField
     */
    public function chosenSelect($items, $multiple = false, $options = [], $generateDefault = true)
    {
        if (isset($options['class'])) {
            $options['class'] .= " chosen-select";
        } else {
            $options['class'] = "chosen-select";
        }
        $multiple && $options['multiple'] = "1";
        !isset($options['allow_single_deselect']) && $options['allow_single_deselect'] = true;
        $options['allow_single_deselect'] === true && $options['allow_single_deselect'] = 'true';
        $options['allow_single_deselect'] === false && $options['allow_single_deselect'] = 'false';
        !isset($options['disable_search']) && $options['disable_search'] = false;
        $options['disable_search'] === true && $options['disable_search'] = 'true';
        $options['disable_search'] === false && $options['disable_search'] = 'false';
        !isset($options['disable_search_threshold']) && $options['disable_search_threshold'] = 0;
        !isset($options['enable_split_word_search']) && $options['enable_split_word_search'] = true;
        $options['enable_split_word_search'] === true && $options['enable_split_word_search'] = 'true';
        $options['enable_split_word_search'] === false && $options['enable_split_word_search'] = 'false';
        !isset($options['inherit_select_classes']) && $options['inherit_select_classes'] = false;
        $options['inherit_select_classes'] === true && $options['inherit_select_classes'] = 'true';
        $options['inherit_select_classes'] === false && $options['inherit_select_classes'] = 'false';
        !isset($options['max_selected_options']) && $options['max_selected_options'] = 'Infinity';
        !isset($options['no_results_text']) && $options['no_results_text'] = Yii::t('app', 'None');
        !isset($options['placeholder_text_multiple']) && $options['placeholder_text_multiple'] = Yii::t('app', 'Please select some');;
        !isset($options['placeholder_text_single']) && $options['placeholder_text_single'] = Yii::t('app', 'Please select');
        !isset($options['search_contains']) && $options['search_contains'] = true;
        $options['search_contains'] === true && $options['search_contains'] = 'true';
        $options['search_contains'] === false && $options['search_contains'] = 'false';
        !isset($options['group_search']) && $options['group_search'] = true;
        $options['group_search'] === true && $options['group_search'] = 'true';
        $options['group_search'] === false && $options['group_search'] = 'false';
        !isset($options['single_backstroke_delete']) && $options['single_backstroke_delete'] = true;
        $options['single_backstroke_delete'] === true && $options['single_backstroke_delete'] = 'true';
        $options['single_backstroke_delete'] === false && $options['single_backstroke_delete'] = 'false';
        !isset($options['width']) && $options['width'] = '100%';
        !isset($options['display_disabled_options']) && $options['display_disabled_options'] = true;
        $options['display_disabled_options'] === true && $options['display_disabled_options'] = 'true';
        $options['display_disabled_options'] === false && $options['display_disabled_options'] = 'false';
        !isset($options['display_selected_options']) && $options['display_selected_options'] = true;
        $options['display_selected_options'] === true && $options['display_selected_options'] = 'true';
        $options['display_selected_options'] === false && $options['display_selected_options'] = 'false';
        !isset($options['include_group_label_in_selected']) && $options['include_group_label_in_selected'] = false;
        $options['include_group_label_in_selected'] === true && $options['include_group_label_in_selected'] = 'true';
        $options['include_group_label_in_selected'] === false && $options['include_group_label_in_selected'] = 'false';
        !isset($options['max_shown_results']) && $options['max_shown_results'] = 'Infinity';
        !isset($options['case_sensitive_search']) && $options['case_sensitive_search'] = false;
        $options['case_sensitive_search'] === true && $options['case_sensitive_search'] = 'true';
        $options['case_sensitive_search'] === false && $options['case_sensitive_search'] = 'false';
        !isset($options['hide_results_on_select']) && $options['hide_results_on_select'] = true;
        $options['hide_results_on_select'] === true && $options['hide_results_on_select'] = 'true';
        $options['hide_results_on_select'] === false && $options['hide_results_on_select'] = 'false';
        !isset($options['rtl']) && $options['trl'] = false;
        $options['trl'] === true && $options['trl'] = 'true';
        $options['trl'] === false && $options['trl'] = 'false';
        return $this->dropDownList($items, $options, $generateDefault);
    }

    /**
     * @inheritdoc
     */
    public function readOnly($value = null, $options = [])
    {
        $options = array_merge($this->inputOptions, $options);

        $this->adjustLabelFor($options);
        $value = $value === null ? Html::getAttributeValue($this->model, $this->attribute) : $value;
        $options['class'] = 'da-style';
        $options['style'] = 'display: inline-block;';
        $this->parts['{input}'] = Html::activeHiddenInput($this->model, $this->attribute) . Html::tag('span', $value, $options);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function radioList($items, $options = [])
    {
        $options['tag'] = 'div';

        $inputId = Html::getInputId($this->model, $this->attribute);
        $this->selectors = ['input' => "#$inputId input"];

        $options['class'] = 'radio';
        $encode = ! isset($options['encode']) || $options['encode'];
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];

        $options['item'] = function ($index, $label, $name, $checked, $value) use ($encode, $itemOptions) {
            static $i = 1;
            $radio = Html::radio($name, $checked, array_merge($itemOptions, [
                'value' => $value,
                'id' => $name . $i,
                //'label' => $encode ? Html::encode($label) : $label,
            ]));
            $radio .= "<label for=\"$name$i\"> $label </label>";
            $radio = "<div class='radio radio-success radio-inline'>{$radio}</div>";
            //var_dump($radio);die;
            $i++;
            return $radio;
        };
        return parent::radioList($items, $options);
    }

    /**
     * @inheritdoc
     */
    public function checkboxList($items, $options = [])
    {

        $options['tag'] = 'ul';

        $inputId = Html::getInputId($this->model, $this->attribute);
        $this->selectors = ['input' => "#$inputId input"];

        $options['class'] = 'da-form-list inline';
        $encode = ! isset($options['encode']) || $options['encode'];
        $itemOptions = isset($options['itemOptions']) ? $options['itemOptions'] : [];

        $unique = uniqid();
        $options['item'] = function ($index, $label, $name, $checked, $value) use ($encode, $itemOptions, $unique){
            static $i = 1;
            $unique .= rand(1, 99999) . $i;
            $i++;
            if($i >= 10000) $i = 1;
            $checkbox = Html::checkbox($name, $checked, array_merge($itemOptions, [
                'value' => $value,
                'id' => 'inlineCheckbox' . $unique,
            ]));

            return "<li class='checkbox checkbox-success checkbox-inline'>
                        $checkbox
                        <label for='inlineCheckbox{$unique}'> {$label} </label>
                    </li>";
        };
        return parent::checkboxList($items, $options);
    }

    public function textInput($options = [])
    {
        if (isset($options['beforeAddon']) || isset($options['afterAddon'])) {
            $this->parts['{beforeAddon}'] = '';
            $this->parts['{afterAddon}'] = '';
            $this->template = strtr($this->template, ['{input}'=>'<div class="input-group">{beforeAddon}{input}{afterAddon}</div>']);
            if (isset($options['beforeAddon'])) {
                $this->parts['{beforeAddon}'] = html::tag('div', $options['beforeAddon'], ['class' => 'input-group-addon']);
                unset($options['beforeAddon']);
            }
            if (isset($options['afterAddon'])) {
                $this->parts['{afterAddon}'] = html::tag('div', $options['afterAddon'], ['class' => 'input-group-addon']);
                unset($options['afterAddon']);
            }
        }
        return parent::textInput($options);
    }

    /**
     * @inheritdoc
     */
    public function textarea($options = [])
    {
        if (! isset($options['rows'])) {
            $options['rows'] = 5;
        }
        return parent::textarea($options);
    }

    /**
     * @param array $options
     * @return yii\widgets\ActiveField
     */
    public function imgInput($options = [])
    {
        //if( $this->template === "{label}\n<div class=\"col-sm-{size}\">{input}\n{error}</div>\n{hint}" ) {
            $this->template = "{label}\n<div class=\"col-sm-{size} image\">{input}<div style='position: relative'>{img}{actions}</div>\n{error}</div>\n{hint}";
        //}
        $attribute = $this->attribute;
        $baseUrl = yii::$app->request->baseUrl;
        $src = key_exists('value', $options) ? $options['value'] : $baseUrl . $this->model->$attribute;
        /** @var $cdn \feehi\cdn\TargetAbstract */
        // $cdn = yii::$app->cdn;
        // $baseUrl = $cdn->host;

        $nonePicUrl = isset($options['default']) ? $options['default'] : $baseUrl . '/static/images/none.jpg';
        if ($src != '') {
            //if( strpos($src, $baseUrl) !== 0 ){
            //   $temp = parse_url($src);
            //  $src = (! isset($temp['host'])) ? $cdn->getCdnUrl($src) : $src;
            // }
            $delete = yii::t('app', 'Delete');
            $this->parts['{actions}'] = "<div onclick=\"$(this).parents('.image').find('input[type=hidden]').val(0);$(this).prev().attr('src', '$nonePicUrl');$(this).remove()\" style='position: absolute;width: 50px;padding: 5px 3px 3px 5px;top:5px;left:6px;background: black;opacity: 0.6;color: white;cursor: pointer'><i class='fa fa-trash' aria-hidden='true'> {$delete}</i></div>";
        }else{
            $src = $nonePicUrl;
            $this->parts['{actions}'] = '';
        }
        $this->parts['{img}'] = Html::img($src, array_merge($options, ["nonePicUrl"=>$nonePicUrl]));
        return parent::fileInput($options);
    }

    /**
     * ueditor编辑器
     *
     * @param array $options
     * @return $this
     */
    public function ueditor($options = [])
    {
        if (! isset($options['rows'])) {
            $options['rows'] = 5;
        }
        $options = array_merge($this->inputOptions, $options);
        $this->adjustLabelFor($options);
        $name = isset($options['name']) ? $options['name'] : Html::getInputName($this->model, $this->attribute);
        if (isset($options['value'])) {
            $value = $options['value'];
            unset($options['value']);
        } else {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        }
        if (! array_key_exists('id', $options)) {
            $options['id'] = Html::getInputId($this->model, $this->attribute);
        }
        //self::normalizeMaxLength($model, $attribute, $options);
        $this->parts['{input}'] = Ueditor::widget(['content' => $value, 'name' => $name, 'id' => $this->attribute]);

        return $this;
    }

    /**
     * 时间范围选择
     *
     * @param array $options
     * @param array $inputOptions
     * @return yii\widgets\ActiveField
     */
    public function dateRange($options = [],$inputOptions=[]){

        if (empty($options['singleDatePicker'])){
            $ranges = [
                '今日' =>[date('Y-m-d',strtotime('now')), date('Y-m-d',strtotime('now'))],
                '昨日' => [date('Y-m-d',strtotime('yesterday')), date('Y-m-d',strtotime('yesterday'))],
                '本周' => [date('Y-m-d',strtotime('last day this week')), date('Y-m-d',strtotime('last day this week +6 day'))],
                '上周' => [date('Y-m-d',strtotime('last day last week')), date('Y-m-d',strtotime('last day last week +6 day'))],
                '最近7天' => [date('Y-m-d',strtotime('-6 day')), date('Y-m-d',strtotime('now'))],
                '本月' => [date('Y-m-d',strtotime('first day of this month')), date('Y-m-d',strtotime('last day of this month'))],
                '上月' => [date('Y-m-d',strtotime('first day of last month')), date('Y-m-d',strtotime('last day of last month'))],
                '最近30天' => [date('Y-m-d',strtotime('-29 day')), date('Y-m-d',strtotime('now'))],
                '最近半年' => [date('Y-m-d',strtotime('-182 day')), date('Y-m-d',strtotime('now'))],
                '今年' => [date('Y-01-01',strtotime('now')), date('Y-12-31',strtotime('now'))],
                '去年' => [date('Y-01-01',strtotime('-1 year')), date('Y-12-31',strtotime('-1 year'))],
                '最近1年' => [date('Y-m-d',strtotime('-365 day')), date('Y-m-d',strtotime('now'))]
            ];

            if (empty($options['ranges'])){
                $options['ranges'] = ['今日','昨日','本周','上周','本月','上月'];
            }
            $options['ranges'] = array_intersect_key($ranges,array_flip($options['ranges']));
        }else{
            $options['autoUpdateInput'] = true;
        }
        if (!isset($options['autoUpdateInput'])) $options['autoUpdateInput'] = false;

        if (isset($options['value'])) {
            $value = $options['value'];
            unset($options['value']);
        } else {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        }

        if (!isset($options['opens'])) $options['opens'] = 'left';
        $id = Html::getInputId($this->model, $this->attribute);
        $config = json::htmlEncode($options);
        $js =  '$(function(){';
        $js .= '$("#'.Html::getInputId($this->model, $this->attribute) . '").daterangepicker('.json::htmlEncode($options) . ');';
        if (false === $options['autoUpdateInput']){
            $js .=<<<STR
                $('#{$id}').on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ~ ' + picker.endDate.format('YYYY-MM-DD'));
                });
            
                $('#{$id}').on('cancel.daterangepicker', function(ev, picker) {
                   $(this).val('');
                });         
STR;
        }
        $js .='});';

        $inputOptions = array_merge(['style'=>'width:190px;','autocomplete'=>'off'],$inputOptions);
        if (is_numeric($value) && !empty($options['singleDatePicker'])) $inputOptions['value'] = date('Y-m-d',$value);
        yii::$app->getView()->registerJs($js, View::POS_END);

        return self::textInput($inputOptions);
    }

}