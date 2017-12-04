<?php
namespace Application;

use Application\BaseController;

/**
 * 客户Controller父类
 *
 * @author liuxuchao
 */
class HomeBaseController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->staticVersionNo();
    }
    
    /**
     * 加载静态资源版本号
     * js、css等
     * @author 刘旭超
     * @date 2016-08-17 17:11
     * @return null
     */
    private function staticVersionNo()
    {
        $cssVersion = C('CSS_VERSION');
        $jsVersion  = C('JS_VERSION');
        
        $this->assign('cssVersion', $cssVersion);
        $this->assign('jsVersion', $jsVersion);
        
        return;
    }
}
