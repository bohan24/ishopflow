<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="chrome=1,ie=edge,ie=11">
        <!--fonts-->
        <link media="screen" rel="stylesheet" type="text/css" href="{{asset('public/backstage/fonts/fontawesome/css/all.css')}}">
        <link media="screen" rel="stylesheet" type="text/css" href="{{asset('public/backstage/fonts/icomoon/style.css')}}">
        <!-- css-->
        <link href="{{asset('public/backstage/css/mylayout.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/css/bootstrap.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/js/viewerjs/viewer.min.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/js/pickadate/lib/themes/default.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/js/pickadate/lib/themes/default.time.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/js/pickadate/lib/themes/default.date.css')}}" media="screen" rel="stylesheet" type="text/css">
        <link href="{{asset('public/backstage/js/dragula/dragula.min.css')}}" media="screen" rel="stylesheet" type="text/css">
         <!-- Bootrap4 Example -->
        <link href="{{asset('public/backstage/css/dashboard.css')}}" rel="stylesheet">

        <title>產品管理後台</title>
    </head>
    <style>

      @charset "UTF-8";
      @import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);
      @import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);

      #note2::-webkit-input-placeholder{color:#FF0000;}

      #cke_editor{
        width:2000px;
      }

      /*狀態選擇checkbox-select */
      .checkbox-select {
        padding-left: 1rem;
        width: calc(100% - 150px);
      }

      .checkbox-select *, .checkbox-select *::before, .checkbox-select *::after {
        -webkit-transition: all ease .3s;
        transition: all ease .3s;
      }

      .checkbox-select input {
        display: none;
      }

      .checkbox-select input:checked + label {
        color: #007BAE;
      }

      .checkbox-select input:checked + label::before {
        border: 1px solid #007BAE;
      }

      .checkbox-select input:checked + label::after {
        opacity: 1;
      }

      .checkbox-select label {
        padding-left: 1.5rem;
        color: #aaaaaa;
        margin-bottom: 0;
        margin-right: 1rem;
        cursor: pointer;
      }

      .checkbox-select label::before {
        position: absolute;
        content: "";
        left: 0;
        top: 1px;
        width: 20px;
        height: 20px;
        border: 1px solid #aaaaaa;
        border-radius: 18%;
      }

      .checkbox-select label::after {
        position: absolute;
        content: "";
        left: 5px;
        top: 6px;
        width: 10px;
        height: 10px;
        background-color: #007BAE;
        border-radius: 18%;
        opacity: 0;
      }

      @media screen and (max-width: 480px) {
        .checkbox-select {
            width: calc(100% - 130px);
        }
      }

      input[name="check[]"]:checked + label {
        border: 1px solid #64BA68;
        -webkit-transition: all ease .3s;
        transition: all ease .3s;
     }

      input[name="check[]"]:checked + label::before {
        opacity: 1;
      }
      @media screen and (max-width: 1023px) {
        input[name="check"]:checked + label {
          -webkit-transition: all ease .45s;
          transition: all ease .45s;
        }
        input[name="check"]:checked + label::before {
          -webkit-transform: scale(1);
          transform: scale(1);
        }
      }

      input[name="check[]"]:checked + label {
        -webkit-transition: all ease .45s;
        transition: all ease .45s;
      }

      input[name="check[]"]:checked + label::before {
        -webkit-transform: scale(1);
        transform: scale(1);
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <body style="background-color:#f5f5f5;">
        @include('backend.include.header')
        <main>
            @yield('breadcrumb')
            @yield('content')
            @include('backend.include.footer')
        </main>
        @yield('modal')
        @yield('script')
    </body>


