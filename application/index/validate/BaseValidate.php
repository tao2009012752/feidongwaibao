<?php

namespace app\index\validate;
use think\Validate;
use think\Request;

/**
 * Description of BaseValidate
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class BaseValidate extends Validate{
    
    public function goCheck () {
        
        $params = Request::instance() -> param();
        
        if (!$this->check($params)) {
            return $this->error;
        }
        return true;
    }
    
    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        }
        return $field . '必须是正整数';
    }
}
