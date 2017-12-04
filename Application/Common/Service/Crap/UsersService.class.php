<?php
namespace Common\Service\Crap;

use Application\BaseService;
use Common\Model\Crap\UsersModel;
use Common\Service\Crap\UsersPriceConfigService;
use Common\Service\Crap\UsersBalanceLogService;

/**
 * uu_users
 *
 * @author liuxuchao
 */
class UsersService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * 设置当前service默认model
     * @author 刘旭超
     * @date 2016-07-13 19:01
     * @param obj $model Mysql Model对象
     * @return null
     */
    public function setModel($model=null)
    {
        if ( !empty($model) && is_object($model) ) {
            $this->model = $model;
        } else {
            $this->model = new UsersModel();
        }
        
        return;
    }
    
    /**
     * 根据电话号码查找用户
     * @param type $mobile
     * @return boolean
     */
    public function getByMobile($mobile)
    {
        $mobile = intval($mobile);
        if ( empty($mobile) ) {
            return false;
        }
        
        $data = $this->model->getByMobile($mobile);
        return $data;
    }
    
    
    /**
     * 根据手机号码数组获取用户信息
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-08-05 11:56
     * @param array $mobileList 手机号码列表
     * @return boolean | array
     */
    public function getListByMobileList($mobileList)
    {
        if (empty($mobileList) || !is_array($mobileList)) {
            return false;
        }
        
        $data = $this->model->getListByMobileList($mobileList);
        return $data;
    }
    
    /**
     * 主键数组获取用户信息
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-08-05 11:56
     * @param array $mobileList 手机号码列表
     * @return boolean | array
     */
    public function getListByPkList( $pkList )
    {
        if (empty($pkList) || !is_array($pkList)) {
            return false;
        }
        
        $data = $this->model->getListByPkList($pkList);
        return $data;
    }
    
    /**
     * 根据主键ID获取数据
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-07-18 13:23
     * @param int $primaryKey 主键的值
     * @return boolean | array
     */
    public function getByPrimaryKey($primaryKey)
    {
        $primaryKey = intval($primaryKey);
        if ( 0 >= $primaryKey ) {
            return false;
        }
        
        $data = $this->model->getByPrimaryKey($primaryKey);
        return $data;
    }
    
    /**
     * 验证密码是否合法
     * 长度：6-16
     * 复杂度：不能是单纯的数字
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-07-19 17:26
     * @param string $password 密码
     * @return boolean
     */
    public static function verifyPassword( $password )
    {
        if ( empty($password) ) {
            return false;
        }
        
        //全部是数字返回错误，不能都是数字。
        if ( is_int($password) ) {
            return false;
        }
        
        //检验长度是否合法
        $length = mb_strlen($password,'utf8');
        if (C('PASSWORD_MAX_LENGTH') < $length || $length < C('PASSWORD_MIN_LENGTH')) {
            return false;
        }
        
        return true;
    }

    /**
     * @author liuxuchao
     * @param  $userId 用户ID
     * return array | false
     */
    public function  myInfo($userId)
    {
        $userId=intval($userId);

        if($userId==0){
            return false;
        }

        $data=$this->model->getByUserId($userId);
        return $data;
    }

    /**修改手机号码
     * @author liuxuchao
     * @param  $userId 用户ID
     * return array | false
     */
    public function changeMobileNo($userId,$mobile)
    {
        $userId=intval($userId);
        $mobile=intval($mobile);

        if($userId==0 || $mobile==0){
            return false;
        }
        $data=$this->model->changeMobileNo($userId,$mobile);
        return $data;
    }

    /**根据UserId 渠道id 获取 用户信息
     * @author liuxuchao
     * @param  $userId 用户ID
     * @param  $channelId 渠道ID
     * return array | false
     */
    public function getUserInfo($userId)
    {
        $userId = intval($userId);
        if( $userId==0 ){
            return false;
        }
        
        $result = $this->model->getByUserId($userId);
        return $result;
    }

    /**根据UserId 修改用户信息
     * @author liuxuchao
     * @param  $userId 用户ID
     * @param  $Arr  要修改的参数
     * return array | false
     */
    public function updateUserInfo($userId,$data)
    {
        $userId = intval($userId);
        if( $userId==0 ){
            return false;
        }
        if (!is_array($data)  || empty($data)) {
            return false;
        }
        $result = $this->model->updateUserInfo($userId,$data);
        return $result;
    }

    /**根据UserId 修改用户余额
     * @author liuxuchao
     * @param  $userId 用户ID
     * @param  $balance  输入的金额
     * return array | false
     */
    public function updateUserBalance($userId,$balance)
    {
        $userId = intval($userId);
        if( $userId==0 ){
            return false;
        }
        $data['balance'] = $balance;
        $result = $this->model->updateUserInfo($userId,$data);
        return $result;
    }
    
    
    /**
     * 修改用户蛙币
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-08-17 19:11
     * @param int $userId 用户ID
     * @param int $actionType 操作类型
     * @param mixt $remark 备注信息
     * @return array
     * [
     *      'status'=>false, //状态，true | false
     *      'error_code'=>1, //错误码，0：没有错误，1：参数错误，2：
     *      'message'=>'参数错误', //提示信息
     *      'balance'=>0, //扣除/增加蛙币后用户的蛙币余额
     *      'sum'=>0 //本次扣除/增加的蛙币数量
     * ]
     */
    public function updateBalance( $userId, $actionType, $remark=null )
    { 
        $userId     = intval($userId);
        $actionType = intval($actionType);
        $allAction = array_merge(UsersPriceConfigService::$addAction, UsersPriceConfigService::$deductAction);
        $verifyActionType = in_array($actionType, $allAction);
        if ( 0 >= $userId || 0 >= $actionType || !$verifyActionType ) {
            return ['status'=>false, 'error_code'=>1, 'message'=>'参数错误', 'balance'=>0, 'sum'=>0];
        }
        
        //获取用户操作类型的蛙币金额
        $priceConfig = (new UsersPriceConfigService())->getByActionType($actionType);
        $sum = intval($priceConfig['money']);

        //查询用户信息
        $userInfo = $this->getUserInfo($userId);
        //修改用户的蛙币余额
        if ( in_array($actionType, UsersPriceConfigService::$addAction) ) {
            //添加蛙币
            $userInfo['balance'] = $userInfo['balance'] + $sum;
            $result = $this->model->addMoneyByPrimaryKey($userId, $sum);
            if ( false === $result ) {
                return ['status'=>false, 'error_code'=>2, 'message'=>'添加蛙币失败', 'balance'=>0, 'sum'=>$sum];
            }            
        } else if (in_array($actionType, UsersPriceConfigService::$deductAction)) {
            //判断余额是否够
            $userInfo['balance'] = $userInfo['balance'] - $sum;
            if ( 0 > $userInfo['balance'] ) {
                return ['status'=>false, 'error_code'=>4, 'message'=>'余额不足', 'balance'=>0, 'sum'=>$sum];
            }
            //扣除蛙币
            $result = $this->model->deductMoneyByPrimaryKey($userId, $sum);
            if ( false === $result ) {
                return ['status'=>false, 'error_code'=>2, 'message'=>'扣除蛙币失败', 'balance'=>0, 'sum'=>$sum];
            } 
        } else {
            return ['status'=>false, 'error_code'=>3, 'message'=>'操作类型错误', 'balance'=>0, 'sum'=>$sum];
        }

        $this->addBalanceLog($userId, $actionType, $userInfo['balance'], $sum, $remark);

        return ['status'=>true, 'error_code'=>0, 'message'=>'', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
    }

    /**
     * 支付同步通知修改订单状态
     * 事务的方式更新订单和用户余额
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-09-08 17:42
     * @param int $userId 用户ID
     * @param int $orderId 订单ID
     * @param array $orderInfo 订单数据数组
     * @param int $sum 蛙币数量
     * @param int $notifyType 通知类型，0：同步通知，1：异步通知
     * @return array
     */
    public function updateOrder_UserBalance_Transaction($userId, $orderId, $orderInfo, $sum, $notifyType=0)
    {
        //更新订单/更新用户蛙币余额
        $update = $this->model->updateOrder_UserBalance_Transaction($userId, $orderId, $orderInfo, $sum, $notifyType);
        if ( 0 === $update ) {
            return ['status'=>false, 'error_code'=>2, 'message'=>'订单状态已经更新过', 'balance'=>0, 'sum'=>$sum];
        }
        if ( false === $update ) {
            return ['status'=>false, 'error_code'=>1, 'message'=>'更新订单、更新用户蛙币余额失败', 'balance'=>0, 'sum'=>$sum];
        }
        
        //添加蛙币收支记录
        if ( 1 == $orderInfo['pay_status'] ) {
            $userInfo = $this->getUserInfo($userId);
            $remark = ['notify_type'=>$notifyType, 'order_id'=>$orderId, 'order_info'=>$orderInfo];
            $this->addBalanceLog($userId, UsersPriceConfigService::BUY_COIN, $userInfo['balance'], $sum, $remark);
            $result = ['status'=>true, 'error_code'=>0, 'message'=>'', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
        } else {
            $result = ['status'=>true, 'error_code'=>0, 'message'=>'', 'balance'=>0, 'sum'=>0];
        }
        
        return $result;
    }
  
    /**
     * 修改账号余额-》用于再来一波调用
     * @author 刘徐超  <liuxuchao@liuxuchaozhao.com>
     * @data          2016-10-19T21:13:44+0800
     * @param  [type] $userId                  [用户ID]
     * @param  [type] $actionType              [操作描述]
     * @param  [type] $sum                     [操作金额]
     * @param  [type] $doType                  1: 加余额  2：扣余额
     * @return [type]                          [description]
     */
    public function changeBalance($userId, $actionType, $sum, $doType, $remark=null )
    {
        if (0>=$userId || 0>=$sum || 0 >=$doType || empty($actionType)) {
           return false;
        }

        $userInfo = $this->getUserInfo($userId);
        if (empty($userInfo)) {
            return false;
        }
        //添加蛙币
        if ($doType==1) {
            $userInfo['balance'] = $userInfo['balance'] + $sum;
            $result = $this->model->addMoneyByPrimaryKey($userId, $sum);
        }elseif($doType==2){
            $userInfo['balance'] = $userInfo['balance'] - $sum;
            if ( 0 >$userInfo['balance'] ) {
                $userInfo['balance'] = $userInfo['balance'] + $sum;
                return ['status'=>false, 'error_code'=>4, 'message'=>'余额不足，请充值', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
            }
            $result = $this->model->deductMoneyByPrimaryKey($userId, $sum);
        }
        $logResult = $this->addBalanceLog($userId, $actionType, $userInfo['balance'], $sum, $remark);
        if ( false === $result ) {
            return ['status'=>false, 'error_code'=>2, 'message'=>'操作失败', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
        }else{
            return ['status'=>true, 'error_code'=>0, 'message'=>'操作成功', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
        }
    }  
    
    /**
     * 添加日志
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-08-18 11:51
     * @param int $userId 用户ID
     * @param int $actionType
     * @param int $balance
     * @param int $sum
     * @param mixt $remark 备注信息
     * @return bool | int
     */
    private function addBalanceLog( $userId, $actionType, $balance, $sum, $remark=null )
    {

        $actionName = (new UsersPriceConfigService())->getActionNameByActionType($actionType);//UsersPriceConfigService::$balanceRemark[$actionType];
        if (empty($remark)) {
            $remark = $actionName;
        }
        if ( is_array($remark) ) {
            $remarkContent = json_encode($remark);
        } else {
            $remarkContent = $remark;
        }
        $addResult = (new UsersBalanceLogService())->addBalanceLog(intval($userId), $actionType, $actionName, $sum,  intval($balance), $remarkContent);
        return $addResult;
    }


    /**
     * 扣除蛙币
     * @param int $primaryKey 用户ID
     * @param int $sum 扣除的金额
     * @return int | bool
     */
    public function deductMoneyByPrimaryKey($primaryKey, $sum)
    {
        $primaryKey = intval($primaryKey);
        $sum = intval($sum);
        if ( 0 >= $primaryKey || 0 >= $sum ) {
            return false;
        }
        
        $result = $this->model->deductMoneyByPrimaryKey($primaryKey, $sum);
        return $result;
    }

    /**
     * 获取列表
     * @author  liuxuchao
     * @param type $page
     * @param type $pagesize
     * @param type $where
     * @return array | bool
     */
    public function getList ($page=1, $pageSize=10,$where, $orderBy)
    {
        $page = intval($page);
        $pageSize = intval($pageSize);
        if ( 0 >= $page || 0 >= $pageSize) {
            return false;
        }
        $data = $this->model->getList( $page, $pageSize, $orderBy, $where);
        return $data;
    }

     /**
     * 获取总数
     * @param type $where   查询条件
     * @return int | bool
     */
    public function getCount ($where)
    {
        $data = $this->model->getCount( $where);
        $data = $data? $data: 0;
        return $data;
    }


    /**
     * 根据用户ID删除操作
     * @param type $userId
     * @return array | bool
     */
    public function doDelete($userId)
    {
        $userId = intval($userId);
        if ( 0>= $userId) {
            return false;
        }
        $data = $this->model->doDelete($userId);
        return $data;
    }

    /**
     * 获取用户数据
     * $author wuyunfeng
     * @param  int   $page     分页参数
     * @param  int   $pageSize 分页参数
     * @param  str   $orderBy  排序规则
     * @param  array $where    查询条件
     * @return array $list     查询结果
     */
    public function getUserDataList($page, $pageSize, $orderBy, $where)
    {
        $list = $this->model->getUserDataList($page, $pageSize, $orderBy, $where);
        return $list;
    }

    /**
     * 获取用户数据总量
     * @author  wuyunfeng wuyunfeng@liuxuchaota.com
     * @param  [type] $where [description]
     * @return [type]        [description]
     */
    public function getUserDataCount($where){
        $count = $this->model->getUserDataCount($where);
        return $count;
    }
    /**
     * *
     * 根据条件查询数据
     * @AuthorHTL 刘旭超<zhengziqiang@liuxuchaota.com>
     * @DateTime  2016-11-24T19:39:35+0800
     * @param     array    $where [查询条件]
     * @return    
     */
    public function getData($where)
    {
        return $this->model->where($where)->select();
    }
    
    /**
     * 修改用户蛙币
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-08-17 19:11
     * @param int $userId 用户ID
     * @param int $actionType 操作类型
     * @param mixt $remark 备注信息
     * @return array
     * [
     *      'status'=>false, //状态，true | false
     *      'error_code'=>1, //错误码，0：没有错误，1：参数错误，2：
     *      'message'=>'参数错误', //提示信息
     *      'balance'=>0, //扣除/增加蛙币后用户的蛙币余额
     *      'sum'=>0 //本次扣除/增加的蛙币数量
     * ]
     */
    public function updateBalanceByShareEmail( $userId, $actionType, $count, $remark=null )
    {
        $userId     = intval($userId);
        $actionType = intval($actionType);
        $allAction = array_merge(UsersPriceConfigService::$addAction, UsersPriceConfigService::$deductAction);
        $verifyActionType = in_array($actionType, $allAction);
        if ( 0 >= $userId || 0 >= $actionType || !$verifyActionType ) {
            return ['status'=>false, 'error_code'=>1, 'message'=>'参数错误', 'balance'=>0, 'sum'=>0];
        }
        
        //获取用户操作类型的蛙币金额
        $priceConfig = (new UsersPriceConfigService())->getByActionType($actionType);
        $sum = intval($priceConfig['money']) * $count;
        
        //查询用户信息
        $userInfo = $this->getUserInfo($userId);
        //修改用户的蛙币余额
        if ( in_array($actionType, UsersPriceConfigService::$addAction) ) {
            //添加蛙币
            $userInfo['balance'] = $userInfo['balance'] + $sum;
            $result = $this->model->addMoneyByPrimaryKey($userId, $sum);
            if ( false === $result ) {
                return ['status'=>false, 'error_code'=>2, 'message'=>'添加蛙币失败', 'balance'=>0, 'sum'=>$sum];
            }
        } else {
            return ['status'=>false, 'error_code'=>3, 'message'=>'操作类型错误', 'balance'=>0, 'sum'=>$sum];
        }
        
        $this->addBalanceLog($userId, $actionType, $userInfo['balance'], $sum, $remark);
        
        return ['status'=>true, 'error_code'=>0, 'message'=>'', 'balance'=>$userInfo['balance'], 'sum'=>$sum];
    }
    
    /**
     * 获取用户列表 ， 根据用户ID,
     * 
     * @param array $userIds
     * @return array
     */
    public function getUserList($userIds)
    {
        if(!$userIds){
            return [];
        }
        $userList = [];
        $userIdStr = implode(',', $userIds);
        $userWhere['id'] = ['in', $userIdStr];
        $userRows = $this->model->getData($userWhere);
        foreach ($userRows as $key => $user) {
            $userList[$user['id']] = $user;
        }
        return $userList;
    }
}
