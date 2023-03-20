<?php
require_once("control/head.php");
require_once("control/sidebar.php");
?>
<style>
  img, svg {
    vertical-align: middle;
    width: 100%;
    height: 70vh;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="d-flex">
        <h1>Revenue statistics: </h1>
        <h1 id="text-date"></h1>
      </div>
      <select class="select-date" aria-label="Default select example">
        <option value="365">A year</option>
        <option value="180">Half a year</option>
        <option value="30">A month</option>
        <option value="7">A week</option>
      </select>
      <div id="chart"></div>
    </div>
    <div class="col-md-12">
      <?php 
      $total = $db->query("SELECT count(o_id) as sdh, sum(process) as pdv FROM `order`")->fetch();
      $sth = 0; // gia tri san pham 
      $tth = 0; // gia tri don hang
      $tsp = 0; // so luong san pham
      $fee = 0; // tien ship thu ve
      $discount = 0; // tien giam gia
      $tmp = $db->query("SELECT * FROM `order` INNER JOIN `details` ON `details`.o_id = `order`.o_id WHERE `details`.stt != 'Đã hủy đơn'");
      foreach($tmp as $row){
        $tsp += $row['amount'];
        $fee += $row['fee'];
        $s_id = $row['s_id']; // lay ma giam gia
        $sth = $row['amount']*$row['d_price']+$row['fee'];//tinh gia tri san pham don hang

        if($s_id != 0){ //neu co giam gia
          $sale = $db->query("SELECT * FROM `sale` WHERE `s_id` = '$s_id'")->fetch();
          $discount = $sale['discount'];
          if($sth < $discount){ //neu tiem giam > tien hang -> +0
            $tth += 0;
          }else{ // tinh tong tien don hang thu ve
            $tth += ($sth - $discount);
          }
        }else{
          $tth += $sth;
        }

      }
      ?>
      <h3><?= number_format($total['sdh'])?> orders have been purchased. </h3>
      <h3><?= number_format($tsp)?> products have been sold</h3>
      <h3>Processing-fee: <?= number_format($total['pdv'])?> VND</h3>
      <h3>Ship-fee: <?= number_format($fee)?> VND</h3>
      <h3>GMV: <?= number_format($tth+$total['pdv'])?> VND</h3>
    </div>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    thongke();
    var char = new Morris.Bar({
      // ID of the element in which to draw the chart.
      element: 'chart',
      // Chart data records -- each entry in this array corresponds to a point on
      // the chart.
      xkey: 'date',
      // A list of names of data record attributes that contain y-values.
      ykeys: ['order', 'revenue', 'quantity'],
      // Labels for the ykeys -- will be displayed when you hover over the
      // chart.
      labels: ['Đơn hàng', 'Doanh thu', 'Số sản phẩm']
    });
    // chon ngay
    $('.select-date').change(function() {
      var tgian = $(this).val();
      if (tgian == '7') {
        var text = "7 days ago";
      } else if (tgian == '30') {
        var text = "30 days ago";
      } else if (tgian == '180') {
        var text = "180 days ago";
      } else {
        var text = "365 days ago";
      }
      $.ajax({
        url: "model/thongke.php",
        method: "POST",
        dataType: "JSON",
        data: {
          tgian: tgian
        },
        success: function(data) {
          char.setData(data);
          $('#text-date').text(text);
        }
      })
    });
    // in thong ke
    function thongke() {
      var text = "365 days ago";
      $.ajax({
        url: "model/thongke.php",
        method: "POST",
        dataType: "JSON",
        success: function(data) {
          char.setData(data);
          $('#text-date').text(text);
        }
      })

    }
  });
</script>
<?php
require_once("control/end.php");

?>