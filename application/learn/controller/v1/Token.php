<?php
/**
 * Created by PhpStorm.
 * User: 63254
 * Date: 2018/3/23
 * Time: 19:29
 */

namespace app\learn\controller\v1;
use app\learn\exception\BaseException;
use app\learn\service\Token as TokenService;
use app\learn\service\UserToken;

class Token extends BaseException
{
    public function getToken($code='') {
        $ut = new UserToken($code);
        $token = $ut->get();
        $msg = [
            'token' => $token
        ];
        return json_encode([
            'msg' => $msg,
            'code' => 200,
        ]);
    }

    public function verifyToken($token=''){
        if (!$token){
            throw new BaseException([
                'token不允许为空'
            ]);
        }
        $Token = new TokenService();
        $valid = $Token->verifyToken($token);
        return [
            'isValid' => $valid
        ];
    }
}