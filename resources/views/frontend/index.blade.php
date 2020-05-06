<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('public/backstage/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="{{asset('public/backstage/js/jquery-3.3.1.js')}}"></script>
        <style>
            @charset "UTF-8";
            @import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);
            @import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
        </style>
    </head>
    <body>
        <header class="navbar navbar-expand-lg navbar-dark" style="border-top: 3px solid orange;background-color:#999998;">
            <div class="col-md-12 h2 text-muted" >猜你喜歡</div>
        </header>
        <div class="row container-fluid" style="margin-top: 2%; " id="container">
            @foreach($product as $row)
               <div class="card col-md-4 col-sm-6 article" style="border:none;">
                <table class=" table table-borderless" style="border:none;">
                    <tr>
                        <td align="center" colspan="4" >
                            <img class="w-50" src="{{asset($row->picture)}}" style="max-width: 50%;max-heigh:50%;" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="h6 text-muted"  colspan="4">
                            {{$row->name}}
                        </td>
                    </tr>
                    <tr>
                        <td class="h6 text-muted justify-content-start"><del>${{$row->price}}</del></td>
                        <td class="h6 text-danger justify-content-end">${{$row->sPrice}}</td>
                    </tr>
                </table>
            </div> 
            @endforeach
        </div>
    </body>
</html>
