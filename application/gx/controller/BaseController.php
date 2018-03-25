<?php
/**
 * Created by PhpStorm.
 * User: 63254
 * Date: 2018/3/23
 * Time: 14:36
 */

namespace app\gx\controller;
use app\gx\exception\BaseException;
use think\Controller;

class BaseController extends Controller
{
    protected function have_key_validate($data = [],$arr){
        foreach ($data as $k => $v){
            if (!array_key_exists($k,$arr)){
                throw new BaseException([
                    'msg' => $v
                ]);
            }
        }
    }
}