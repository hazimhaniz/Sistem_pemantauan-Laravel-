<script type="text/javascript">
    btnUpdate = (elem) => {
        confirmUpdate(elem).then((result) => {
            let formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append("receiver_user_id", $('#receiver_user_id').val());
            formData.append("subject", $('#subject').val());
            formData.append("message", CKEDITOR.instances.message.getData());
            
            // let formData = $("form").serialize();
            if (result.value) {
                let datatable = $('#letterDatatable')
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