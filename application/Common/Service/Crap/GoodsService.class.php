<?php
namespace Common\Service\Crap;

use Application\BaseService;
use Common\Model\Crap\GoodsModel;


/**
 * crap_goods
 *
 * @author liuxuchao
 */
class GoodsService extends BaseService
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
            $this->model = new GoodsModel();
        }
        return;
    }

    /**
     * 根据商品名称查找
     * @param type $name
     * @param type $password
     * @param type $nickname
     * @return array | bool
     */
    public function findByName($name)
    {
        $name = trim($name);
        if ( empty($name) ) {
            return false;
        }
        $data = $this->model->findByName($name);
        return $data;
    }

    /**
     * 根据商品ID查找
     * @param type $goodsId
     * @return array | bool
     */
    public function findById($goodsId)
    {
        $goodsId = trim($goodsId);
        if ( 0>= $goodsId) {
            return false;
        }
        $data = $this->model->findById($goodsId);
        return $data;
    }

        /**
     * 获取列表
     * @author  liuxuchao
     * @param type $page
     * @param type $pagesize
     * @return array | bool
     */
    public function getList ( $page=1, $pageSize=10)
    {
        $page = intval($page);
        $pageSize = intval($pageSize);
        if ( 0 >= $page || 0 >= $pageSize) {
            return false;
        }
        $data = $this->model->getList( $page, $pageSize);
        return $data;
    }
    
    /**
     * 获取总数
     * @param type $where   查询条件
     * @return int | bool
     */
    public function getCount ( $where)
    {
        $data = $this->model->getCount( $where);
        return $data;
    }

    /**
     * 更新数据
     * @param type $goodsId
     * @return array | bool
     */
    public function doUpdate($goodsId,$data)
    {
        $goodsId = intval($goodsId);

        $data = $this->model->doUpdate($goodsId,$data);

        return $data;
    }
    /**
     * 根据商品ID删除操作
     * @param type $goodsId
     * @return array | bool
     */
    public function doDelete($goodsId)
    {
        $goodsId = intval($goodsId);
        if ( 0>= $goodsId) {
            return false;
        }
        $data = $this->model->doDelete($goodsId);
        return $data;
    }
}
