<script>
  function Warn(nomorkontrak, id) {
    var d = confirm("Anda yakin ingin menghapus User " + nomorkontrak);

    if (d == true) {
      window.location.href = "<?= base_url("User/delete/"); ?>" + id;
    }
  }

  $(function () {
    
    
  })
</script>