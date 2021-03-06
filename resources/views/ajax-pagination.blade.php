<!DOCTYPE html>
<html>
<head>
	<title>Ajax Pagination</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	 <!-- keeping jquey min ahead of all other scripts and js plugins to work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	  <!-- Font Awesome -->
</head>
<body>
	<table class="table table-bordered" id="items">
	<thead>
	  <tr>
	    <th style="text-align:center;">Item Name</th>
	    <th style="text-align:center;">Sub Item Product</th>
	    <th style="text-align:center;">Vat%</th>
	    <th style="text-align:center;">Rate</th>
	    <th style="text-align:center;">Created Date</th>  
	    <th style="text-align:center;">Action</th>
	  </tr>
	  </thead>
  <tbody id="renderstring">
  </tbody>
</table>
<div class="pagi"></div>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">

$('.pagi').on('click','.pagination a',function(event){
    event.preventDefault();
    var pagiurl = $(this).attr('href');
    $.ajax({
            url: pagiurl,
            data:"",
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            dataType: "json",
            success: function(json) {
                $('#renderstring').html(json.success);
                $('.pagi').html(json.pagi);
            }
    });
});

function renderstring()
		{
		  $.ajax({
		      url: "{{url('ajax-pagination')}}",
		      data:"",
		      headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      },
		      type:"POST",
		      dataType: "json",
		      success: function(json) {
		          $('#renderstring').html(json.success);
		          $('.pagi').html(json.pagi);
		      },
		  });
		}
	renderstring();

</script>


</body>
</html>