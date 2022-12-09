<script>
  function Warn(nomor, id) {
    var d = confirm("Anda yakin ingin menghapus Amandemen Kontrak #" + nomor);

    if (d == true) {
      window.location.href = "<?= base_url("AmandemenKontrak/delete/"); ?>" + id;
    }
  }

  $(function () {
    
    
  })
</script>