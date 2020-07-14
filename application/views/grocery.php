<div class="row">
	<div class="col-lg-12">
		<div><?php echo $output; ?></div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){

		var urisegment = window.location.pathname.split('/');
		var baseUrl = window.location.protocol+ "//" +window.location.host+"/"+ urisegment[1] +"/";
		
		//GET CITY
	  $('select#province').on('change',function(){
	    var id = this.value;
	    $.get(baseUrl + 'member/city/'+ id, function(data){
	      $('select#city').html(data);
	    })
	  });
	})
</script>
