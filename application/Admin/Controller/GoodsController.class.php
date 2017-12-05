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
        
        $tPage     = I('page', 1, 'intval');
        $tPageSize = I('page_size', 2, 'intval');
        $tCount = $this->goodsService->getCount();
       
        $show       = $this->page($tCount,$tPage,$tPageSize);// 分页显示输出
        $tData = $this->goodsService->getList($tPage, $tPageSize);
        $this->assign('data',$tData);
        $this->assign('count',$tCount);
        $this->assign('currentPage',$tPage);
        
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

        //接收数据
        if (!IS_POST) {
            exit("非法请求");
        }
        $data = $this->receive_add_parames();

        if(empty($data['name'])){
            $this->error('商品名称不能为空','/Admin/Goods/add',2);
            return;
        }   
        $fData = $this->goodsService->findByName($data['name']);
        if ($fData) {
            $this->error('商品已经存在','/Admin/Goods/add',2);
            return;
        }
        $data['create_time'] = time();
        $data['create_ip'] = get_client_ip();
        $addresult = $this->goodsService->add($data);
        if ($addresult) {
            $this->success('添加成功','/Admin/Goods/index',2);
            return;
        }
        $this->error('添加失败','/Admin/Goods/add',2);
        return;
    }

    /*
    *  接收添加商品post参数
    * 
    */
    private function receive_add_parames(){
        $data = [];
        $data['name'] = I('post.name','','strip_tags');
        $data['alias_name'] = I('post.alias_name','','strip_tags');
        $data['goods_range'] = I('post.goods_range','','strip_tags');
        $data['recharge_limit'] = I('post.recharge_limit','','strip_tags');
        $data['operator'] = I('post.operator','','strip_tags');
        $data['bag_size'] = I('post.bag_size','','strip_tags');
        $data['use_cycle'] = I('post.use_cycle','','strip_tags');
        $data['flow_type'] = I('post.flow_type','','strip_tags');
        $data['order_type'] = I('post.order_type','','strip_tags');
        $status = I('post.status','','strip_tags');
        $data['status'] = $status == 'on' ? 1 : 0;
        $data['description'] = I('post.description','','strip_tags');
        return $data;
    }

    /*
     *显示更新页面
     */
    public function updates () {
        $goodsId     = I('goodsId', '', 'intval,htmlspecialchars');
        $data = $this->goodsService->findById($goodsId);
        if(is_array($data)){
            unset($data['password']);
            unset($data['create_time']);
            unset($data['update_time']);
        }
        $this->assign('data',$data);
        $this->display();
       
    }
    
    /*
     *处理更新数据
     */
    public function doUpdate () {
        
        $data = $this->receive_update_parames();

        if(empty($data['id'])){
            $this->error('该商品ID不存在','/Admin/Goods/add',2);
            return;
        } 
        
        $updataResult = $this->goodsService->doUpdate($data['id'],$data);
        if ($updataResult) {
             $this->success('修改成功','/Admin/Goods/index',2);
             return;
        }
        $this->error('修改失败','/Admin/Goods/add',2);
         
        return;
    }

        /*
    *  接收添加商品post参数
    * 
    */
    private function receive_update_parames(){
        $data = [];
        $data['id'] = I('post.id','','strip_tags');
        $data['name'] = I('post.name','','strip_tags');
        $data['alias_name'] = I('post.alias_name','','strip_tags');
        $data['goods_range'] = I('post.goods_range','','strip_tags');
        $data['recharge_limit'] = I('post.recharge_limit','','strip_tags');
        $data['operator'] = I('post.operator','','strip_tags');
        $data['bag_size'] = I('post.bag_size','','strip_tags');
        $data['use_cycle'] = I('post.use_cycle','','strip_tags');
        $data['flow_type'] = I('post.flow_type','','strip_tags');
        $data['order_type'] = I('post.order_type','','strip_tags');
        $status = I('post.status','','strip_tags');
        $data['status'] = $status == 'on' ? 1 : 0;
        $data['description'] = I('post.description','','strip_tags');
        return $data;
    }
    
    /*
     *删除操作
     */
    public function doDelete () {
       
        $goodsId     = I('goodsId', '', 'intval,htmlspecialchars');
        
         if ( 0>= $goodsId) {
             echo 'ID错误';
            return;
         }
         $data = $this->goodsService->doDelete($goodsId);
         if ($data) {
             echo 1;
             return;
         }
             echo 0;
        return;
        
    }

}