@inject('request', 'Illuminate\Http\Request')

@if($request->segment(1) == 'pos' && ($request->segment(2) == 'create' || $request->segment(3) == 'edit'))
    @php
        $pos_layout = true;
    @endphp
@else
    @php
        $pos_layout = false;
    @endphp
@endif

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{in_array(session()->get('user.language', config('app.locale')), config('constants.langs_rtl')) ? 'rtl' : 'ltr'}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ Session::get('business.name') }}</title>
       {{--
        <!--Partials-->
        <!--Partials-->
       @yield('css')
        --}}

         @include('layouts.partials.css')

            <!-- Custom fonts for this template-->
  <link href="{{asset('theme/theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  
 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('theme/theme/css/sb-admin-2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/sc-2.0.1/datatables.min.css"/>
<style type="text/css">
  .form-control{
    width: auto;
  }
.input-group-addon{
      display: flex;
    align-items: center;
    padding: .375rem .75rem;
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    text-align: center;
    white-space: nowrap;
    background-color: #eaecf4;
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
}
</style>
    </head>

  
    <body class="@if($pos_layout) hold-transition lockscreen @else hold-transition skin-@if(!empty(session('business.theme_color'))){{session('business.theme_color')}}@else{{'blue'}}@endif sidebar-mini @endif" id="page-top">
        <div id="wrapper">
            <script type="text/javascript">
                if(localStorage.getItem("upos_sidebar_collapse") == 'true'){
                    var body = document.getElementsByTagName("body")[0];
                    body.className += " sidebar-collapse";
                }
            </script>
            @if(!$pos_layout)
                @include('layouts.partials.sidebar')

                <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
                @include('layouts.partials.header')
                
            @else
                @include('layouts.partials.header-pos')
            @endif

            <!-- Content Wrapper. Contains page content -->

                <!-- Add currency related field-->
                <input type="hidden" id="__code" value="{{session('currency')['code']}}">
                <input type="hidden" id="__symbol" value="{{session('currency')['symbol']}}">
                <input type="hidden" id="__thousand" value="{{session('currency')['thousand_separator']}}">
                <input type="hidden" id="__decimal" value="{{session('currency')['decimal_separator']}}">
                <input type="hidden" id="__symbol_placement" value="{{session('business.currency_symbol_placement')}}">
                <input type="hidden" id="__precision" value="{{config('constants.currency_precision', 2)}}">
                <input type="hidden" id="__quantity_precision" value="{{config('constants.quantity_precision', 2)}}">
                <!-- End of currency related field-->

                @if (session('status'))
                    <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
                @endif
                        <div class="container-fluid">

                @yield('content')
                @if(config('constants.iraqi_selling_price_adjustment'))
                    <input type="hidden" id="iraqi_selling_price_adjustment">
                @endif

                <!-- This will be printed -->
                <section class="invoice print_section" id="receipt_section">
                </section>
                
            </div>
            </div>
            @include('home.todays_profit_modal')
            <!-- /.content-wrapper -->

            @if(!$pos_layout)
                @include('layouts.partials.footer')
            @else
                @include('layouts.partials.footer_pos')
            @endif

            <audio id="success-audio">
              <source src="{{ asset('/audio/success.ogg?v=' . $asset_v) }}" type="audio/ogg">
              <source src="{{ asset('/audio/success.mp3?v=' . $asset_v) }}" type="audio/mpeg">
            </audio>
            <audio id="error-audio">
              <source src="{{ asset('/audio/error.ogg?v=' . $asset_v) }}" type="audio/ogg">
              <source src="{{ asset('/audio/error.mp3?v=' . $asset_v) }}" type="audio/mpeg">
            </audio>
            <audio id="warning-audio">
              <source src="{{ asset('/audio/warning.ogg?v=' . $asset_v) }}" type="audio/ogg">
              <source src="{{ asset('/audio/warning.mp3?v=' . $asset_v) }}" type="audio/mpeg">
            </audio>

        </div>
      </div>

<!-- Bootstrap core JavaScript-->
  <script src="{{asset('theme/theme/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('theme/theme/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('theme/theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('theme/theme/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('theme/theme/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('theme/theme/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('theme/theme/js/demo/chart-pie-demo.js')}}"></script>

        @include('layouts.partials.javascripts')
        <div class="modal fade view_modal" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
    </body>

</html>