<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"E:\wamp64\www\Ordersys\public/../application/index\view\dishes\manDishesSortDetail.html";i:1517764688;}*/ ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">菜品详情</h4>
                        <p class="category"><?php echo $data['dsName']; ?></p>
                    </div>

                    <div class="card-content">
                        <form action="<?php echo url('dishes/dishesSortUpdate'); ?>" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating">
                                        <label class="control-label">菜名（15个字以内）</label>
                                        <input type="text" id="dishesName" class="form-control" name="dsName" min="1" maxlength="15" value="<?php echo $data['dsName']; ?>" onkeyup="CU(this.value)" required>
                                        <span id="tips"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="text" value="<?php echo $data['dsId']; ?>" name="dsId" hidden>

                            <input type="submit" class="btn btn-primary pull-right" id="dishessortsubmit" value="提交"/>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function CU(str){
//                return alert(str);

        var xmlhttp;
        if (str.length==0)
        {
            document.getElementById("tips").innerHTML="";
            return;
        }
        if (str.length>=1){
            xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {

                    if (xmlhttp.responseText){
                        document.getElementById("tips").innerHTML="可以使用该菜品分类名";
                        document.getElementById("dishessortsubmit").disabled = false;
                    }else{
                        document.getElementById("tips").innerHTML="该菜品分类名已存在";
                        document.getElementById("dishessortsubmit").disabled = true;
                    }
                }
            }

            xmlhttp.open("GET","/index/dishes/checkDishesSortName?dsName="+str,true);
            xmlhttp.send();
        }else{
            document.getElementById("tips").innerHTML="该菜品分类名称长度为1-10个字符";
            document.getElementById("dishessortsubmit").disabled = true;
        }
    }
</script>