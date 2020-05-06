@extends('backend.template.page')

@section('content');

<div class="container-fluid content" style="margin-top: 120px;">
    @if ($errors->any())
    <div class="alert alert-danger mb-3">
        <h5><i class="fa fa-exclamation-triangle mr-2"></i>編輯失敗</h5>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-4 mb-3">
        <h1 class="h2">商品資料編輯</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" onclick="$('#saveModal').modal('show');" class="btn btn-sm btn-outline-secondary">儲存</button>
                <button type="button" onclick="$('#backModal').modal('show');" class="btn btn-sm btn-danger">返回列表</button>
            </div>
        </div>
    </div>
    <form style="background-color:white;box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" id="addForm" name="addForm" method="post" enctype="multipart/form-data" action="{{url('/backend/update/'.$product->id)}}">
        <div class="row container-fluid">
            <h4 class="col-md-12 mb-4" style="margin-top: 2%;margin-left:3%"><i class="fa fa-info-circle"></i>商品資料設定</h4>
            <table class="table table-borderless container" style="margin-left:5%;">
                <tr>
                    <td>
                        <div class="form-group row {{ (($errors->has('Name')) ? ' error' : '') }}">
                            <label for="Name" class="col-md-2 col-form-label btn btn-dark">商品名稱</label>
                            <input type="text" class="col-md-10 form-control" id="Name" name="Name" value="{{old('Name')==''?$product->name:old('Name')}}" placeholder="請輸入名稱，必填" />
                        </div>        
                    </td>
                </tr>
            </table>
            <table class="table table-borderless container" style="margin-left:5% " >
                <tr>
                    <td colspan="2">
                        <div class="form-group row mb-4 {{ (($errors->has('o_price')) ? ' error' : '') }}">
                            <label for="o_price" class="col-md-3 col-form-label btn btn-dark">商品原價</label>
                            <input type="text" class="col-md-7 form-control" id="o_price" name="o_price" value="{{old('o_price')=='' ? $product->price:old('o_price')}}" placeholder="請輸入最低價，必填" />
                        </div>
                    </td>
                    <td>
                        <div class="form-group row mb-4 justify-content-end {{ (($errors->has('price')) ? ' error' : '') }}">
                            <label for="price" class="col-md-3 col-form-label btn btn-dark">商品特價</label>
                            <input type="text" class="col-md-7 form-control" id="price" name="price" value="{{old('price')==''?$product->sPrice:old('price')}}" placeholder="請輸入最低特價，預設為0" />
                        </div>
                    </td>
                </tr>
            </table>
            <h4 class="col-md-12 container" style="margin-left:3%"><i class="fa fa-images"></i>圖片上傳</h4>
            <p class="col-md-12 mb-4 container" style="margin-top: 2%;margin-left:3%">建議尺寸：768px * 250px 置中為圖片的文字內容最佳放置位置，圖片尺寸不可超過1600px * 250px，限jpg、jpeg、png或gif檔，檔案容量不可超過 1MB，可以選擇上傳檔案或網址。如果取消上傳圖片，請點擊商品圖片網址解鎖。</p>
            <table class="table table-borderless container" style="margin-left:5% ">
                <tr>
                    <td>
                        <label for="cover7" class="btn btn-dark row col-form-label" onclick="$('#url').attr('disabled', 'disabled');"><span><i class="fa fa-cloud-upload-alt"></i> 檔案上傳</span></label>
                        <input type="file" class="form-control" id="cover7" name="cover7" hidden="hidden"  />
                        <label  style="margin-left:5%" id="cover_7" name="cover_7" >未選擇任何檔案</label>
                    </td>
                </tr>
                <tr>
                     <td colspan="2">
                        <div class="form-group row mb-4 justify-content-start {{ (($errors->has('url')) ? ' error' : '') }}">
                            <label for="url" onclick="$('#url').removeAttr('disabled');" class="col-md-2 col-form-label btn btn-dark">商品圖片網址</label>
                            <input type="text" class="col-md-10 form-control "  id="url" name="url" placeholder="請輸入圖片網址，選填" />
                        </div>            
                    </td>
            </table>
            <h4 class="col-md-12 mb-4" style="margin-top: 2%;margin-left:3%"><i class="fa fa-info-circle"></i>圖片預覽，點選圖片可放大顯示</h4>
            <table class=" col-md-6 col-sm-12 table table-borderless container" style="margin-left:5%;">
                <tr>
                    <td colspan="2">
                        <div style="max-wigth:500px;max-height:500px;margin-left:5%;">
                            <img class="viewer w-25" style="border-color:white 20px solid;box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src="{{asset($product->picture)}}" />
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        {{ csrf_field() }}
        <input type="hidden" id="method" name="method" />
    </form>
</div>

@stop

@section('modal')
<div class="modal fade message-modal " id="saveModal" name="saveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title_header">
                    <h2><i class="fa fa-check"></i></i>儲存資料</h2>
                </div>
            </div>
            <div class="modal-body">
                <div class="message-info bold">
                    <p class="text-danger h3">資料即將儲存，請選擇其他操作項目。</p>
                </div>
                <div class="include-icon"></div>
            </div>
            <div class="modal-footer">
                <div class="btn_group ">
                    <button type="button" class="btn btn-secondary " onclick="afterSubmit('1')">返回列表</button>
                    <button type="button" class="btn btn-secondary " onclick="afterSubmit('2')">繼續編輯</button>
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
                    <p class="text-danger h3">確認取消？將會遺失未儲存資料。</p>
                </div>
                <div class="include-icon"></div>
            </div>
            <div class="modal-footer">
                <div class="btn_group ">
                    <button type="button" class="btn btn-secondary" onclick="javascript:confirmcheck()">確定</button>
                    <button type="button" class="btn btn-danger" onclick="javascript:closeModal()">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="text" hidden id="deltarget">

@stop

@section('script')
<script type="text/javascript" src="{{asset('public/backstage/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backstage/js/bootstrap.min.js')}}"></script>
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
            $("#cover_7").text(fileName);
        }else
        {
            //清空檔名
            $("#cover_7").text("未選擇任何檔案");
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
            url: "{{url('/backstage/service/removecover')}}", //傳送目的地
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
        location.href='{{url('/backend')}}';
    }

    function closeModal()
    {
        $('#backModal').modal('hide');
    }

</script>

@stop
