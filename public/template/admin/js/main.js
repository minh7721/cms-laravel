$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
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
        url: '/admin/upload/services',
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
