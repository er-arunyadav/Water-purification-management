<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Ro Management System | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/fontawesome.min.css')}}">
  <link href="{{asset('public/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('public/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  
@include('layouts.navbar')

@include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$data['title']}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @include('layouts.alerts')
      @yield('content')

       </div><!--/. container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

 
  <!-- /.control-sidebar -->

  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->

<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/dist/js/demo.js')}}"></script> 

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('public/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('public/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>


	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>


@include('layouts.script')
<script type="text/javascript">
  @if(Session::has('success'))
  toastr.success("{{Session::get('success')}}")
  @elseif(Session::has('info'))
   toastr.info("{{Session::get('info')}}")
   @elseif(Session::has('warning'))
   toastr.warning("{{Session::get('warning')}}")
  @endif
  var tbl = $('.dataTableShow');
    $('.dataTableShow').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      dom: 'Bfrtip',
        buttons: [
           
            'excelHtml5',
            
           {text: 'Download PDF',extend: 'pdfHtml5', orientation:'landscape',customize : function(doc){
            var colCount = new Array();
            $(tbl).find('tbody tr:first-child td').each(function(){
                if($(this).attr('colspan')){
                    for(var i=1;i<=$(this).attr('colspan');$i++){
                        colCount.push('*');
                    }
                }else{ colCount.push('*'); }
            });
            doc.content[1].table.widths = colCount;
        },exportOptions: {
                        columns: "thead th:not(.noExport)"
                    }
               
           }
        ],
        
    });
    
     $('.select2').select2();
        $('.datepicker').datepicker({
          format: 'dd-mm-yyyy',
        });
    
</script>
</body>
</html>
