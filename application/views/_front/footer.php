


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/inviewport-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--Owl-->
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- Google Map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArv9ALhBv6ihfhABHEAkFg0-JHywhtgjM&amp;sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/gmap.js"></script>
<!--Fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fancybox-media.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery.fancybox.css" media="screen" />
<!-- Main JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatabels/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatabels/dataTables.bootstrap.min.js"></script>


<script>
    $("#search").click(function(e){
        $("#myModal").modal('show');
        var code = $('#track').val();
        $.ajax({
          url: '<?php echo base_url('homepage/search_code'); ?>',
          data: {'code': code}, // change this to send js object
          type: "post",
          success: function(data){
             var data2 = JSON.parse(data);
            $('#myModalLabel').html(code);
            $.each(data2, function(idx, val){
              $('#data-status').append('<tr>'+
                '<td>'+data2[idx].status+'</td>'+
                '<td>'+data2[idx].created_on+'</td>'+
              '</tr>');
            })
          }
        });
    });

$(document).ready(function() {
    $('#example').DataTable();
} );

calculate();
$("#city_id").change(function(){
    calculate();
});

function calculate(){
    var price_package_map = {"yes": 8000, "reg": 4000, "ok": 0};
    var price = parseInt($("#city_id option:selected").attr("price"));
    var total = price*$("#est_weight").val();
    var height = parseInt($("#est_height").val());
    var test = parseInt(height / 50);
    var price_package = price_package_map[$("#package_id").val()];
    var insurance = $("#insurance").val()*0.05;
    console.log(price);
    if (test > 0){
      var total_final = total + (test*10000) + price_package;
    } else {
      var total_final = total + price_package;
    }
    total_final += insurance;
    $("#total").val(total_final);
};

$("#est_weight").change(function(){
  calculate();
});

$("#est_height").change(function(){
  calculate();
});

$("#package_id").change(function(){
  calculate();
});

$("#insurance").change(function(){
  calculate();
});
</script>
</body>
</html>
