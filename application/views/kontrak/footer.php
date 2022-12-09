<script>
  function Warn(nomorkontrak, id) {
    var d = confirm("Anda yakin ingin menghapus kontrak #" + nomorkontrak);

    if (d == true) {
      window.location.href = "<?= base_url("Kontrak/delete/"); ?>" + id;
    }
  }

  $(function () {
    
    
  })
</script>