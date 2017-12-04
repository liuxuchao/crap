<?php
namespace Admin\Controller;

vendor( 'Curl.vendor.autoload' );

use \Curl\Curl;
use Application\AdminBaseController;
use Common\Service\Crap\GoodsService;

class GoodsController extends AdminBaseController {
    private $goodsService = null;
    
    public function __construct () {
        parent::__construct();
        $this->goodsService = new GoodsService();
    }
    
    public function index () {
        

        $this->display();
    }


    /*
     * 商品添加
     */
    public function add () {
        
        $this->display();
    }
    
    /*
     * 商品添加
     */
    public function doAdd () {
        
        return;
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