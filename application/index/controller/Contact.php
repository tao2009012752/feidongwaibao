<?php

namespace app\index\controller;

/**
 * Description of UserCenter
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Contact extends Common{
    public function index () {
        return $this->fetch();
    }
}
