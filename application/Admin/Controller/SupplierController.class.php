<?php
namespace Admin\Controller;

vendor( 'Curl.vendor.autoload' );

use \Curl\Curl;
use Application\AdminBaseController;
use Common\Service\Crap\SupplierService;

class SupplierController extends AdminBaseController {
    private $supplierService = null;
    
    public function __construct () {
        parent::__construct();
        $this->supplierService = new SupplierService();
    }
    
    public function index () {
        
        
       

        
        
        $this->display();
    }
    
    /*
     *显示更新页面
     */
    public function updates () {
        
        $this->display();
    }
    
    /*
     *处理更新数据
     */
    public function doUpdate () {
        
        
        return;
    }


    
    /*
     *删除操作
     */
    public function doDelete () {
       
        
        return;
    }

}