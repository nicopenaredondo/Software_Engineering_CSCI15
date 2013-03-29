<!--
<footer class="footer" style="background-image:url('<?php echo base_url("assets/background/fishcale_pink.png");?>');">
  <div class="container">
    <p>
	    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" /></a></br>
      	© 2013 - 2014 <a href="http://github.com/nicopenaredondo">Nico R. Penaredondo</a>.
      </p>
    <p>
     	This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.
    </p>
  </div>
</footer>-->
</body>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery1.9.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wysiwyg/lib/js/wysihtml5-0.3.0.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/wysiwyg/lib/js/bootstrap-wysihtml5.js');?>"></script>
<script>
$('#blog_content').wysihtml5({
    "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis"   : true, //Italics, bold, etc. Default true
    "lists"      : true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html"       : false, //Button which allows you to edit the generated HTML. Default false
    "link"       : false, //Button to insert a link. Default true
    "image"      : false, //Button to insert an image. Default true,
    "color"      : false //Button to change color of font  
   });

$('#myModal').modal({
	show : false
});
</script>
</html>