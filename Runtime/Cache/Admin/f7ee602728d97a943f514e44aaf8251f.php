<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>CRAP-管理-添加管理员</title>
    <!-- Bootstrap core CSS -->
    <link href="/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Admin/css/bootstrap-reset.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/Admin/css/style.css" rel="stylesheet">
    <link href="/Admin/css/style-responsive.css" rel="stylesheet" />

    
    <link href="/Admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/Admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/Admin/css/owl.carousel.css" type="text/css">
    
    <link href="/Admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/Admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/Admin/css/owl.carousel.css" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="/Admin/js/html5shiv.js"></script>
      <script src="/Admin/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php if(!empty($displayType) and 2 == $displayType ): ?><div class="container"><?php endif; ?>
  <section id="container" >

    <header class="header white-bg">
    <?php if(!empty($displayType) and 2 == $displayType ): ?><div class="container"><?php endif; ?>
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo">CRAP<span>MANAGEMENT</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><?php echo ($_SESSION['admin_user']['nickname']); ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="/Admin/Admin/changepwd"><i class=" icon-suitcase"></i>修改密码</a></li>
                            <li><a href="#"><i class="icon-cog"></i>切换显示宽度</a></li>
                            <li><a href="/Admin/Login/logout"><i class="icon-key"></i>退出</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        <?php if(!empty($displayType) and 2 == $displayType ): ?></div><?php endif; ?>
</header>

          <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu  dcjq-parent-li" id="nav-accordion">
            <li>
              <a href="/Admin/Index" <?php if('Index' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
                <i class="icon-dashboard"></i>
                <span>主面板</span>
              </a>
            </li>

            <li class="sub-menu  dcjq-parent-li" >
             <a href="javascript:;"  <?php if('Admin' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
              <i class="icon-laptop"></i>
              <span>角色/权限管理</span>
            </a>
            <ul class="sub">
              <li <?php if('index' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Admin" >管理员列表</a></li>
              <li <?php if('add' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/admin/add">角色管理</a></li>
              <li <?php if('add' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/admin/add">权限管理</a></li>
            </ul>
          </li>
		  <li class="sub-menu  dcjq-parent-li">
            <a href="javascript:;" <?php if('Users' == $controllerName or 'UsersBalanceLog' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
             <i class="icon-user"></i>
             <span>下游供货商管理</span>
           </a>
           <ul class="sub  dcjq-parent-li">
            <li <?php if('index' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Users/index" >下游供货商列表</a></li>
			 <li <?php if('index' == $actionName and 'Goods' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/Goods">产品列表</a></li>
            <li <?php if('discountList' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Users/getGivingLog" >产品分类</a></li>
          </ul>
        </li>
        <li class="sub-menu  dcjq-parent-li">
          <a href="javascript:;" <?php if('UsersPriceConfig' == $controllerName or 'Goods' == $controllerName or 'GoodsDiscount' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
            <i class="icon-btc"></i>
            <span>商品管理</span>
          </a>
          <ul class="sub">
            <li <?php if('index' == $actionName and 'Goods' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/Goods">产品列表</a></li>
            <li <?php if('discountList' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Users/getGivingLog" >产品分类</a></li>
          </ul>
        </li>
		<li class="sub-menu  dcjq-parent-li">
          <a href="javascript:;" <?php if('UsersPriceConfig' == $controllerName or 'Goods' == $controllerName or 'GoodsDiscount' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
            <i class="icon-btc"></i>
            <span>上游接口管理</span>
          </a>
          <ul class="sub">
            <li <?php if('index' == $actionName and 'Goods' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/Goods">产品列表</a></li>
            <li <?php if('discountList' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Users/getGivingLog" >产品分类</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" <?php if('SmsLog' == $controllerName or 'LoginLog' == $controllerName or 'RecommendStatistical' == $controllerName or 'ResumeSearchLog' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
            <i class=" icon-pencil"></i>
            <span>日志</span>
          </a>
          <ul class="sub">
            <li <?php if('index' == $actionName and 'SmsLog' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/SmsLog/index">短信发送日志</a></li>
            <li <?php if('index' == $actionName and 'LoginLog' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/LoginLog/index">登陆日志</a></li>
            <li <?php if('index' == $actionName and 'RecommendStatistical' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/RecommendStatistical/index">上游供货商请求日志</a></li>
            <li <?php if('index' == $actionName and 'ResumeSearchLog' == $controllerName): ?>class="active"<?php endif; ?>><a href="/Admin/ResumeSearchLog/index">下游供应商调用日志</a></li>
          </ul>
        </li>
		<li class="sub-menu  dcjq-parent-li" >
             <a href="javascript:;"  <?php if('Version' == $controllerName): ?>class="active dcjq-parent"<?php endif; ?>>
              <i class="icon-flag-alt"></i>
              <span>系统设置</span>
            </a>
            <ul class="sub">
              <li <?php if('index' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Version/index" >供应商菜单管理</a></li>
              <li <?php if('add' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Version/add">基本设置</a></li>
              <li <?php if('add' == $actionName): ?>class="active"<?php endif; ?>><a href="/Admin/Version/add">字典管理</a></li>
            </ul>
          </li>
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
      <!--main content start-->
      <section id="main-content" style="min-height:1000px;">
        
      <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="/Admin/Index"><i class="icon-home"></i> 主面板</a></li>
                          <li class="active">修改密码</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              修改密码
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal" role="form" method="post" action="/Admin/Admin/doChangepwd">
                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">原密码</label>
                                      <div class="col-lg-6">
                                          <input type="password" name="oldPassword" value="" class="form-control" id="inputEmail1" placeholder="原密码">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">新密码</label>
                                      <div class="col-lg-6">
                                          <input type="password" name="password" value="" class="form-control" id="inputEmail1" placeholder="新密码">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">确认密码</label>
                                      <div class="col-lg-6">
                                          <input type="password" name="confirmPassword"  class="form-control" id="inputPassword1" placeholder="确认密码" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-6">
                                          <button type="submit" class="btn btn-danger">提交</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                  </div>
              </div>
       </section>

      </section>
      <!--main content end-->
            <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2017 &copy; CRAP
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->

  </section>
  <?php if(!empty($displayType) and 2 == $displayType ): ?></div><?php endif; ?>
    <script src="/Admin/js/jquery.js"></script>
    <script src="/Admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/Admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/Admin/js/jquery.scrollTo.min.js"></script>
    <script src="/Admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/Admin/js/respond.min.js" ></script>
    <script src="/Admin/js/jquery.tagsinput.js" ></script>

    <!--common script for all pages-->
    <script type="text/javascript" src="/Admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script src="/Admin/js/calendar.js"></script>
    <script src="/Admin/js/common-scripts.js"></script>
    <!-- <script src="/Admin/js/form-component.js"></script> -->
   <script src="/Admin/js/advanced-form-components.js"></script>
   
    
  </body>
</html>