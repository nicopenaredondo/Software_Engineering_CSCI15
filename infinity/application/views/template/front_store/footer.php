<div class="row" style="height:50px;"></div>

<footer style="background: #65605c url('<?php echo base_url('assets/background/footer.png');?>') repeat;border-top:solid #87EA00;">
  <div class="container">
    <div class="row">
      <div class="span12">
				<div class="row">
          <div class="span4">
	          <div class="widget">
              <h5>Contact</h5>
              <hr>
              <!-- <div class="social">
                      <a href="#"><i class="icon-facebook facebook"></i></a>
                      <a href="#"><i class="icon-twitter twitter"></i></a>
                      <a href="#"><i class="icon-linkedin linkedin"></i></a>
                      <a href="#"><i class="icon-google-plus google-plus"></i></a> 
                    </div>
                  <hr>-->
                  <i class="icon-home"></i> &nbsp; Sto Nino Phase 2 Meycauayan City,Bulacan,3020
                  <hr>
                  <i class="icon-thumbs-up"></i> &nbsp; +632-647-464-58
                  <hr>
                  <i class="icon-envelope"></i> &nbsp; <a href="mailto:#">nico.penaredondo@gmail.com</a>
                  <hr>

                  <div class="payment-icons">
                  	<i class="icon-certificate"></i>
                    <img src="<?php echo base_url('assets/payment/amex.gif');?>" alt="">
                    <img src="<?php echo base_url('assets/payment/visa.gif');?>" alt="">
                    <img src="<?php echo base_url('assets/payment/mastercard.gif');?>" alt="">
                    <img src="<?php echo base_url('assets/payment/discover.gif');?>" alt="">
                    <img src="<?php echo base_url('assets/payment/paypal.gif');?>" alt="">
                  </div>
                </div>
              </div>

              <div class="span4">
                <div class="widget">
                  <h5>Latest Tweets</h5>
                  <hr>
                    <div class="tweet">
                     <script>
						        new TWTR.Widget({
						          version: 2,
						          type: 'profile',
						          rpp: 10,
						          interval: 30000,
						          width: 290,
						          height: 100,
						          theme: {
						            shell: {
						              background: 'transparent',
						              color: '#FFFFFF'
						            },
						            tweets: {
						              background: 'transparent',
						              color: '#FFFFFF',
						              links: '#00a6ff'
						            }
						          },
						          features: {
						            scrollbar: false,
						            loop: false,
						            live: true,
						            behavior: 'all'
						          }
						        }).render().setUser('nrpenaredondo').start();
						        </script>
                    </div><!--tweet-->
                </div><!--widget-->
              </div><!--span4-->

              <div class="span4">
                <h5>Developers</h5>
                <hr>
                <div id="developer_image">
                <div class="widget">
                	<div class="textwidget" style="margin-left:70px;margin-top:20px;">
                	  <img style="width:150px;height:150px;"class="img-circle"src="<?php echo base_url('assets/images/nico.png');?>">
									  <br>
                    <h5 style="margin-left:15px;">Nico Penaredondo</h5>
                  </div><!-- textwidget -->
								</div><!-- widget -->
                <div class="widget">
                  <div class="textwidget" style="margin-left:70px;margin-top:20px;">
                    <img style="width:150px;height:150px;"class="img-circle"src="<?php echo base_url('assets/images/ed.png');?>">
                    <h5 style="margin-left:35px;">Edsel Pingol</h5>
                  </div><!-- textwidget -->
                </div><!-- widget -->
                <div class="widget">
                  <div class="textwidget" style="margin-left:70px;margin-top:20px;">
                    <img style="width:150px;height:150px;"class="img-circle"src="<?php echo base_url('assets/images/glen.png');?>">
                    <h5 style="margin-left:13px;">Glenwyn Lomocso</h5>
                  </div><!-- textwidget -->
                </div><!-- widget -->
                </div><!-- developer_image -->
              </div><!-- span4 -->
              </div><!-- row -->
              
            </div><!-- span12 -->

            <hr>
            <!-- Copyright info -->
            <p class="copy">Copyright © 2013 | <a href="<?php echo base_url();?>">Infinity Webshop</a> - <a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Service</a> | <a href="#">Contact Us</a></p>
      </div>
    </div>
  <div class="clearfix"></div>
  </div>
</footer>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery1.9.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.flexslider.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/widget.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/jquery.carouFredSel-6.2.0.js');?>"></script>

<script>
function onNext(parent, panel) {
hash = "#" + panel.id;
$(".acc-wizard-sidebar",$(parent))
            .children("li")
            .children("a[href='" + hash + "']")
            .parent("li")
            .removeClass("acc-wizard-todo")
            .addClass("acc-wizard-completed");
      }
$(document).ready(function() {
$('#myCart').modal('hide');
$('.flexslider').flexslider({
  animationLoop : true,
  slideshow     : true, 
  touch         : true, 
  slideshowSpeed: 2500, 
});
  // Using custom configuration
  $("#recent_items_slide").carouFredSel({
    items       : 4,
    scroll : {
      items         : 1,
      easing        : "elastic",
      duration      : 500,             
      pauseOnHover  : true
    }         
  }); 

   $("#latest_items_category_view").carouFredSel({
    items       : 1,
    direction   : "down",
    scroll : {
      items         : 2,
      easing        : "elastic",
      duration      : 500,             
      pauseOnHover  : true
    }         
  }); 

    $("#developer_image").carouFredSel({
    items       : 1,
    direction   : "right",
    scroll : {
      items         : 1,
      easing        : "elastic",
      duration      : 500,             
      pauseOnHover  : false
    }         
  }); 
});

</script> 
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'infinity0808'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>

</body>
</html>