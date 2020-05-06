@extends('backstage.template.page')

@section('breadcrumb')
@php
if($glory->main=='')
    $str2=$glory->picname;
else
    $str2=$glory->main;
@endphp
<article class="main_header z-index-2 ">
    <section class="page_crumbs">
        <div class="container-fluid content">
            <ul>
                <li>
                    <a href="{{url('/backstage/main')}}"><i class="fa fa-sitemap"></i>總覽</a>
                </li>
                <li>
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li>
                    <i class="fas fa-hands-helping"></i>策略夥伴
                </li>

                <li>
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li>
                    <a href="{{url('/backstage/glory')}}"><i class="fas fa-hands-helping"></i>廠商管理</a>
                </li>
                <li>
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li>
                    <i class="fa fa-edit"></i>修改資料 - {{$glory->name}}
                </li>
            </ul>
        </div>
    </section>
@stop

@section('content')
    <section class="function_btn_group container-fluid content pt-xs-2 pt-lg-3">
        <div class="row">
            <div class="col-xs-6">
                <div class="btn_group fun_btn ">
                    <a href="javascript:nosafe();" class="btn red"><i class="fa fa-undo"></i>返回</a>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="btn_group fun_btn text-right ">
                    <a href="#0" class="btn other-function" id="save_btn"><i class="fa fa-check"></i></i>儲存</a>
                    <div class="other-function-box">
                        <ul>
                            <li>儲存後...</li>
                            <li><a href="javascript:afterSubmit('1')"><i class="fa fa-undo"></i>返回列表</a></li>
                            <li><a href="javascript:afterSubmit('2')"><i class="fa fa-edit"></i>繼續編輯</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<article class="gw mh-info z-index-3">
    <section class="container-fluid content">
        @if ($errors->any())
        <div class="error_textblock mb-3">
            <h5><i class="fa fa-exclamation-triangle mr-2"></i>修改失敗</h5>
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
        <form id="addForm" name="addForm" method="post" enctype="multipart/form-data" action="{{url('/backstage/glory/update/'.$glory->id)}}">
            <div class="info_box">
                <div class="title_header mb-3">
                    <h2><i class="fa fa-info-circle"></i>分類管理資料設定</h2>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-6 mb-4 {{ (($errors->has('gloryName')) ? ' error' : '') }}">
                        <label for="gloryName" class="form-title required">廠商名稱</label>
                        <input type="text" class="form-control" id="gloryName" name="gloryName" value="{{(old('gloryName')=='')?$glory->name:old('gloryName')}}" placeholder="請輸入名稱" />
                    </div>
                    <div class="form-group col-xl-6 col-md-6 mb-4 z-index-3{{ (($errors->has('gloryType')) ? ' error' : '') }}" style="z-index: 3;">
                        <label for="gloryType" class="form-title required">夥伴分類</label>
                        <div class="form-control sel_class signle" tabindex="0">
                            <input type="hidden" class="sel_input" id="gloryType" name="gloryType" value="{{(old('gloryType')!='')?old('gloryType'):$glory->category}}" />
                            <div class="dropdown sel_info">
                                <span class="pl-2">請選擇夥伴分類</span>
                                <div class="box px-2"></div>
                                <i class="fa fa-caret-down close-sel"></i>
                            </div>
                            <div class="nav " style="display: none;" >
                                @foreach($list as $rows)
                                <div data-value="{{$rows->id}}" data-text="{{$rows->name}}" class="item">{{$rows->name}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="title_header mb-3">
                            <h2><i class="fa fa-images"></i>圖片上傳</h2>
                        </div>
                    </div>
                     <div class="col-md-9">
                        <div class="file_upload mb-4{{ (($errors->has('cover7')) ? ' error' : '') }}">
                            <label for="cover7"><p class="mb-0 cover_label "  id='readme'>未選擇任何檔案</p>
                                <span><i class="fa fa-cloud-upload-alt"></i>檔案上傳</span>
                                <input type="file" id="cover7" name="cover7" hidden="hidden" />
                            </label>
                            <p class="mb-3">建議尺寸：768px * 250px 置中為圖片的文字內容最佳放置位置，圖片尺寸不可超過1600px * 250px，限jpg、jpeg、png或gif檔，檔案容量不可超過 1MB。</p>
                        </div>
                    </div>
                    <div align="center" class="col-md-3">
                        @if($glory->picture!="")
                        <div class="img_preview sm img delete">
                            <img class="viewer" src="{{asset($glory->picture)}}" alt="{{$glory->name}}" />
                            <div class="btn_group">
                                <button type="button" class="btn sm btn_img_viewe"><i class="fa fa-search-plus mr-2"></i>查看照片</button>
                                <button type="button" class="btn red sm" onclick="delete_pic('{{$glory->id}}')"><i class="far fa-trash-alt mr-2"></i>刪除照片</button>
                            </div>
                        </div>
                         @else
                        <div class="img_preview sm">
                            <p>暫無圖片</p>
                        </div>
                        @endif
                    </div>
                    <input type="hidden" id="method" name="method" />
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </section>
</article>
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
                    <p class="red">確定要刪除這個檔案？</p>
                </div>
                <div class="include-icon"></div>
            </div>
            <div class="modal-footer">
                <div class="btn_group ">
                    <button type="button" class="btn" onclick="javascript:confirmDel()">確定</button>
                    <button type="button" class="btn red solid" onclick="javascript:closeModal()">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade message-modal " id="backModal" name="backModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title_header">
                    <h2><i class="fa fa-check"></i></i>確認離開</h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="message-info bold">
                    <p class="red">確認取消？將會遺失未儲存資料。</p>
                </div>
                <div class="include-icon"></div>
            </div>
            <div class="modal-footer">
                <div class="btn_group ">
                    <button type="button" class="btn" onclick="javascript:confirmcheck()">確定</button>
                    <button type="button" class="btn red solid" onclick="javascript:closeModals()">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="text" hidden id="deltarget">

<form method="post" id="all_action" action="{{url('/backstage/glory/checks/'.$glory->id)}}">
    <input type="hidden" id="all" name="all" value="" />
    {{ csrf_field() }}
</form>
@stop

@section('script')
<script type="text/javascript" src="{{asset('public/backstage/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/script.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewerjs/viewer.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewerjs/jquery-viewer.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/viewer.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/pickadate/lib/compressed/picker.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/pickadate/lib/compressed/picker.date.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/pickadate/lib/compressed/picker.time.js')}}"></script>
<script>
    function afterSubmit(method){
        $("#method").val(method);
        $("#addForm").submit();
    }

    $(document).ready(function(){
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      $('input[name="datepicker-date"]').focus(function(){
            $('input[name="datepicker-date"]').parent().css('z-index','1');
            $(this).parent().css('z-index','4');
        });

      $('input[name="datepicker-fdate"]').focus(function(){
            $('input[name="datepicker-fdate"]').parent().css('z-index','1');
            $(this).parent().css('z-index','4');
        });

      $('input[name="datepicker-time"]').focus(function(){
            $('input[name="datepicker-time"]').parent().css('z-index','1');
            $(this).parent().css('z-index','4');
        });

      $('input[name="datepicker-ftime"]').focus(function(){
            $('input[name="datepicker-ftime"]').parent().css('z-index','1');
            $(this).parent().css('z-index','4');
        });

      $('.donload_file button').click(function(){
            $(this).parent().remove();
        });

      if($("#permanent").is(":checked"))
      {
            $("#time_start").show();
            $("#time_end").hide();
      }
      if($("#deadline").is(":checked"))
      {
            $("#time_start").show();
            $("#time_end").show();
      }
      if($("#hide").is(":checked"))
      {
            $("#time_start").hide();
            $("#time_end").hide();
      }

      $("input[name='cir-select']").click(function(){
            if($("#permanent").is(":checked"))
            {
                $("#time_start").show();
                $("#time_end").hide();
            }
            if($("#deadline").is(":checked"))
            {
                $("#time_start").show();
                $("#time_end").show();
            }
            if($("#hide").is(":checked"))
            {
                $("#time_start").hide();
                $("#time_end").hide();
            }
        });
    });

    function processData(){
        var data = CKEDITOR.instances.editor.getData();
        alert(data);
    }

    $('#cover7').change(function(e) {
        var file = e.target.files;
        if(file.length>0)
        {
            // 獲取檔名 並顯示檔名
            var fileName = file[0].name;
            $("#readme").html("<p>"+fileName+"</p>");
        }else
        {
            //清空檔名
            $("#readme").html("<p>未選擇任何檔案</p>");
        }
    });

    function delete_pic(i)
    {
        $('#deltarget').val(i);
        $('#delModal').modal('show');
    }

    function confirmDel(){
        $.ajax({
            type: "POST", //傳送方式
            url: "{{url('/backstage/glory/removecover')}}", //傳送目的地
            dataType: "json", //資料格式
            data: { //傳送資料
                id: $('#deltarget').val(),
                category_id:$('#category_id').val()
            },
            success: function(data) {
            }
        });
        $('#all').val("d_pic");
        $('#all_action').submit();
    }

    function closeModal()
    {
        $('#delModal').modal('hide');
    }

    function nosafe(target){
        $('#backModal').modal('show');
    }

    function confirmcheck()
    {
        location.href='{{url('/backstage/glory')}}';
    }

    function closeModals()
    {
        $('#backModal').modal('hide');
    }

</script>
@stop
