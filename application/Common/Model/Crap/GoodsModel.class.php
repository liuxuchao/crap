<?php
namespace Common\Model\Crap;

use Application\BaseModel;

/**
 * Description of GoodsModel
 *
 * @author 刘旭超  <liuxuchao@liuxuchaozhao.com>
 */
class GoodsModel extends BaseModel
{
    
    /**
     * 数据库连接配置
     * @var string
     */
    protected $connection = 'CRAP_DB';
    
    /**
     * 主键字段名称
     * @var string 
     */
    protected $pk = 'id';
    
    /**
     * 实际数据表名（包含表前缀）
     * @var string 
     */
    protected $trueTableName = 'crap_goods';
    
    /**
     * 数据表字段猎豹
     * @var array
     */
    protected $fields = [
        'id',
        'goods_id',
        'supplier_id',
        'attribute_id',
        'category_id',
        'brand_id',
        'name',
        'alias_name',
        'goods_range',
        'recharge_limit',
        'operator',
        'bag_size',
        'use_cycle',
        'flow_type',
        'order_type',
        'discription',
        'price',
        'discount_price',
        'status',
        'create_time',
        'shelves_time',
        'offshelf_time',
        'create_ip',
        'update_ip',
    ];

    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    /**
     * [findByName 根据字符串查找商品是否存在]
     * @param  [string] $name [description]
     * @return [boole]       [description]
     */
    public function findByName($name)
    {
        $where = [];
        $where['name'] = $name;
        $result = $this->where($where)->find();
        return $result ? true : false;   
    }  
    /**
     * 根据用户名称查找数据
     * @author liuxuchao
     * @date 2016-07-26
     * @param string $goodsId 用户id
     * @return array | boolean
     */
    public function findById($goodsId)
    {
        $goodsId = intval( $goodsId );
       
        if ( 0 >= $goodsId) {
            return false;
        }
        $where['id'] = $goodsId;
        $data = $this->where($where)->find();
        if ( $data ) {
            return $data;
        }
        return false;
    }
    /**
     * 获取商品列表
     * @author liuxuchao
     * @param string $page 页码
     * @param array $pageSize 页数
     * @param array $order 排序
     * @return array | boolean
     */
    public function getList($page, $pageSize,$orderType=1)
    {
        $page = intval( $page );
        $pageSize = intval($pageSize);
        if ( 0 >= $page || 0>=$pageSize ) {
            return false;
        }
        //排序规则列表
        $orderRules = [
            1 => 'create_time DESC',
            2 => 'id DESC',
            3 => 'create_time DESC',
            4 => 'id DESC',
        ];
        
        //排序
        $order = isset($orderRules[$orderType]) ? $orderRules[$orderType] : '';
        if ( !empty($order) ) {
            $this->order($order);
        }
        if ( 0 < $page ) {
            $offset = ($page - 1) * $pageSize;
            $this->limit($offset, $pageSize);
        }
        $data = $this->select();
        if ( $data ) {
            return $data;
        }
        return false;
    }


        /**
     * 获取管理员总数
     * @author liuxuchao
     * @param string $page 页码
     * @param array $pageSize 页数
     * @param array $order 排序
     * @return array | boolean
     */
    public function getCount($where)
    {
        $where = trim($where);
        $data = $this->where($where)->count();
        if ( $data ) {
            return $data;
        }
        return false;
    }

    /**
     * 更新数据
     * @author liuxuchao
     * @return array | boolean
     */
    public function doUpdate($goodsId,$data)
    {
        $goodsId = intval( $goodsId );

        if (0 >= $goodsId || empty($data)) {
            return false;
        }
        $data['update_time'] = time();

        $res_data = $this->where(['id'=>$goodsId])->save($data);

        if ( $res_data ) {
            return $res_data;
        }
        return false;
    }

        /**
     * 根据商品ID 删除操作
     * @author liuxuchao
     * @param string $goodsId 用户ID
     * @return array | boolean
     */
    public function doDelete($goodsId)
    {
        $goodsId = intval( $goodsId );
       
        if ( 0 >= $goodsId) {
            return false;
        }
        $where['id'] = $goodsId;
        $data = $this->where($where)->delete();
        if ( $data ) {
            return $data;
        }
        return false;
    }
}

