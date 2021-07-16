<script type="text/javascript">
    btnUpdate = (elem) => {
        confirmUpdate(elem).then((result) => {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append("code", $('#code').val());
            formData.append("name", $('#name').val());
            formData.append("is_active_email", $('#is_active_email').val());
            formData.append("message", CKEDITOR.instances.message.getData());
            
            // let formData = $("form").serialize();
            if (result.value) {
                let datatable = $('#notificationDatatable')
                processUpdation(elem, datatable, formData)
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