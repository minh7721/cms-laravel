<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

<script src="/template/js/index.js"></script>
<script src="/template/js/tailwind.config.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
            url: "{{ route('frontend.upload.store') }}",
            success: function (rs){
                if(rs.error === false){
                    $('#thumb').val(rs.url);
                }
                else {
                    alert('Upload failed');
                }
            }
        })
    });


    function removeRow(id, url){
        if (confirm('Bạn có chắc chắn muốn xóa không?')){
            $.ajax({
                type: 'DELETE',
                datatype: 'JSON',
                data: {id},
                url: url,
                success: function (result){
                    if(result.error === false){
                        alert('Xóa thành công');
                        location.reload();
                    }
                    else{
                        alert('Xóa không thành công');
                    }
                }
            })
        }
    }
    $("#listTag").on('click', function (){
        const tag = $(this).val();

        $.ajax({
            url: '/tag/'+tag,
            method: "GET",
            data:{
                tag: tag
            },
            success: function(dt){
                console.log(dt)
            },
            error: function (dt){
                console.log(dt)
            }
        })
    })

    // $('.btnSearch').on('click', function (){
    //     const search = $('.valueSearch').val();
    //     $(this).val(search);
    //     window.location = "www.example.com/index.php?q=" + search;
    //     $.ajax({
    {{--        url: {{ route('frontend.search.index') }},--}}
    //         method: "GET",
    //         data:{
    //             search: search
    //         },
    //         success: function(dt){
    //             console.log(dt)
    //         }
    //     })
    // })

</script>

@yield('footer')
