@yield('before_scripts')
@stack('before_scripts')

<script src="{{asset("ckeditor/ckeditor.js")}}"></script>
<script src="{{asset("assets_admin/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset('assets_admin/js/adminlte.min.js?v=3.2.0')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert( "Form successful submitted!" );
            }
        });
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

    // Set active state on menu element
    var full_url = "{{\URL::current()}}";
    var $navLinks = $(".main-sidebar li.nav-item a");

    // First look for an exact match including the search string
    var $curentPageLink = $navLinks.filter(
        function() { return $(this).attr('href') === full_url; }
    );

    // If not found, look for the link that starts with the url
    if(!$curentPageLink.length > 0){
        $curentPageLink = $navLinks.filter( function() {
            if ($(this).attr('href').startsWith(full_url)) {
                return true;
            }

            if (full_url.startsWith($(this).attr('href'))) {
                return true;
            }

            return false;
        });
    }
    // - the actual element is active
    $curentPageLink.each(function() {
        $(this).addClass('active');
    });
</script>

<script>
    function removeRow(id, url){
        if (confirm('B???n c?? ch???c ch???n mu???n x??a kh??ng?')){
            $.ajax({
                type: 'DELETE',
                datatype: 'JSON',
                data: {id},
                url: url,
                success: function (result){
                    if(result.error === false){
                        alert('X??a th??nh c??ng');
                        location.reload();
                    }
                    else{
                        alert('X??a kh??ng th??nh c??ng');
                    }
                }
            })
        }
    }
</script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Upload file
    $('#upload').change(function (){
        const form = new FormData();
        form.append('file', $(this)[0].files[0]);

        $.ajax({
            processData: false,
            contentType: false,
            type: 'POST',
            datatype: 'JSON',
            data: form,
            url: "{{ route('admin.upload.store') }}",
            success: function (rs){
                if(rs.error === false){
                    $('#image_show').html('<a href="'+ rs.url+'" target="_blank">' +
                        '<img src="'+rs.url+'" width="100px;" alt=""></a>');
                    $('#thumb').val(rs.url);
                }
                else {
                    alert('Upload failed');
                }

            }
        })

    });

</script>

<script>
    CKEDITOR.replace( 'content' );
</script>

{{-- Show --}}
<script>
    {{--$(".categoryTag").click(function() {--}}
    {{--    var open = $(this).data("isopen");--}}
    {{--    if(open) {--}}
    {{--        window.location.href = $(this).val()--}}
    {{--    }--}}
    {{--    //set isopen to opposite so next time when use clicked select box--}}
    {{--    //it wont trigger this event--}}
    {{--    $(this).data("isopen", !open);--}}
    {{--});--}}
    {{--$('.categoryTag').on('change', function (){--}}
    {{--    const category = $(this).val();--}}
    {{--    $.ajax({--}}
    {{--        url: "{{ route('admin.article.index') }}",--}}
    {{--        data: {--}}
    {{--            category: category--}}
    {{--        },--}}
    {{--        method: 'GET',--}}
    {{--        success: function (dt){--}}
    {{--            console.log("Oke")--}}
    {{--        }--}}
    {{--    })--}}
    {{--})--}}
    // $('.selectpicker').selectpicker('val', 'Mustard');
</script>


@yield('after_scripts')
@stack('after_scripts')
