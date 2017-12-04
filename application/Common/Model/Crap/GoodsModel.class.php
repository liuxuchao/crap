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
        'discription',
        'price',
        'discount_price',
        'status',
        'create_time',
        'shelves_time',
        'offshelf_time',

    ];
    
    public function __construct()
    {
        parent::__construct();
    }
    
        
}

