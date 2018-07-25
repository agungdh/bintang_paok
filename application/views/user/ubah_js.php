<script type="text/javascript">
$(function() {
    $(".select2").select2();
});

$('#simpanu').click(function(){
  $("#fu").submit();
});

$('#simpanp').click(function(){
  $("#form_ubah_password").submit();
});

$('#form_ubah_password').submit(function() {
    if ($("#pw1").val() != $("#pw2").val()) {
      swal("Error !!!", "Password Tidak Sama !!!", "error");
      return false;
    } else {
      $("#form_ubah_password").submit();      
    }
});
</script>