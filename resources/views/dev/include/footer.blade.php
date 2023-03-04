<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Shree Vyas</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="{{asset('assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/tooltip.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/modules/moment.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
<script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
<script src="{{asset('assets/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/modules/chart.min.js')}}"></script>
<script src="{{asset('assets/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/index.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>

<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>


<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
function show_Toaster(message, type) {
    var success = "#00b09b, #96c93d";
    var error = "#a7202d, #ff4044";
    var ColorCode = type == "success" ? success : error;

    return Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "bottom", // top or bottom
        position: "center", // left, center or right
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: `linear-gradient(to right, ${ColorCode})`,
        },
    }).showToast();
}
</script>

</body>

</html>