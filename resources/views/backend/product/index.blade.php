@extends('backend.template.page')

@section('breadcrumb')
@php
$dbc = array(
'０' , '１' , '２' , '３' , '４' ,
'５' , '６' , '７' , '８' , '９' ,
'Ａ' , 'Ｂ' , 'Ｃ' , 'Ｄ' , 'Ｅ' ,
'Ｆ' , 'Ｇ' , 'Ｈ' , 'Ｉ' , 'Ｊ' ,
'Ｋ' , 'Ｌ' , 'Ｍ' , 'Ｎ' , 'Ｏ' ,
'Ｐ' , 'Ｑ' , 'Ｒ' , 'Ｓ' , 'Ｔ' ,
'Ｕ' , 'Ｖ' , 'Ｗ' , 'Ｘ' , 'Ｙ' ,
'Ｚ' , 'ａ' , 'ｂ' , 'ｃ' , 'ｄ' ,
'ｅ' , 'ｆ' , 'ｇ' , 'ｈ' , 'ｉ' ,
'ｊ' , 'ｋ' , 'ｌ' , 'ｍ' , 'ｎ' ,
'ｏ' , 'ｐ' , 'ｑ' , 'ｒ' , 'ｓ' ,
'ｔ' , 'ｕ' , 'ｖ' , 'ｗ' , 'ｘ' ,
'ｙ' , 'ｚ' , '－' , '　' , '：' ,
'．' , '，' , '／' , '％' , '＃' ,
'！' , '＠' , '＆' , '（' , '）' ,
'＜' , '＞' , '＂' , '＇' , '？' ,
'［' , '］' , '｛' , '｝' , '＼' ,
'｜' , '＋' , '＝' , '＿' , '＾' ,
'￥' , '￣' , '｀'
);
$sbc = array( //半形
'0', '1', '2', '3', '4',
'5', '6', '7', '8', '9',
'A', 'B', 'C', 'D', 'E',
'F', 'G', 'H', 'I', 'J',
'K', 'L', 'M', 'N', 'O',
'P', 'Q', 'R', 'S', 'T',
'U', 'V', 'W', 'X', 'Y',
'Z', 'a', 'b', 'c', 'd',
'e', 'f', 'g', 'h', 'i',
'j', 'k', 'l', 'm', 'n',
'o', 'p', 'q', 'r', 's',
't', 'u', 'v', 'w', 'x',
'y', 'z', '-', ' ', ':',
'.', ',', '/', '%', ' #',
'!', '@', '&', '(', ')',
'<', '>', '"', '\'','?',
'[', ']', '{', '}', '\\',
'|', ' ', '=', '_', '^',
'￥','~', '`'
);
@endphp
<form id="descset" name="descForm" method="post" action="{{url('/backend')}}">
    <input type="hidden" id="key" name="key" value="{{$key}}" />
    <input type="hidden" id="pg" name="pg" value="{{$pg}}" />
    <input type="hidden" id="view" name="view" value="{{$view}}" />
    <input type="hidden" id="desc" name="desc" value="{{$sort}}" />
    <input type="hidden" id="orderby" name="orderby" value="{{$orderby}}" />
    <input type="text" hidden id="deltarget">
    {{ csrf_field() }}
</form>

<input type="hidden" id="nums" name="nums" value="{{$count}}" />

@stop

@section('content')

<div class="container-fluid content mb-3" style="margin-top: 120px;">
    @if($count==0)
    <div class="alert alert-danger mb-3" role="alert">
        {{($key=='')?'目前查無任何資料':'目前查無['.$key.']的任何資料!' }}
    </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-4 mb-3">
        <h1 class="h2">商品管理列表</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"  >
                <button type="button" onclick="location.href='{{url('/backend/create')}}'" class="btn btn-sm btn-outline-secondary">新增資料</button>
            </div>
            <div class="dropdown page_amount">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    每頁顯示&nbsp;{{$view}}則
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="javascript:setNum(1)">每頁顯示&nbsp;1則</a>
                    <a class="dropdown-item" href="javascript:setNum(5)">每頁顯示&nbsp;5則</a>
                    <a class="dropdown-item" href="javascript:setNum(10)">每頁顯示&nbsp;10則</a>
                    <a class="dropdown-item" href="javascript:setNum(25)">每頁顯示&nbsp;25則</a>
                    <a class="dropdown-item" href="javascript:setNum(50)">每頁顯示&nbsp;50則</a>
                </div>
            </div>    
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm border-bottom" >
          <thead>
                <tr>
                    <th class="text-nowrap col-md-2 col-sm-2">建立時間</th>
                    <th class="text-nowrap col-md-2 col-sm-2">商品縮圖</th>
                    <th class="text-nowrap col-md-3 col-sm-2">商品名稱</th>
                    <th class="text-nowrap col-md-2 col-sm-2">商品價格(原價/特價)</th>
                    <th class="text-nowrap col-md-1 col-sm-2">編輯</th>
                    <th class="text-nowrap col-md-1 col-sm-2">刪除</th>
                </tr>
          </thead>
          <tbody>
                @foreach($list as $row)
                @php
                    $str2=str_replace( $dbc, $sbc, $row->name );
                @endphp
                <tr>
                    <td style="vertical-align: middle">{{$row->created_at}}</td>
                    <td style="vertical-align: middle">
                        @if($row->picture=="")
                        <div class="viewer" ><img style="max-width: 50%;max-height:50%;" src="{{asset('/public/backstage/images/noimg.png')}}" alt="{{$row->name}}" /></div>
                        @else
                        <div class="viewer" ><img style="max-width: 50%;max-height:50%;" src="{{asset($row->picture)}}" alt="{{$row->name}}" /></div>
                        @endif
                    </td>
                    <td style="vertical-align: middle">{{$row->name}}</td>
                    <td style="vertical-align: middle">{{$row->price}}/{{$row->sPrice}}</td>
                    <td style="vertical-align: middle"><a href="{{url('/backend/edit/'.$row->id)}}" class="btn btn-warning">編輯</a></td>
                    <td style="vertical-align: middle"><a href='javascript:deleter("{{$row->id}}")' class="btn btn-danger">刪除</a></td>
                </tr>
                @endforeach
          </tbody>
        </table>
        <table class="table">
            <tr>
                <td>
                    <p id="info">
                        <span class="ml-sm-3 d-xs-block d-sm-inline-block py-xs-3 py-sm-0"><i class="far fa-clock mr-1"></i>2019-06-06 10:23:20</span>
                    </p>
                </td>
                <td style="text-align:right;">
                    <div class="page_number">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                @if(empty($pg) || $pg==1)
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="PreviousStart">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                    </a>
                                </li>
                                @else
                                <li class="page-item ">
                                    <a class="page-link" href="javascript:setpg('1')" aria-label="PreviousStart">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item ">
                                    <a class="page-link" href="javascript:setpg('{{$pg-1}}')" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                                    </a>
                                </li>
                                @endif
        
                                @if($count<=$view)
                                <li class="page-item active"><a class="page-link " id="page1" href="#">1</a></li>
                                @elseif($count<=($view*2))
                                @if($pg==1)
                                <li class="page-item active"><a class="page-link " id="page1" href="javascript:setpg(1)">1</a></li>
                                <li class="page-item"><a class="page-link" id="page2" href="javascript:setpg('2')">2</a></li>
                                @else
                                <li class="page-item "><a class="page-link " id="page1" href="javascript:setpg(1)">1</a></li>
                                <li class="page-item active"><a class="page-link" id="page2" href="javascript:setpg('2')">2</a></li>
                                @endif
        
                                @elseif($count>($view*2))
                                @if($count>=($view*2)&&$pg==1)
                                <li class="page-item active"><a class="page-link " id="page1" href="javascript:setpg(1)">1</a></li>
                                <li class="page-item"><a class="page-link" id="page2" href="javascript:setpg('2')">2</a></li>
                                <li class="page-item"><a class="page-link" id="page3" href="javascript:setpg('3')">3</a></li>
                                @elseif($pg==2)
                                <li class="page-item "><a class="page-link " id="page1" href="javascript:setpg(1)">1</a></li>
                                <li class="page-item active"><a class="page-link" id="page2" href="javascript:setpg('2')">2</a></li>
                                <li class="page-item"><a class="page-link" id="page3" href="javascript:setpg('3')">3</a></li>
                                @elseif(($pg*$view)<$count&&$pg>=3&&($pg*$view)<=$count)
                                <li class="page-item "><a class="page-link " id="page1" href="javascript:setpg('{{$pg-1}}')">{{$pg-1}}</a></li>
                                <li class="page-item active"><a class="page-link" id="page2" href="javascript:setpg('{{$pg }}')">{{$pg }}</a></li>
                                <li class="page-item"><a class="page-link" id="page3" href="javascript:setpg('{{$pg+1}}')">{{$pg+1}}</a></li>
                                @elseif((($pg+1)*$view)>=$count)
                                <li class="page-item "><a class="page-link " id="page1" href="javascript:setpg('{{$pg-2 }}')">{{$pg-2 }}</a></li>
                                <li class="page-item "><a class="page-link " id="page1" href="javascript:setpg('{{$pg-1 }}')">{{$pg-1 }}</a></li>
                                <li class="page-item active"><a class="page-link" id="page2" href="javascript:setpg('{{$pg }}')">{{$pg }}</a></li>
                                @endif
                                @endif
        
                                @if(floor($count/($view)+1==$pg))
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="NextEnd">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                                @else
                                @if(($pg*$view)>=$count)
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="NextEnd">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                                @else
                                <li class="page-item">
                                    <a class="page-link" href="javascript:setpg('{{$pg+1 }}')" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="javascript:setpg('{{($pg*$view)<=$count&&($count%$view)!=0?floor($count/$view)+1:floor($count/$view) }}')" aria-label="NextEnd">
                                        <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                                @endif
                                @endif
                            </ul>
                        </nav>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
@stop
@section('modal')
<div class="modal fade message-modal " id="delModal" name="delModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title_header">
                    <h2><i class="fa fa-check"></i></i>確認刪除</h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="message-info bold">
                    <p class="text-danger h3">確定要刪除這筆資料？</p>
                </div>
                <div class="include-icon"></div>
            </div>
            <div class="modal-footer">
                <div class="btn_group ">
                    <button type="button" class="btn btn-primary" onclick="javascript:confirmDel()">確定</button>
                    <button type="button" class="btn btn-danger" onclick="javascript:closeModal()">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('script')
<script type="text/javascript" src="{{asset('public/backstage/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewerjs/viewer.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewerjs/jquery-viewer.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewer.js')}}"></script>
<script>
    var id;
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[name="check[]"]').click(function(){

            var ck_box = false;
            $('input[name="check[]"]').each(function(){
                ck_box = (ck_box || $(this).prop('checked'));
            });

            if(ck_box)
            {
                $('.more_btn').addClass('show');
            }else
            {
                $('.more_btn').removeClass('show');
            }

        });

        $("#check_all").click(function() {
            if($("#check_all").prop("checked"))
            {
                $("input[name='check[]']").each(function() {
                    $(this).prop("checked", true);
                });
            } else
            {
                $("input[name='check[]']").each(function() {
                    $(this).prop("checked", false);
                });
            }
            if($('#nums').val()!='0')
            {
                if($("#check_all").prop("checked"))
                {
                    $('.more_btn').addClass('show');
                }else
                {
                    $('.more_btn').removeClass('show');
                }
            }
        });

        $("#check_all_mb").click(function() {
            if($("#check_all_mb").prop("checked"))
            {
                $("input[name='check[]']").each(function() {
                    $(this).prop("checked", true);
                });
            } else
            {
                $("input[name='check[]']").each(function() {
                    $(this).prop("checked", false);
                });
            }
            if($('#nums').val()!='0')
            {
                if($("#check_all_mb").prop("checked"))
                {
                    $('.more_btn').addClass('show');
                }else
                {
                    $('.more_btn').removeClass('show');
                }
            }
        });
    });

    $('.search').click(function()
    {
        var a=$("#search").val();
        $("#key").val(a);
        $("#pg").val('1');
        $("#descset").submit();
    });

    $('.clear').click(function()
    {
        $("#key").val("");
        $("#pg").val('1');
        $("#descset").submit();
    });

    function setNum(num){
        $("#pg").val(1);
        $("#view").val(num);
        $("#descset").submit();
    }

    function setdesc(num){
        $("#desc").val(num);
        $("#descset").submit();
    }

    function setorderby(num){
        $("#orderby").val(num);
        $("#descset").submit();
    }

    function setkey(){
        $("#key").val('成功');
        $("#descset").submit();
    }

    function setpg(num){
        $("#pg").val(num);
        $("#descset").submit();
    }

    function deleter(target){
        $('#deltarget').val(target);
        $('#delModal').modal('show');
    }

    function confirmDel()
    {
        var account=id;
        $.ajax({
            type: "POST", //傳送方式
            url: "{{url('/backend/delete')}}" , //傳送目的地
            dataType: "json", //資料格式
            data: { //傳送資料
                id:$('#deltarget').val(),
                del:'del'
            },
            success: function(data) {
            }
        });
        location.href="/ishop/backend";
    }

    function closeModal()
    {
        $('#delModal').modal('hide');
    }

    function closeModals()
    {
        $('#delModals').modal('hide');
    }

    function m_del(){
        $('#delModals').modal('show');
    }

    function confirmDels()
    {
        var i=0;
        var Val=new Array();
        $('input[name="check[]"]:checkbox:checked').each(function(i) {
            Val[i] = this.value;
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/delete')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id: Val[i],
                    del:'m'
                },
                success: function(data) {
                }
            })
            i++;
        });
        $('#all').val("delete");
        $('#all_action').submit();
    }

    function setNum(num){
        $("#pg").val(1);
        $("#view").val(num);
        $("#descset").submit();
    }

    /*function changePass(i){
        var re=confirm('是否確認修改glory顯示狀態');
        if(re==true)
        {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/use/')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id:i
                }, success: function(data) {
                }
            });
        }else
        {
            if($('#open'+i).attr('checked'))
            {
                $('#open'+i).prop("checked", false);
            }else
            {
                $('#open'+i).prop("checked", false);
            }
        }

    }*/

    function changePass(i){
        $.ajax({
            type: "POST", //傳送方式
            url: "{{url('/backstage/glory/use/')}}", //傳送目的地
            dataType: "json", //資料格式
            async:false,
            data: { //傳送資料
                id:i
            }, success: function(data) {
                if(data.succs=='true')
                {
                    //location.reload();

                }else if(data.succs=='false')
                {
                    alert('操作錯誤。廣告橫幅最多只能開啟5張圖片。');
                    location.reload();
                }
            }
        });
    }

    function passopen(){

        var i=0;
        var stop=0;
        var Val=new Array();
        $('input[name="check[]"]:checkbox:checked').each(function(i) {
            Val[i] = this.value;
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/open')}}", //傳送目的地
                dataType: "json", //資料格式
                async:false,
                data: { //傳送資料
                    id: Val[i]
                },
                success: function(data) {
                    if(data.succs=='true')
                    {

                    }else if(data.succs=='false')
                    {
                        //alert('操作錯誤。廣告橫幅最多只能開啟10張圖片。');
                        stop++;
                        //stop=1;
                    }
                }
            })
            i++;
        });
        if(stop > 0){
            alert('操作錯誤。廣告橫幅最多只能開啟5張圖片。');
            location.reload();
        }else
        {
            $('#all').val("open");
            $('#all_action').submit();
        }
    }

    function passclose(){

        var i=0;
        var Val=new Array();
        $('input[name="check[]"]:checkbox:checked').each(function(i) {
            Val[i] = this.value;
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/close')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id: Val[i]
                },
                success: function(data) {
                }
            })
            i++;
        });
        $('#all').val("close");
        $('#all_action').submit();
    }

    function changeheader(i){
        $.ajax({
            type: "POST", //傳送方式
            url: "{{url('/backstage/service/header/')}}", //傳送目的地
            dataType: "json", //資料格式
            data: { //傳送資料
                id:i
            }, success: function(data) {
            }
        });
    }

    function headeropen(){

        var i=0;
        var Val=new Array();
        $('input[name="check[]"]:checkbox:checked').each(function(i) {
            Val[i] = this.value;
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/service/headeropen')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id: Val[i]
                },
                success: function(data) {
                }
            })
            i++;
        });
        $('#all').val("header");
        $('#all_action').submit();
    }

    function headerclose(){

        var i=0;
        var Val=new Array();
        $('input[name="check[]"]:checkbox:checked').each(function(i) {
            Val[i] = this.value;
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/service/headerclose')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id: Val[i]
                },
                success: function(data) {
                }
            })
            i++;
        });
        $('#all').val("header");
        $('#all_action').submit();

    }

    function dataMove(id,act)
    {
        if(act=='up')
        {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/sortup/')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id:id
                }, success: function(data) {
                }
            });
        }else
        {
            $.ajax({
                type: "POST", //傳送方式
                url: "{{url('/backstage/glory/sortdown/')}}", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    id:id
                }, success: function(data) {
                }
            });
        }
        $('#all').val("change");
        $('#all_action').submit();
    }
</script>
@stop
