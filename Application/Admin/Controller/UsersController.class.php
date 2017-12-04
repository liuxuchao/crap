<?php
namespace Admin\Controller;

vendor( 'Curl.vendor.autoload' );

use \Curl\Curl;
use Application\AdminBaseController;
use Common\Service\Crap\UsersService;

class UsersController extends AdminBaseController {
    private $usersService = null;
    
    public function __construct () {
        parent::__construct();
        $this->usersService = new UsersService();
    }
    
    public function index () {
        $param = parent::_handleTime( I() );
        $tPage = I( 'page' , 1 , 'intval' );
        $tPageSize = I( 'page_size' , 30 , 'intval' );
        
        if ( $param[ 'mobile' ] ) {
            if ( $param[ 'search_type' ] ) {
                //如果是搜索推荐人
                $where[ 'u2.mobile' ] = (int) $param[ 'mobile' ];
            } else {
                $where[ 'u.mobile' ] = (int) $param[ 'mobile' ];
            }
        } elseif ( $param[ 'userid' ] ) {
            $where[ 'u.id' ] = (int) $param[ 'userid' ];
        } else {
            $where[ 'u.create_time' ] = array ( 'between' , array ( $param[ 'srtime' ] , $param[ 'ertime' ] ) );
        }
        
        $tCount = $this->usersService->getCount( $where );
        $show = $this->page( $tCount , $tPage , $tPageSize );// 分页显示输出
        $tData = $this->usersService->getList( $tPage , $tPageSize , $where , 'u.id DESC' );
        
        $userList = array ();

        
        $this->assign( 'param' , $param );
        $this->assign( 'count' , $tCount );
        $this->assign( 'userList' , $userList );
        $this->assign( 'currentPage' , $tPage );
        $this->assign( 'page' , $show );
        $this->display();
    }
    
    /*
     *显示更新页面
     */
    public function updates () {
        $userId = I( 'userId' , '' , 'intval,htmlspecialchars' );
        $data = $this->usersService->getUserInfo( $userId );
        $this->assign( 'data' , $data );
        $this->display();
    }
    
    /*
     *处理更新数据
     */
    public function doUpdate () {
        $userId = I( 'post.userId' , '' , 'intval,htmlspecialchars' );
        $realName = I( 'post.user_name' , '' , 'trim,htmlspecialchars' );
        $mobile = I( 'post.mobile' , '' , 'trim,htmlspecialchars' );
        $companyName = I( 'post.corporation_name' , '' , 'trim,htmlspecialchars' );
        $job = I( 'post.user_job_title' , '' , 'trim,htmlspecialchars' );
        $gender = I( 'post.gender' , '' , 'intval,htmlspecialchars' );
        if ( 0 >= $userId ) {
            $this->error( 'ID错误' , '/Admin/Users/index' , 2 );
            
            return;
        }
        if ( ! empty( $realName ) ) {
            $data[ 'real_name' ] = $realName;
        }
        if ( ! empty( $mobile ) ) {
            $data[ 'mobile' ] = $mobile;
        }
        if ( ! empty( $companyName ) ) {
            $data[ 'company_name' ] = $companyName;
        }
        if ( ! empty( $job ) ) {
            $data[ 'job' ] = $job;
        }
        
        $data[ 'gender' ] = $gender;
        $result = $this->usersService->updateUserInfo( $userId , $data );
        if ( $result ) {
            $this->success( '修改成功' , '/Admin/Users/index' , 2 );
            
            return;
        }
        $this->error( '修改失败' , '/Admin/Users/index' , 2 );
        
        return;
    }
    
    /*
     *显示重置密码页面
     */
    public function resetPwd () {
        $userId = I( 'userId' , '' , 'intval,htmlspecialchars' );
        $this->assign( 'userId' , $userId );
        $this->display( "resetpwd" );
    }
    
    /*
     *显示重置密码页面
     */
    public function doResetPwd () {
        print_r( $_POST );
    }
    
    /*
     *删除操作
     */
    public function doDelete () {
        $userId = I( 'userId' , '' , 'intval,htmlspecialchars' );
        
        if ( 0 >= $userId ) {
            echo 'ID错误';
            
            return;
        }
        $data = $this->usersService->doDelete( $userId );
        if ( $data ) {
            echo 1;
            
            return;
        }
        echo 0;
        
        return;
    }

}