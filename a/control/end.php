</div>

<script>
  //tool tip
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<script>
  function w3_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
  }

  function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- //pick date -->
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

  $(document).ready(function() {
    ///////
    var startDate;
    var endDate;
    $("#date_picker1").datepicker({
      dateFormat: 'dd-mm-yy'
    })
    ///////
    ///////
    $("#date_picker2").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    ///////
    $('#date_picker1').change(function() {
      startDate = $(this).datepicker('getDate');
      $("#date_picker2").datepicker("option", "minDate", startDate);
    })

    ///////
    $('#date_picker2').change(function() {
      endDate = $(this).datepicker('getDate');
      $("#date_picker1").datepicker("option", "maxDate", endDate);
    })
  })
</script>
</body>

</html>