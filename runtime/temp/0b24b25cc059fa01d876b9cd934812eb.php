<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\wamp64\www\Ordersys\public/../application/index\view\user\server_main.html";i:1517839816;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/static/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/static/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>点我点餐系统</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="/static/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/static/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!--  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'/> -->

    <link href="/static/css/material-icons.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="/static/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="#" class="simple-text">
                点我点餐系统
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav" id="nav">
                <li data-id="Table">
                    <a>

                        <p>桌子</p>
                    </a>
                </li>
                <li  data-id="Menu">
                    <a>

                        <p>菜单</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand" href="#"><?php echo \think\Session::get('userAccount'); ?></p>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        <a href="<?php echo url('user/logout'); ?>" onclick="return confirm('是否注销该用户?');">
                            <img src="/static/img/logout.png"/>

                        </a>
                    </li>

                        <li data-id="Per">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/static/img/person.png"/>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="content" id="cof">

        </div>
    </div>

</div>
</body>

<!--   Core JS Files   -->
<script src="/static/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="/static/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/static/js/material.min.js" type="text/javascript"></script>
<script>
    $(function(){
        $(".nav").on("click", "li", function(){
            var sId = $(this).data("id");  //获取data-id的值
            window.location.hash = sId;  //设置锚点
            loadInner(sId);
        });
        function loadInner(sId){
            var sId = window.location.hash;
            var pathn, i;
            switch(sId){
                case "#Table": pathn = "<?php echo url('order/showTableState'); ?>"; i = 0; break;
                case "#Menu": pathn = "<?php echo url('dishes/menu'); ?>"; i = 1; break;
                case "#Per": pathn = "<?php echo url('user/userDetail',['userId'=>\think\Session::get('userId')]); ?>";i=3; break;

                default:  break;
            }
            $("#cof").load(pathn); //加载相对应的内容
            $("#nav li").eq(i).addClass("active").siblings().removeClass("active"); //当前列表高亮

        }
        var sId = window.location.hash;
        loadInner(sId);
    });

</script>

<!--  Charts Plugin -->
<script src="/static/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/static/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

<!-- Material Dashboard javascript methods -->
<script src="/static/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/static/js/demo.js"></script>

</html>
