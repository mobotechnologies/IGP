  <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="http://www.binary2quantum.com" class="font-weight-bold ml-1" target="_blank">Binary2Quantum</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core   -->
 
	<script src="<?php echo base_url(); ?>assets/jqueryvalid/lib/jquery.js"></script>
    
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--menuplugin -->
  <script src="<?php echo base_url(); ?>assets/menuplug/js/polyfills.js"></script>
  <script src="<?php echo base_url(); ?>assets/menuplug/js/demo2.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?php echo base_url(); ?>assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  
  

  <!--datatable-->
  
  <script src="<?php echo base_url(); ?>assets/jquery/datatables.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/jquery/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/jquery/Buttons-1.6.1/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/JSZip-2.5.0/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="<?php echo base_url();  ?>assets/jquery/Buttons-1.6.1/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/jquery/Buttons-1.6.1/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootbox/bootbox.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootbox/bootbox.locales.min.js"></script>
  <script src="<?php echo base_url();  ?>assets/js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/jquery/select2-develop/dist/js/select2.min.js"></script>
 
   <!--bootbox-->
   
	<script src="<?php echo base_url(); ?>assets/jqueryvalid/dist/jquery.validate.js"></script>
	<script>
	    $(document).ready(function(){
			$(".sendsense").on("click",function()
			{
				var id=$(".stock_inwardid").val();
				var mail1=$(".stkinmail1").val();
				var mail2=$(".stkinmail2").val();
				var mail3=$(".stkinmail13").val();
				$.ajax({
					url:"<?php echo base_url(); ?>security/sensitivemailalert_send",
					type:"Post",
					data:{id:id,em1:mail1,em2:mail2,em3:mail3},
					success:function(data)
					{
						//console.log(data);
						bootbox.alert("Mail sent successfully");
					}
				});
			});
    $(".stkinmail1").on("change",function(){
		$(".in1save").trigger("click");
	 
	//	e.preventDefault();
	});
	$(".stkinmail2").on("change",function(){
		$(".in2save").trigger("click");
	//	e.preventDefault();
	});
    $(".stkinmail3").on("change",function(){
		$(".in3save").trigger("click");
		//e.preventDefault();
	});
	 $(".stkoutmail1").on("change",function(){
		$(".e1save").trigger("click");
	 
	//	e.preventDefault();
	});
	 $(".stkoutmail2").on("change",function(){
		$(".e2save").trigger("click");
	 
	//	e.preventDefault();
	});
	 $(".stkoutmail3").on("change",function(){
		$(".e3save").trigger("click");
	 
	//	e.preventDefault();
	});
	$("#materialinward").DataTable({
       "aaSorting": [[2,'desc']],
    });
	$('#visitor').DataTable({
        "aaSorting": [[2,'desc']],
    });
	$('#cab').DataTable({
        "aaSorting": [[2,'desc']],
    });
	$('#materialoutward').DataTable({
        "aaSorting": [[2,'desc']],
    });
	$('.materialinwardreport').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel',
        ]
    });
	$('#materialoutwardreport').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel',
        ]
    });
	$('#expensereportprint').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
             'csv', 'excel',
        ]
    });
$('#designer').DataTable({
		   "aaSorting": [[2,'desc']],
		});
			 		$(".cabapprove1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/cab_approval1",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".cabreject1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/cab_approval1",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
	});
				 		$(".cabapprove2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/cab_approval",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".cabreject2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/cab_approval2",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
		});
	$(".cabapprove3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/cab_approval3",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".cabreject3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/cab_approval3",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
		});
		$(".expapprove1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/exp_approval1",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".expreject1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/exp_approval1",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
		});
				$(".expapprove2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/exp_approval2",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".expreject2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/exp_approval2",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
		});
				$(".expapprove3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/exp_approval3",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".expreject3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/exp_approval3",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
		});
		});
    </script>
	<script type="text/javascript">
		$('form').submit(function()
		{
		   if(confirm('Do you really want to submit the form?'))
		   {
			  return true;
		   }

		   return false;
		});
    </script>
    
	<script>
	    $(".alert").hide(5000);
	</script>
	<script type="text/javascript">

	function myFunction() {
		$.ajax({
			url: "<?php echo base_url(); ?>Security/view_notification",
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		 		$(".outapprove3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			   
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_approval3",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".outreject3").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			   bootbox.prompt("Enter reason for reject !", function(res){
					$.ajax(
					{
						url:"<?php echo base_url(); ?>security/stockout_approval3",
						type:"Post",
						data:{id:appid,stat:status,remark:res},
						success:function()
						{
							bootbox.alert("Rejected");
						}
					});
				});
		   }
        });
	});
		 	$('.mode').on('change', function() {
       if(this.value=="Onhand")
	   {
		    $(".vechicletypes").hide();
		    $(".vechicleno").html("Locket No");
			$(".dphones").html("Phone");
			$(".dname").html("Name");
			$(".cour").show();
	   }
	   else
	   {
		    $(".vechicletypes").show();
		   $(".vechicleno").html("Vechicle No");
			$(".dphones").html("Driver Phone");
			$(".dname").html("Driver Name");
            $(".cour").hide();
	   }
    });
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
		 
	</script>
<script>
$(document).ready(function(){
		$(".takesnap").on("click",function()
   {
       $("#results").show();
       $(".savesnap").trigger("click");
       $("#my_camera").hide();
    });
   $(".resetcam").on("click",function(){
        $("#results").hide(); 
        $("#my_camera").show();
       $(".images").reset();
   });
	$(".takesnap2").on("click",function()
   {
       $("#results2").show();
       $(".savesnap2").trigger("click");
       $("#my_camera2").hide();
    });
   $(".resetcam2").on("click",function(){
        $("#results2").hide(); 
        $("#my_camera2").show();
       $(".matimg").reset();
   });
  $(".norestrict").keypress(function(e){
    var keyCode = e.which;
    /*
    8 - (backspace)
    32 - (space)
    48-57 - (0-9)Numbers
    */
    if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
      return false;
    }
  });
   $(".charrestrict").keypress(function(e){
        var inputValue = event.which;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
  });
  	$(".in1edit").on("click",function(e){
     
        $(".email1").removeAttr("disabled");
        $(".email2").attr("disabled","disabled");
        $(".email3").attr("disabled","disabled");
        e.preventDefault();
	});
    $(".in2edit").on("click",function(e){
        $(".email2").removeAttr("disabled");
         $(".email1").attr("disabled","disabled");
        $(".email3").attr("disabled","disabled");
        e.preventDefault();
	});
     $(".in3edit").on("click",function(e){
         $(".email3").removeAttr("disabled");
         $(".email1").attr("disabled","disabled");
        $(".email2").attr("disabled","disabled");
        e.preventDefault();
	});
	  $(".in1save").on("click",function(e){

        var val=$(".email1").val();
		var iid=$(this).parent().attr('class');
        $(".email1").val(val);
        $(".email1").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/inward1update",
            type:"post",
            data:{level1:val,id:iid},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    });
    $(".in2save").on("click",function(){
          var val=$(".email2").val();
		  var iid=$(this).parent().attr('class');
          $(".email2").val(val);
          $(".email2").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/inward2update",
            type:"post",
            data:{level2:val,id:iid},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
	});
  $(".in3save").on("click",function(){
          var val=$(".email3").val();
		  var iid=$(this).parent().attr('class');
		  console.log(iid);
          $(".email3").val(val);
          $(".email3").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/inward3update",
            type:"post",
            data:{level3:val,id:iid},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    
    });
	$(".l1edit").on("click",function(e){
     
        $(".level1").removeAttr("disabled");
        $(".level2").attr("disabled","disabled");
        $(".level3").attr("disabled","disabled");
        e.preventDefault();
	});
    $(".l2edit").on("click",function(e){
        $(".level2").removeAttr("disabled");
         $(".level1").attr("disabled","disabled");
        $(".level3").attr("disabled","disabled");
        e.preventDefault();
	});
     $(".l3edit").on("click",function(e){
         $(".level3").removeAttr("disabled");
         $(".level1").attr("disabled","disabled");
        $(".level2").attr("disabled","disabled");
        e.preventDefault();
	});
		$(".l4edit").on("click",function(e){
     
        $(".level4").removeAttr("disabled");
        $(".level5").attr("disabled","disabled");
        $(".level6").attr("disabled","disabled");
        e.preventDefault();
	});
    $(".l5edit").on("click",function(e){
        $(".level5").removeAttr("disabled");
         $(".level4").attr("disabled","disabled");
        $(".level6").attr("disabled","disabled");
        e.preventDefault();
	});
     $(".l6edit").on("click",function(e){
         $(".level6").removeAttr("disabled");
         $(".level5").attr("disabled","disabled");
        $(".level4").attr("disabled","disabled");
        e.preventDefault();
	});
    $(".lsave").on("click",function(e){

        var val=$(".level1").val();
        $(".level1").val(val);
        $(".level1").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level1update",
            type:"post",
            data:{level1:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    });
    $(".l2save").on("click",function(){
          var val=$(".level2").val();
          $(".level2").val(val);
          $(".level2").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level2update",
            type:"post",
            data:{level2:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
	});
  $(".l3save").on("click",function(){
          var val=$(".level3").val();
          $(".level3").val(val);
          $(".level3").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level3update",
            type:"post",
            data:{level3:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    
    });
	 $(".l4save").on("click",function(){
          var val=$(".level4").val();
          $(".level4").val(val);
          $(".level4").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level4update",
            type:"post",
            data:{level1:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    
    });
	  $(".l5save").on("click",function(){
          var val=$(".level5").val();
          $(".level5").val(val);
          $(".level5").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level5update",
            type:"post",
            data:{level2:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    
    });
	  $(".l6save").on("click",function()
	  {
          var val=$(".level6").val();
          $(".level6").val(val);
          $(".level6").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/level6update",
            type:"post",
            data:{level3:val},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
    
    });
	    $(".e1save").on("click",function(e){
        var id=$(this).attr('data-value');
        var val=$(".level1").val();
        $(".level1").val(val);
        $(".level1").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/email1update",
            type:"post",
            data:{level1:val,id:id},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
		  e.preventDefault();
    });
    $(".e2save").on("click",function(e){
		  var id=$(this).attr('data-value');
		  console.log(id);
          var val=$(".level2").val();
          $(".level2").val(val);
          $(".level2").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/email2update",
            type:"post",
            data:{level2:val,id:id},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
		  e.preventDefault();
	});
  $(".e3save").on("click",function(e){
	      var id=$(this).attr('data-value');
		  console.log('id'+id);
          var val=$(".level3").val();
		   console.log('id'+val);
          $(".level3").val(val);
          $(".level3").attr("disabled","disabled");
        $.ajax({
           url:"<?php echo base_url() ?>Security/email3update",
            type:"post",
            data:{level3:val,id:id},
            success:function(data)
            {
                 bootbox.alert("Success");
            }
        });
      e.preventDefault();
    });
    $(".l3save").on("click",function(){
          var val=$(".level3").val();
      alert(val); 
    });

	$(".delstockin").on("click",function()
	{
		var del=$(this).attr('data-value');
		var id=$(this).parent().parent().attr('id');
		
		bootbox.confirm("Do you want to remove this record ?", function(result){
           if(result)
		   {
			   $.ajax(
				{
					url:"<?php echo base_url(); ?>security/delete_stockin",
					type:"Post",
					data:{delv:id},
					success:function()
					{
						bootbox.alert("Deleted successfully");
						$('#'+id).hide();
					}
				});
		   }
        });
	});
	$(".delstockout").on("click",function()
	{
		var del=$(this).attr('data-value');
		var id=$(this).parent().parent().attr('id');
		bootbox.confirm("Do you want to remove this record ?", function(result){
           if(result)
		   {
			   $.ajax(
				{
					url:"<?php echo base_url(); ?>security/delete_stockout",
					type:"Post",
					data:{delv:id},
					success:function()
					{
						bootbox.alert("Deleted successfully");
						$('#'+id).hide();
					}
				});
		   }
        });
	});
	$(".delvisitor").on("click",function()
	{
		var del=$(this).attr('data-value');
		var id=$(this).parent().parent().attr('id');
		bootbox.confirm("Do you want to remove this record ?", function(result){
           if(result)
		   {
			   $.ajax(
				{
					url:"<?php echo base_url(); ?>security/delete_visitor",
					type:"Post",
					data:{delv:id},
					success:function()
					{
						bootbox.alert("Deleted successfully");
						$('#'+id).hide();
					}
				});
		   }
        });
	});
	$(".delexpense").on("click",function()
	{
	    var del=$(this).attr('data-value');
		var id=$(this).parent().attr('id');
		bootbox.confirm("Do you want to remove this record ?", function(result){
           if(result)
		   {
			  
			   $.ajax(
				{
					url:"<?php echo base_url(); ?>security/delete_expense",
					type:"Post",
					data:{delv:id},
					success:function()
					{
						bootbox.alert("Deleted successfully");
						$('#'+id).hide();
					}
				});
		   }
        });
	});
	$(".delcab").on("click",function()
	{
		var del=$(this).attr('data-value');
		var id=$(this).parent().attr('id');
		//alert(id);
		bootbox.confirm("Do you want to remove this record ?", function(result){
           if(result)
		   {
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/delete_cab",
					type:"Post",
					data:{delv:id},
					success:function()
					{
						bootbox.alert("Deleted successfully");
						$("#"+id).hide();
					}
				});
		   }
        });
	});
	$(".outapprove1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_approval1",
					type:"post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".outreject1").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			    bootbox.prompt("Enter reason for reject !", function(res){
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_approval1",
					type:"Post",
					data:{id:appid,stat:status,remark:res},
					success:function()
					{
						bootbox.alert("Rejected");
					}
				});
				});
		   }
        });
	});
	$(".outapprove2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="Yes";
		bootbox.confirm("Are you sure ?", function(result){
			console.log(result);
           if(result)
		   {
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_approval2",
					type:"Post",
					data:{id:appid,stat:status},
					success:function(data)
					{
						console.log(data);
						bootbox.alert("Approved");
					}
				});
		   }
        });
	});
	$(".outreject2").on("click",function()
	{
		var appid=$(this).attr('data-value');
		var  status="No";
		bootbox.confirm("Are You sure ?", function(result){
           if(result)
		   {
			    bootbox.prompt("Enter reason for reject !", function(res){
			    $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_approval2",
					type:"Post",
					data:{id:appid,stat:status,remark:res},
					success:function()
					{
						bootbox.alert("Rejected");
					}
				});
				});
		   }
        });

	});
$(".selectsearch").select2({
  tags: true
})
	$(document).on("click",".add",function(e)
	{
	   var id=$(this).parent().parent().attr("id");
	   var n=parseInt(id)+1;
	   var cl=$(this).parent().parent().attr("class");
	   $(this).prev().remove();
	   $(this).remove();
	   $("#particules").append("<tr class='part"+n+"' id='"+n+"'><td><input type='text' name='particules[]' class='parti' placeholder='particules'/></td><td><input type='text' name='quantity[]' class='quanti'  placeholder='quantity'/></td><td><button class='btn btn-danger remove'>-</button><button class='btn btn-success add'>+</button></td></tr>");
	   e.preventDefault();
	});
	$(document).on("click",".remove",function(e){
	   	 e.preventDefault();
	    var prevclass=$(this).parent().parent().prev().attr("class");
		var curclass=$(this).parent().parent().attr("class");
		$("."+curclass).remove();
		$("."+prevclass).children().last().append("<button class='btn btn-danger remove'>-</button><button class='btn btn-success add'>+</button>");
	});

	$(".check3").change(function()
	{
		if(this.checked)
		{
			$('input[name="type"]:checked').each(function()
			{
		        if(this.value=="RGP")
			    {
					$(".rdate").show();
			    }
				else
				{
					$(".rdate").hide();
				}
		    });
		}
    });
});
</script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
	   $(".nextbutton").show();
  } else {
    document.getElementById("prevBtn").style.display = "inline";
	   $(".nextbutton").show();
  }
  if (n == (x.length - 1)) {
     $(".nextbutton").hide();
	 
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
	   $(".nextbutton").show();
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}



function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
 <!--print-->
 <script src="<?php echo base_url(); ?>assets/print/js/jQuery.print.js"></script>
 <script>
 	function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>travel/get_district",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
 </script> 
 
 <script language="JavaScript">
 $(document).ready(function(){
    
	$(".reportdate").on('change', function (e)
    {
		var optionSelected = $("option:selected", this);
	    var valueSelected = this.value; 
		if(valueSelected=="Yearly")
	    {
			$(".date").attr("hidden","hidden");
			$(".daterange").removeAttr("hidden");
		}
		else if(valueSelected=="Weekly")
		{
			$(".date").attr("hidden","hidden");
			$(".daterange").removeAttr("hidden");
		}
		else if(valueSelected=="Montly")
		{
			$(".date").attr("hidden","hidden");
			$(".daterange").removeAttr("hidden");
		}
		else
		{
			$(".date").removeAttr("hidden");
			$(".daterange").attr("hidden","hidden");
		}
		
	});
	$(".incategory").on('change', function (e)
    {
			    var optionSelected = $("option:selected", this);
			    var valueSelected = this.value; 
				if(valueSelected=="Vechicle_Type")
				{
				    $(".materialtype1").attr("hidden","hidden");
					$(".chargetype1").attr("hidden","hidden");
					$(".modetransport1").attr("hidden","hidden");
					$(".vechicletype1").removeAttr("hidden");
				
				}
				else if(valueSelected=="All")
				{
					$(".materialtype1").removeAttr("hidden");
					$(".chargetype1").removeAttr("hidden");
					$(".modetransport1").removeAttr("hidden");
					$(".vechicletype1").removeAttr("hidden");
				}
				else if(valueSelected=="Material_Type")
				{
					$(".vechicletype1").attr("hidden","hidden");
					$(".chargetype1").attr("hidden","hidden");
					$(".modetransport1").attr("hidden","hidden");
					$(".materialtype1").removeAttr("hidden");
				}
				else if(valueSelected=="Charge_Type")
				{
					$(".vechicletype1").attr("hidden","hidden");
					$(".chargetype1").attr("hidden","hidden");
					$(".modetransport1").attr("hidden","hidden");
					$(".chargetype1").removeAttr("hidden");
				}
				else
				{
					$(".materialtype1").attr("hidden","hidden");
					$(".chargetype1").attr("hidden","hidden");
					$(".vechicletype1").attr("hidden","hidden");
					$(".modetransport1").removeAttr("hidden");
				}
			
    });
	$(".inremark").on("click",function(){
		var id=$(this).parent().attr("id");
		bootbox.prompt("Remark", function(result){
			if(result!="")
			{
				 $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockin_remark",
					type:"Post",
					data:{remark:result,id:id},
					success:function()
					{
						bootbox.alert("Remark added successfully");
					}
				});
			}
			else
			{
				alert("Remark  is required");
			}
		});
	});
	$(".outremark").on("click",function(){
		var id=$(this).parent().attr("id");
		bootbox.prompt("Remark", function(result){
			if(result!="")
			{
				 $.ajax(
				{
					url:"<?php echo base_url(); ?>security/stockout_remark",
					type:"Post",
					data:{remark:result,id:id},
					success:function()
					{
						bootbox.alert("Remark added successfully");
					}
				});
			}
			else
			{
				alert("Remark  is required");
			}
		});
	});
	$(".visitremark").on("click",function(){
		var id=$(this).parent().attr("id");
		bootbox.prompt("Remark", function(result){
			if(result!="")
			{
				 $.ajax(
				{
					url:"<?php echo base_url(); ?>security/visitor_remark",
					type:"Post",
					data:{remark:result,id:id},
					success:function()
					{
						bootbox.alert("Remark added successfully");
					}
				});
			}
			else
			{
				alert("Remark  is required");
			}
		});
	});
	$(".ingout").on("click",function(){
		var id=$(this).parent().attr("id");
		var dt = new Date();
       var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$(this).remove();
		$("#"+id).append(time);
	    $.ajax(
		{
			url:"<?php echo base_url(); ?>security/stockin_gatein",
			type:"Post",
			data:{id:id},
		});
	});
    $(".outgout").on("click",function(){
		var id=$(this).parent().attr("id");
		var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$(this).remove();
		$("#"+id).append(time);
	    $.ajax(
		{
			url:"<?php echo base_url(); ?>security/stockout_gateout",
			type:"Post",
			data:{id:id},
		});
	});
	$(".visitgateout").on("click",function(){
		var id=$(this).parent().attr("id");
		var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
		$(this).remove();
		$("#"+id).append(time);
	    $.ajax(
		{
			url:"<?php echo base_url(); ?>security/visit_gateout",
			type:"Post",
			data:{id:id},
		});
	});
 });

</script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script src="<?php echo base_url(); ?>assets/chartjs/Chart.min.js"></script>
 

  
</body>

</html>