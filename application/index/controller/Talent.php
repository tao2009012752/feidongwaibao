<?php

namespace app\index\controller;

/**
 * 人才库
 *
 * @author mersycle<mersycle@hotmail.com>
 */
class Talent extends Common{
    public function index () {
        return $this->fetch();
    }
}
