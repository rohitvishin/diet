<!-- Main Content -->

@include('dev.include.header')
<script>
var user_data = <?= $user_data ?>;
var user_id = <?= $user_id ?>;
</script>

@include('dev.consultant.pages.'.$url)

@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
$('.nav-link').click(async function() {
    var url = $(this).attr('data-url');
    var error = 0;
    var data = user_data;

    var userdata = user_data
    var formdata = await getDataJson()
    for (var i in formdata) {
        if (formdata[i] != userdata[i]) {
            error++;
            return show_Toaster('Please Save all the Changes', 'error')
        }
    }

    if (!error) {
        window.location.href = `consultation2?page=${url}&type={{ $type }}&user_id={{ $user_id }}`
    }

});
</script>