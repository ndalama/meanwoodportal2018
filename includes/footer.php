</div>
<footer class="main-footer sticky footer-type-1">
    <div class="footer-inner">
        <!-- Add your copyright text here -->
        <div class="footer-text">
            &copy; <?=$label_obj->label('copyright'); ?> <?php echo date('Y'); ?> 
            <strong><?php echo get_option('site_name'); ?></strong> <?=$label_obj->label('all_rights_reserved'); ?> 
        </div>
        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
        <div class="go-up">
            <a href="#" rel="go-top">
                <i class="fa-angle-up"></i>
            </a>
        </div>
    </div>
</footer>
	</div>
	<!--================== MainContent Area Ends Here ===========================-->
		</div>
		<!--********** Main Container End ***********-->


<script src="js/bootstrap.min.js"></script>
<script src="js/croppic.min.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea.tinyst",
	menubar : false,
	toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
	placeholder : String
 });
</script>
<script>
	var croppicContaineroutputOptions = {
			uploadUrl:'includes/img_save_to_file.php',
			cropUrl:'includes/img_crop_to_file.php', 
			outputUrlId:'cropOutput',
			modal:false,
			loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> '
	}
	var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
</script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#wc_table').dataTable();
	} );
	function confirm_delete() { 
		var del = confirm('<?=$label_obj->label("confirm_delete"); ?>');
		if(del == true) { 
			return true;
		} else { 
			return false;
		}
	}//delete_confirmation ends here.
</script>
</body>
</html>