$('.deleteBtn').on('click',function(e){

    const id=$(this).attr('data-id')
    $('#hiddenInput').attr('value',id);
})