<script>
  $(function () {
    
    $('#nomorkontrak').change(function() {
        var tglkontrak = $('#nomorkontrak').find(':selected').data('tgl');
        $('#tglkontrak').val(tglkontrak);
    }).change();
    
  })
</script>