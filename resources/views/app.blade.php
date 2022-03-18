<!DOCTYPE html>
<html lang="en">
<base href="{{ asset('') }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded"/>
    <!-- Favicon icon -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- select2 css -->
    <link rel="stylesheet" href="assets/css/plugins/select2.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap -->
    <link href="assets/css/pluglins/bootstrap.min.css" rel="stylesheet">
    <!-- pnotify-custom css -->
    <link rel="stylesheet" href="assets/css/plugins/PNotifyBrightTheme.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
    <style>

        @media (max-width: 600px) {
            #btn-in, #btnexcluir, #btn-ed {
                display: block;
                width: 100%;
            }

            #btn-ed {
                margin-bottom: 0.5rem;
            }

            .div-block {
                display: block !important;
            }

            .col {
                display: block !important;
                max-width: 100% !important;
            }
        }
        select {
            max-width: 250px !important;
        }
        .ln_solid{
            border-top: 1px solid #0077bc;
            margin: 1.25rem;
        }

        .tresPontos{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1; /* number of lines to show */
            -webkit-box-orient: vertical;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        .tres-pontos{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1; /* number of lines to show */
            -webkit-box-orient: vertical;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }
        .tresPontos2{
            max-width: 15ch;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
    @stack('head')
</head>
<body id="body">
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menupos-fixed menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="/images/eu.jpg" alt="User-Profile-Image">
                    <a href="https://www.linkedin.com/in/gustavo-rosolen-brigatti/" class="user-details tresPontos" target="_blank">
                        Gustavo Rosolen Brigatti
                    </a>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navegação</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('produtos.index') }}" class="nav-link"><span class="pcoded-micon"><i class="fas fa-barcode"></i></span><span class="pcoded-mtext">Produtos</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed headerpos-fixed header-blue">


    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" style="cursor: pointer"><span></span></a>
        <a href="{{ url('/') }}" class="b-brand">
            <!-- ========   change your logo hear   ============ -->
            <img src="" alt="" class="logo">
        </a>
        <a style="cursor: pointer" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>



</header>
<!-- [ Header ] end -->


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        @yield('content')
    </div>
</div>
<!-- [ Main Content ] end -->
<!-- Warning Section start -->
<!-- Older IE warning message -->
<!--[if lt IE 11]>
<div class="ie-warning">
    <h1>Aviso!!</h1>
    <p>Você está usando uma versão desatualizada do Internet Explorer, atualize
        <br/>a qualquer um dos seguintes navegadores para acessar este site.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (11 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Desculpe pela inconveniência!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/ripple.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/plugins/jquery.mask.min.js"></script>

<!-- pnotify Js -->
<script src="assets/js/plugins/PNotify.js"></script>
<script src="assets/js/plugins/PNotifyButtons.js"></script>

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/pages/data-basic-custom.js"></script>

<!-- select2 Js -->
<script src="assets/js/plugins/select2.full.min.js"></script>

<!-- sweet alert Js -->
<script src="assets/js/plugins/sweetalert.min.js"></script>
<script src="assets/js/pages/ac-alert.js"></script>

<script>
    (function(){
        var selects = document.querySelectorAll('[data-limit]');

        // percorre a lista de selects
        [].forEach.call(selects, function(select){

            var limit = select.getAttribute('data-limit');

            // percorre a lista de options do select
            [].forEach.call(select.options, function(option){
                console.log(option);
                if(option.innerHTML.length > 25) {
                    var text = option.innerHTML.substring(0, limit);
                    option.innerHTML = text + '...';
                }

            });
        });
    })();

    $(document).ready(function() {
        $('#more-details').click();
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            new PNotify.alert({
                title: 'Operação realizada',
                text: msg,
                type: 'success'
            });
        }
        $('#simpletable').DataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json"
            }
        } );
    } );
    $(function(){
        //
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
        //
        $('.confirmBtn').on('click', function(e){
            //if (!confirm('Confirma?'))
            e.preventDefault();
            var btnNome = $(this).attr('id');
            var formNome = btnNome.substr(3);
            swal({
                title: "Você tem certeza?",
                //text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: [
                    'Não, cancelar!',
                    'Sim, tenho certeza!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({title: 'Excluído!',
                        //text: 'Candidates are successfully shortlisted!',
                        icon: 'success'
                    }).then(function () {
                        $('#'+formNome).submit();
                    });
                } else {
                    swal("Cancelado", "Nada foi excluído :)", "error");
                    e.preventDefault();
                }
            });
        });
        //
        /*
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
            clearBtn: true
        });
        */
        $('.mask-number').mask('0#');
        $('.mask-currency').mask("#.##0,00", {reverse: true});
    });
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        let label = $(this).siblings('.custom-file-label');

        if (label.data('default-title') === undefined) {
            label.data('default-title', label.html());
        }

        if (fileName === '') {
            label.removeClass("selected").html(label.data('default-title'));
        } else {
            label.addClass("selected").html(fileName);
        }
    });
</script>
@stack('scripts')
</body>

</html>
