 <!-- jQuery -->
 <script src="{{asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('adminlte/js/demo.js') }}"></script> 
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
  <script src="{{ asset('adminlte/js/index.js') }}"></script>

 @include('sweetalert::alert')

@stack('js')