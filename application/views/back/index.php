<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE HTML>
<html>
 <head>
  <title>西瓜帮·乐青春管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="../style/back/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
   <link href="../style/back/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="../style/back/assets/css/main-min.css" rel="stylesheet" type="text/css" />
 <body>
   <div class="header">
    <div class="dl-title"><span class="">西瓜帮·乐青春</span></div>
    <div class="dl-log">欢迎您，<span class="dl-log-user">管理员</span>
        <a href="###" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
   </div>
   <div class="content">
    <div class="dl-main-nav">
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-storage">订单管理</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-inventory">代理管理</div></li>
		<li class="nav-item"><div class="nav-item-inner nav-inventory">合同管理</div></li>
		<li class="nav-item"><div class="nav-item-inner nav-inventory">系统管理</div></li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">
 
    </ul>
      
   </div>

  <script type="text/javascript" src="<?php echo base_url().'/style/back/assets/js/jquery-1.8.1.min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'/style/back/assets/js/bui-min.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'/style/back/assets/js/config-min.js'?>"></script>
  <script>
     BUI.use('common/main',function(){
      var config = [{
          id:'menu1',
          menu:[{
              text:'订单内容',
              items:[
                {id:'main-menu',text:'顶部导航',href:'###'},
                {id:'second-menu',text:'二级菜单',href:'###'}
              ]
            }]
          },{
          id:'menu2',
          menu:[{
              text:'代理信息',
              items:[
                {id:'main-menu',text:'顶部导航',href:'###'},
                {id:'second-menu',text:'二级菜单',href:'###'}
              ]
            }]
          },{
          id:'menu3',
          menu:[{
              text:'合同面板',
              items:[
                {id:'main-menu',text:'顶部导航',href:'###'},
                {id:'second-menu',text:'二级菜单',href:'###'}
              ]
            }]
          },{
            id:'menu4',
            menu:[{
                text:'系统管理',
                items:[
                  {id:'introduce',text:'搜索页面简介',href:'search/introduce.html'}
                ]
              }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
 
  </script>
 </body>
</html>

