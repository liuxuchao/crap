<?php
namespace Common\Model\Crap;

use Application\BaseModel;

/**
 * Description of UsersModel
 *
 * @author 刘旭超  <liuxuchao@liuxuchaozhao.com>
 */
class SupplierModel extends BaseModel
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
    protected $trueTableName = 'crap_supplier';
    
    /**
     * 数据表字段猎豹
     * @var array
     */
    protected $fields = [
        'id',
        'supplier_id',
        'supplier_name',
        'supplier_address',
        'supplier_moblie',
        'supplier_createtime',
    ];
    
    public function __construct()
    {
        parent::__construct();
    }
    
        
}

