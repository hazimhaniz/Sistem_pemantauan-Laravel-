<script type="text/javascript">
    btnCreate = (elem) => {
        confirmCreate(elem).then((result) => {
            var formData = new FormData();
            formData.append("code", $('#code').val());
            formData.append("name", $('#name').val());
            formData.append("is_active_email", $('#is_active_email').val());
            formData.append("message", CKEDITOR.instances.message.getData());
            // for (var x = 0; x < $('#file')[0].files.length; x++) {
            //     formData.append("file[]", $('#file')[0].files[x]);
            // }

            if (result.value) {
                let datatable = $('#notificationDatatable')
                processCreation(elem, datatable, formData)
            } else {
                Swal.fire(
                    'Canceled',
                    'Process has been canceled',
                    'info'
                )
            }
        })
    }
</script>