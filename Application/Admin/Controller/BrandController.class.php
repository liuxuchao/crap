<?php
namespace Admin\Controller;

vendor( 'Curl.vendor.autoload' );

use \Curl\Curl;
use Application\AdminBaseController;
use Common\Service\Crap\BrandService;
use Common\Service\Crap\CategoryService;

class BrandController extends AdminBaseController {
    private $brandService = null;
    
    public function __construct () {
        parent::__construct();
        $this->brandService = new BrandService();
    }
    
    public function index (){
		
        $param = parent::_handleTime( I() );
        $tPage = I( 'page' , 1 , 'intval' );
        $tPageSize = I( 'page_size' , 30 , 'intval' );
        
       
        $where = [];
        $tCount = $this->brandService->getCount( $where );
        $show = $this->page( $tCount , $tPage , $tPageSize );// 分页显示输出
        $tData = $this->brandService->getList( $tPage , $tPageSize , $where , 'id DESC' );
        
        $userList = array ();

        
        $this->assign( 'param' , $param );
        $this->assign( 'count' , $tCount );
        $this->assign( 'userList' , $userList );
        $this->assign( 'currentPage' , $tPage );
        $this->assign( 'page' , $show );
        $this->display();
    }
    
	
	/**
	*
	*
	**/
	private function formartCateName($name)
	{
		
	}
    

}