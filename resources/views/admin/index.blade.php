@extends('admin.master.master')

@section('content')


    <div style="width:100px;height:900px;text-align:center"><dt>会员</dt>
        <dd class=""><a href="{{url('admin/member')}}" data-param="index|User">会员列表</a><i class="fa fa-check-square-o"></i></dd>
        <dd class=""><a href="javascript:void(0);" data-param="levelList|User">会员等级</a><i class="fa fa-check-square-o"></i></dd>


<div class="clearfix">
    <div class="admincp-container-left col-md-1">
        <div id="admincpNavTabs_system" class="nav-tabs">
            <dl>

                <dd class="sub-menu ico-system-4">
                    <ul>
                        <li><a href="{{url('admin/user')}}" data-param="index|Admin">管理员列表</a></li>
                        <li><a href="javascript:void(0);" data-param="role|Admin">角色管理</a></li>
                        <li><a href="javascript:void(0);" data-param="right_list|System">权限资源列表</a></li>
                        <li><a href="javascript:void(0);" data-param="log|Admin">管理员日志</a></li>
                        <li><a href="javascript:void(0);" data-param="supplier|Admin">供应商列表</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>


    <div class="col-md-11 clearfix">
        <table class="layui-table col-md-11 ">
            @yield('admin')
        </table>

    </div>

</div>
{{--    {{$data->links()}}--}}


        @yield('order')

@endsection