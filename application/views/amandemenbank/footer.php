<script>
  function Warn(nomorkontrak, id) {
    var d = confirm("Anda yakin ingin menghapus Bank Amandemen #" + nomorkontrak);

    if (d == true) {
      window.location.href = "<?= base_url("AmandemenBank/delete/"); ?>" + id;
    }
  }

  $(function () {
    
    
  })
</script>