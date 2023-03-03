<!-- Bootstrap core JavaScript -->
<script src="<?php echo KAYNAK; ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo KAYNAK; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo KAYNAK; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact form JavaScript -->
<script src="<?php echo KAYNAK; ?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo KAYNAK; ?>js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo KAYNAK; ?>js/agency.min.js"></script>
<script>
     $("#ekle").on("click",function () {
		var yorum = $("#yorum").serialize();
		$.ajax({
			url:"yorum.php",
			type:"POST",
			data:yorum,
			dataType:"JSON",
            success:function(yorum){
                alert("yorum yapıldı");

            }
	
	});
});
</script>
</body>

</html>