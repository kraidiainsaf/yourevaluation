<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('/boot4/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('/boot4/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('/boot4/css/style.css') }}" rel="stylesheet">
  <style>
  body{
	margin:0;
	padding:0;
	font-family:"arial",heletica,sans-serif;
	font-size:12px;
    background: #2980b9 url('https://static.tumblr.com/03fbbc566b081016810402488936fbae/pqpk3dn/MRSmlzpj3/tumblr_static_bg3.png') repeat 0 0;
	-webkit-animation: 10s linear 0s normal none infinite animate;
	-moz-animation: 10s linear 0s normal none infinite animate;
	-ms-animation: 10s linear 0s normal none infinite animate;
	-o-animation: 10s linear 0s normal none infinite animate;
	animation: 10s linear 0s normal none infinite animate;
 
}
 
@-webkit-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-moz-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-ms-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@-o-keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
 
@keyframes animate {
	from {background-position:0 0;}
	to {background-position: 500px 0;}
}
  </style>
</head>

<body >
<input type="hidden" value="{{$terrible}}" id="0"/>
<input type="hidden" value="{{$bad}}" id="1"/>
<input type="hidden" value="{{$okay}}" id="2"/>
<input type="hidden" value="{{$good}}" id="3"/>
<input type="hidden" value="{{$great}}" id="4"/>
<h1 style="text-align:center;font-family:georgia,garamond,serif;font-size:40px;font-style:italic;">Respons Detail</h1>
    <br>
    <br><br><br>
<div class="row" style="text-align:center;">
    
<div class="col-sm-6">
<canvas id="doughnutChart"></canvas> 
</div>
<div class="col-sm-6" style="text-align:center;" >
<table  id="dtMaterialDesignExample" class="table table-striped" cellspacing="0"  >
  <thead>
    <tr>
      <th class="th-sm">Id
      </th>
      <th class="th-sm">Respons
      </th>
      <th class="th-sm">Note
      </th>
    </tr>
  </thead>
  <tbody>
      @foreach($rslt as $r)
    <tr>
    
      <td>{{$r->id}}</td>
      @if($r->respons==0)
      <td>Terrible</td>
      @endif
      @if($r->respons==1)
      <td>Bad</td>
      @endif
      @if($r->respons==2)
      <td>Okay</td>
      @endif
      @if($r->respons==3)
      <td>Good</td>
      @endif
      @if($r->respons==4)
      <td>Great</td>
      @endif
      <td>{{$r->note}}</td>
    </tr>
   @endforeach
    </tbody>
  
</table>
</div>
</div>
<script>
$(document).ready(function () {
$('#dtMaterialDesignExample').DataTable();
$('#dtMaterialDesignExample_wrapper').find('label').each(function () {
$(this).parent().append($(this).children());
});
$('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
$('input').attr("placeholder", "Search");
$('input').removeClass('form-control-sm');
});
$('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
$('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
$('#dtMaterialDesignExample_wrapper select').removeClass(
'custom-select custom-select-sm form-control form-control-sm');
$('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
$('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
$('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
});
</script>
 <script type="text/javascript" src="{{ asset('/boot4/js/jquery-3.3.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('/boot4/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('/boot4/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('/boot4/js/mdb.min.js') }}"></script>
  <script>
  //doughnut
  var ctxD = document.getElementById("doughnutChart").getContext('2d');
  var terrible = document.getElementById("0").value;
  var bad = document.getElementById("1").value;
  var okay = document.getElementById("2").value;
  var good = document.getElementById("3").value;
  var great = document.getElementById("4").value;
  var myLineChart = new Chart(ctxD, {
    type: 'doughnut',
    data: {
        labels: ["Terrible", "Bad", "Okay", "Good", "Great"],
      datasets: [{
        data: [terrible, bad, okay, good, great],
            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
      }]
    },
    options: {
      responsive: true
    }
  });

</script>
 
</body>

</html>