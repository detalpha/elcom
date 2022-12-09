<script>
  function Warn(nomorkontrak, id) {
    var d = confirm("Anda yakin ingin menghapus Role " + nomorkontrak);

    if (d == true) {
      window.location.href = "<?= base_url("Role/delete/"); ?>" + id;
    }
  }

  $(function () {
    
    
  })
</script>