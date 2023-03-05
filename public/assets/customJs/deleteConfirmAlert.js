$('.delete-confirm').on('click', function(e) {
    e.preventDefault();
    let form = $(this).closest('form');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete it!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3E97FF',
        cancelButtonColor: '#f1416c',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            form.submit();
        }
    });
});
