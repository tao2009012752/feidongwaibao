<?php

namespace app\index\validate;

/**
 * Description of LoginValidate
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class LoginValidate extends BaseValidate{
    protected $rule = [
        'username' => 'length:4,25|alphaDash',
        'password' => 'length:6,16|alphaDash',
        'mobile' => 'number|length:11',
    ];
}
