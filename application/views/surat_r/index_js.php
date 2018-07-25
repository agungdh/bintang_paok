<script type="text/javascript">
$(function() {
	$.get("<?php echo base_url('surat_r/ajax'); ?>", function(data, status){
		$("table tbody").html(data);

		$(".datatable").dataTable({
	        "scrollX": true,
	        "autoWidth": false,
	    });
    });
});

function proses(id) {
	swal({
        title: 'Apakah anda yakin?',
        text: "Surat akan diproses!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Proses!'
    }).then(function(result) {
        if (result.value) {
            window.location = "<?php echo base_url('surat_r/proses/'); ?>" + id;
       }
    });
}

function selesaiproses(id) {
	swal({
        title: 'Apakah anda yakin?',
        text: "Surat akan diproses!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Proses!'
    }).then(function(result) {
        if (result.value) {
            window.location = "<?php echo base_url('surat_r/selesaiproses/'); ?>" + id;
       }
    });
}
</script>