<?php
/**
 * File Name: index.blade.php
 * Description: 菜单列表页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/22
 * Time: 22:14
 */
?>


<?php $__env->startSection('title','菜单管理首页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>菜单管理-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>后台导航菜单管理，可以灵活配置后台导航菜单，实时更新。</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addmenu">
                        <i class="layui-icon">&#xe608;</i> 添加菜单
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>排序</th>
                        <th>菜单ID</th>
                        <th>菜单标题</th>
                        <th>菜单图标</th>
                        <th>菜单链接</th>
                        <th>是否启用</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $list as $l ): ?>
                        <tr>
                            <td><?php echo e($l->order); ?></td>
                            <td><?php echo e($l->id); ?></td>
                            <td><?php echo e($l->title); ?></td>
                            <td><i class="larry-icon <?php echo e($l->icon); ?> "></i></td>
                            <td><?php echo e($l->href); ?></td>
                            <td>
                                <?php if( $l->status == 0 ): ?>
                                    启用
                                <?php elseif( $product->status == 1 ): ?>
                                    禁止
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="<?php echo e(url('admin/menu').'/'.$l->id); ?>" class="layui-btn  layui-btn-small" data-alt="查看">
                                        <i class="layui-icon" >&#xe60b;</i>
                                    </a>
                                    <a href="<?php echo e(url('admin/menu').'/'.$l->id."/edit"); ?>" class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a id="delete" data-id="<?php echo e($l->id); ?>" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="larry-table-page">
                    <?php echo e($list->render()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
    <script>
        layui.use(['jquery','layer','navtab'], function () {
            var $ = layui.jquery,
                layer = layui.layer,
                navtab = layui.navtab({
                    elem: '#larry-tab'
                });
            var index;


            //操作按钮 鼠标移入提示
            $('a.layui-btn').on('mouseover', function(){
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this),{tips: [1, '#0FA6D8']});
            });
            //操作按钮 鼠标移出
            $('a.layui-btn').on('mouseout',function(){
                layer.close(index);
            });
            //点击删除按钮
            $('a#delete').on('click', function(){
                var th = $(this),
                    t = th.parent().parent().parent('tr');
                layer.confirm('确定要删除吗?', {
                    btn: ['确定','取消'] //按钮
                    ,btnAlign: 'c'
                    ,shade: 0.8
                    ,id: 'MI_delTips' //设定一个id，防止重复弹出
                    ,moveType: 1 //拖拽模式，0或者1
                    ,resize: false
                }, function(){
                    var id =  th.data('id');
                    var l = layer.msg('正在加载请稍后...', {
                        icon: 6
                    });
                    $.ajax({
                        url:  '<?php echo e(url('/admin/menu')); ?>/'+ id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '<?php echo e(csrf_token()); ?>' }
                        ,success:function (data) {
                            alert(data);
                            layer.close(l);
                            if( data == 1 ){
                                layer.alert('删除成功', {icon: 1});
                                t.remove();
                            }else if ( data == 0 ){
                                layer.alert('数据不存在!', {icon: 2});
                            }else{
                                layer.alert('id错误!', {icon: 2});
                            }
                        }
                    });

                }, function(Index){
                    layer.close(Index);
                });
            });
            //刷新按钮
            $('button#refresh').on('click', function(){
                location.href=location.href;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>