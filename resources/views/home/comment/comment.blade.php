<?php
/**
 * File Name: comment.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/29
 * Time: 16:07
 */
?>

@extends('layouts.commentHead')

@section('title','')

@section('css')
    @parent
@endsection

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">

    <div id="J_proHeader">
        <div class="xm-product-box">
            <div class="nav-bar" id="J_headNav">
                <div class="container J_navSwitch"><h2 class="J_proName">{{$shop[0]->p_name}}</h2>
                    <div class="con">
                        <div class="right"><a href="//www.mi.com/max2/" data-stat-id="0d06d9d5f98ac836"
                            >概述</a>
                            <span class="separator">|</span>
                            <a href="//www.mi.com/max2/gallery/" data-stat-id="0294fea29808d50d"
                            >图集</a>
                            <span class="separator">|</span> <a href="//www.mi.com/max2/specs/"
                                                                data-stat-id="04826b3bb4b6eb29"
                            >参数</a>
                            <span class="separator">|</span> <a href="//order.mi.com/queue/f2code" target="_blank"
                                                                data-stat-id="4f2de66f68e4a36e"
                            >F码通道</a>
                            <span class="separator">|</span> <a href="javascript:void(0);" class="cur"
                                                                data-stat-id="63093bcebf4ac2f6"
                            >用户评价</a>
                            <a href="//item.mi.com/product/10000057.html" class="btn btn-small btn-primary"
                               data-stat-id="b0afc07e03997006"
                            >立即购买</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="xm-product-box nav-bar-hidden" id="J_fixNarBar">
            <div class="nav-bar">
                <div class="container J_navSwitch"><h2 class="J_proName">小米Max 2</h2>
                    <div class="con">
                        <div class="right"><a href="//www.mi.com/max2/" data-stat-id="0d06d9d5f98ac836"
                            >概述</a>
                            <span class="separator">|</span> <a href="//www.mi.com/max2/gallery/"
                                                                data-stat-id="0294fea29808d50d"
                            >图集</a>
                            <span class="separator">|</span> <a href="//www.mi.com/max2/specs/"
                                                                data-stat-id="04826b3bb4b6eb29"
                            >参数</a>
                            <span class="separator">|</span> <a href="//order.mi.com/queue/f2code" target="_blank"
                                                                data-stat-id="4f2de66f68e4a36e"
                            >F码通道</a>
                            <span class="separator">|</span> <a href="javascript:void(0);" class="cur"
                                                                data-stat-id="63093bcebf4ac2f6"
                            >用户评价</a>
                            <a href="//item.mi.com/product/10000057.html" class="btn btn-small btn-primary"
                               data-stat-id="b0afc07e03997006"
                            >立即购买</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-comment-wrap h-comment-wrap">
        <div class="container J_commentWrap">
            <div class="m-comment-nav J_nav"><h2>大家认为</h2>
                <div class="nav-box"><a class="item cur" data-profileid="0" href="javascript:;"> 全部（{{$num}}）</a> <a
                            class="item item1" data-profileid="2" href="javascript:;"> 外观漂亮（528） </a> <a
                            class="item item2" data-profileid="9" href="javascript:;"> 值得拥有（341） </a> <a
                            class="item item3" data-profileid="11" href="javascript:;"> 手感很棒（288） </a> <a
                            class="item item4" data-profileid="5" href="javascript:;"> 电池耐用（270） </a> <a
                            class="item item5" data-profileid="10" href="javascript:;"> 快递给力（124） </a></div>
            </div>
            <div class="row">
                <div class="span13 h-comment-main  m-comment-main J_commentCon">
                    <div class="comment-top"><h2 class="m-tit">热门评价</h2>
                        <a class="J_showImg show-img" href="javascript:;" data-stat-id="4f93bf919ef90947">
                            <i class="iconfont">√</i> 只显示带图评价
                        </a>
                    </div>
                    <div class="m-comment-box J_commentList">
                        <ul class="m-comment-list J_listBody">
                            @foreach($data as $v)
                                @if($v->member_id != 4)
                                <li class="com-item J_resetImgCon J_canZoomBox" data-id="144906250">
                                    <a class="user-img" href="/comment/user?user_id=679923323">
                                        <img src="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg">
                                    </a>
                                    <div class="comment-info"><a class="user-name"
                                                                 href="/comment/user?user_id=679923323">不爱请远离.</a>
                                        <p class="time">{{$v->created_at}}</p></div>
                                    <div class="comment-eval"><i class="iconfont"></i> 超爱</div>
                                    <div class="comment-txt">
                                        <a href="/comment/detail?comment_id=144906250" target="_blank">
                                            {{$v->content}}
                                        </a>
                                    </div>
                                    <!-- 评论图片 -->
                                    <div class="m-img-list clearfix h-img-list">
                                        <div class="img-item img-item1  showimg">
                                            <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                 class="J_resetImgItem J_canZoom" data-index="0"
                                                 src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                 data-width="1080" data-height="1920"
                                                 style="width: 160px; margin-top: -62.2222px;">
                                            <div class="loader loader-gray"></div>
                                        </div>
                                        <div class="img-item img-item2  showimg"><img
                                                    data-src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg"
                                                    class="J_resetImgItem J_canZoom" data-index="1"
                                                    src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg"
                                                    data-width="972" data-height="1296"
                                                    style="width: 160px; margin-top: -26.6667px;">
                                            <div class="loader loader-gray"></div>
                                        </div>
                                        <div class="J_zoomImgList" style="display: none;">
                                            <span data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"></span>
                                            <span data-src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg"></span>
                                        </div>
                                    </div>
                                    <div class="comment-handler">
                                        <a href="javascript:;" data-commentid="144906250" class="J_hasHelp "> <i
                                                    class="iconfont"></i>&nbsp;
                                            <span class="amount">  89 </span>
                                        </a>
                                    </div>
                                    <div class="comment-input">
                                        <input type="text" placeholder="回复楼主" class="J_commentAnswerInput">
                                        <a href="javascript:void(0);" class="btn  answer-btn J_commentAnswerBtn"
                                           data-commentid="144906250">回复</a>
                                    </div>
                                    @endif

                                    @if($v->member_id == 4 && $v->type == 2)
                                    <div class="comment-answer">
                                        <div class="answer-item">
                                            <img class="answer-img" src="//s01.mifile.cn/i/logo.png">
                                            <div class="answer-content">
                                                <h3 class="official-name">官方回复</h3>
                                                <p> {{$v->content}}
                                                    <a href="javascript:void(0);" class="J_csLike "
                                                       data-commentid="144906250"> <i class="iconfont"></i>&nbsp;<span
                                                                class="amount">  158 </span>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="J_canZoomData">
                                        <div class="h-userInfo" data-username="不爱请远离." data-showtime="星期四"
                                             data-txt="客服妹子嫁给我吧，我会踩着七色云彩迎娶你的"
                                             data-avatar="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg"
                                             data-upnum="89" data-commentid="144906250"></div>
                                        <div class="h-answerInfo">
                                            <div class="answer-item" data-name="官方回复"
                                                 data-txt="我的意中人是个盖世英雄，有一天 他会五杀摧搭MVP，带我从青铜到荣耀王者~~(✿◡‿◡)感谢您对小米的支持。"
                                                 data-upnum="158" data-office="true"></div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="comment-more">
                            <a class="load-more J_loadMore" href="javascript:;" data-stat-id="5a1e4e882c6db2b9"
                               style="display: block;">加载更多</a></div>
                    </div>
                </div>

                <div class="span7 h-comment-fr m-comment-spe">
                    <div class="m-comment-summary J_commentSummary">
                        <div class="num"><p class="percent-num"><span class="m-num">5643</span> 人购买后满意 </p></div>
                        <div class="m-percent-box"><p class="percent" style="width:97.6%;">满意度 97.6%</p></div>
                    </div>
                    <h2 class="m-tit">最新评价</h2>
                    <ul class="m-spe-list J_speList">
                        @foreach($lim as $v)
                            @if($v->member_id != 4)
                        <li class="" data-id="144940948">
                            <div class="spe-top"><span class="time">3分钟前</span> <a class=""
                                                                                   href="/comment/user?user_id=137816676">-
                                    137816676</a></div>
                            <div class="txt"><a href="/comment/detail?comment_id=144940948" target="_blank">
                                    {{$v->content}} </a></div>
                            <div class="comment-handler"><a href="javascript:void(0);" data-commentid="144940948"
                                                            class="J_hasHelp "> <i class="iconfont"></i>&nbsp; <span
                                            class="amount hide">  0 </span> </a></div>
                            <div class="comment-eval"><i class="iconfont"></i> 超爱</div>
                        </li>
                            @endif
                        @endforeach

                    </ul>
                    <a href="javascript:;" class="m-scroll-top J_scrollTop hidden" data-stat-id="3580ecd7d0252a8d"
                    > </a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-hide comment-modal" id="J_commentModal">
        <a class="close" data-dismiss="modal" href="javascript: void(0);"data-stat-id="c556f3fed6708ea5"onclick="_msq.push(['trackEvent', '609b9a31b95f02b7-c556f3fed6708ea5', 'javascript:void0', 'pcpid', '']);">
            <i class="iconfont"></i>
        </a>
        <div class="modal-body">
            <div class="txt"><h2 class="tit"></h2></div>
            <a href="javascript: void(0);" class="btn btn-primary" data-dismiss="modal" data-stat-id="3df29cfd1ab609f8"
               onclick="_msq.push(['trackEvent', '609b9a31b95f02b7-3df29cfd1ab609f8', 'javascript:void0', 'pcpid', '']);">确定</a>
        </div>
    </div>

    <div class="modal fade modal-hide photoShow-modal" id="J_photoModal"
         style="width: 820px; height: 490px; margin-top: -245px; margin-left: -410px; display: none;"
         aria-hidden="true"><a class="close" data-dismiss="modal" href="javascript: void(0);"></a>
        <div class="photo-box J_photoImgWrap" style="width: 490px; height: 490px;">
            <div class="photo-img-wrap">
                <div class="J_bigImg bigImg">
                    <img class="J_zoomBigImg" src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg" style="height: 490px; display: block;">
                </div>
                <div class="photo-control J_zoomControl">
                    <a href="javascript:;" class="control-btn pre" data-index="-1" title="上一张"> </a>
                    <a href="javascript:;" class="control-btn next" data-index="1" title="下一张"> </a>
                </div>
                <div class="rotate-forward J_zoomRotate">
                    <a href="javascript:;" class="btn-left" data-index="-1" title="向左旋转"></a>
                    <a href="javascript:;" class="btn-right" data-index="1" title="向右旋转"></a>
                </div>
            </div>
            <div class="m-comment-area">
                <div class="user-info">
                    <a class="user-ava" href="javascript:;">
                        <img src="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg">
                    </a>
                    <p class="name">不爱请远离.</p>
                    <div class="time">星期四</div>
                </div>
                <div class="txt"> 客服妹子嫁给我吧，我会踩着七色云彩迎娶你的</div>
                <div class="img-list m-img-list J_resetImgCon J_smlNav clearfix">
                    <div class="img-item img-item1 J_zoomSmlImg showimg current">
                        <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg" class="J_resetImgItem"
                             src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg" data-width="1080"
                                data-height="1920" style="width: 90px; margin-top: -35px;">
                        <div class="loader loader-gray"></div>
                    </div>
                    <div class="img-item img-item2 J_zoomSmlImg showimg">
                        <img data-src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg" class="J_resetImgItem"
                                src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg" data-width="972"
                                data-height="1296" style="width: 90px; margin-top: -15px;">
                        <div class="loader loader-gray"></div>
                    </div>
                </div>

                <div class="comment-handler">
                    <a href="javascript:void(0);" data-commentid="144906250" class="J_hasHelp">
                        <i class="iconfont"></i>&nbsp; <span class="amount">  95 </span> </a>
                </div>

                <div class="answer-area"><p class="office">官方回复</p>
                    <div class="txt"> 我的意中人是个盖世英雄，有一天 他会五杀摧搭MVP，带我从青铜到荣耀王者~~(✿◡‿◡)感谢您对小米的支持。 <a
                                href="javascript:void(0);" class="J_csLike " data-commentid="144906250"> <i
                                    class="iconfont"></i>&nbsp; <span class="amount">  172 </span> </a></div>
                </div>
            </div>
        </div>
    </div>
@endsection


