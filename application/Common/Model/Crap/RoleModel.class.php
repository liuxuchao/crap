<?php
namespace Common\Model\Crap;

use Application\BaseModel;

/**
 * Description of RoleModel
 *
 * @author 刘旭超  <liuxuchao@liuxuchaozhao.com>
 */
class RoleModel extends BaseModel
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
    protected $trueTableName = 'crap_role';
    
    /**
     * 数据表字段猎豹
     * @var array
     */
    protected $fields = [
        'id',
        'role_name',
        'description',
        'create_time',
        'update_time',
        'disable',
    ];
    
    public function __construct()
    {
        parent::__construct();
    }
    
        
}

