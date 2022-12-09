<script>
  
  function removeemail(id){
    $('#emailke' + id).remove();
  }
    
  $(function () {

    $("#durasikontrak, #tglmulai, #satuandurasi").on("change", function(){
      var tgl = $("#tglmulai").val();
      var durasi = $("#durasikontrak").val();
      var unit = $("#satuandurasi").val();

      var tipe = '';

      switch(unit){
        case "1":
          tipe = 'd';
          break;
        case "2":
          tipe = 'M';
          break;
        case "3":
          tipe = 'y';
          break;

      }

      console.log(tgl, durasi, unit);

      if(durasi != '' && tgl != ''){

        var newtgl = moment(tgl, "DD/MM/YYYY").add(durasi, tipe).format("DD/MM/YYYY");
        $("#tglselesai").val(newtgl);
      }
    }).change();

    $("#addemail").on("click", function(){

      var count = $('.listemail').length;
      var n = count++;

      var emailnya = '<div id="emailke' + n + '" class="input-group margin listemail">' +
                        '<input type="email" class="form-control" placeholder="Masukan email user" name="emailuser[]" required>' +
                        '<span class="input-group-btn">' +
                            '<button type="button" class="btn btn-info" onclick="removeemail('+ n +')"><i class="fa fa-minus-circle"></i></button>' +
                        '</span>' +
                      '</div>';
      
      $("#emailbox").append(emailnya);

    });
  })
</script>