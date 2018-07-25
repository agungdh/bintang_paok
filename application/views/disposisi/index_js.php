<script type="text/javascript">
$(function() {
    $(".datatable").dataTable({
        "scrollX": true,
        "autoWidth": false,
    });
});

function proses(id) {
    swal({
        title: 'Apakah anda yakin?',
        text: "Surat akan diproses!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus!'
    }).then(function(result) {
        if (result.value) {
            window.location = "<?php echo base_url('disposisi/proses/'); ?>" + id;
       }
    });
};
</script>