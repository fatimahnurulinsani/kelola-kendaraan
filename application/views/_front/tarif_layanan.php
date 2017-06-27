<section class='header' id='header'>
    <!-- Header Top Bar - Start -->
    <div class="topbar-wrap">
        <div class="container">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 logo-area">
                <div class="logo">
                    <div>
                        <i class="icon icon-logo white"></i>
                    </div>
                    <span class="name">SHIPPING</span>
                    <span class="small">Memberi Pelayanan Terbaik</span>
                </div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-7 col-xs-5 menu-area">
                <!-- Menu Top Bar - Start -->
                <div class="topbar">
                    <div class="menu">
                        <div class="primary inviewport animated delay2" data-effect="">
                            <div class='cssmenu'>
                                <!-- Menu - Start -->
                                <ul class='menu-ul'>
                                    <li class='has-sub'>
                                        <a href='<?php echo base_url(); ?>'>Home</a>
                                    </li>
                                    <li class='has-sub'>
                                        <a href='tarif'>Tarif Layanan</a>
                                    </li>
                                    <li class='has-sub'>
                                        <a href='tentang'>Tentang Kami</a>
                                    </li>
                                    <li class='has-sub'>
                                        <a href='hubungikami'>Hubungi Kami</a>
                                    </li>
                                </ul>
                                <!-- Menu - End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu Top Bar - End -->
                <!-- Mobile Menu - Start -->
                <div class="menu-mobile col-xs-10 pull-right cssmenu">
                    <i class="icon icon-menu menu-toggle"></i>
                    <ul class="menu" id='parallax-mobile-menu'>
                    </ul>
                </div>
                <!-- Mobile Menu - End -->
            </div>
        </div>
    </div>
    <!-- Header Top Bar - End -->
    <div class="header-bg header-small">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 slantbar hidden-xs"></div>
        <!-- Header Tracking Box - Start -->
    <!--    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 white-wrap hidden-xs">
            <div class="white-box">
                <div class="track-order">
                    <div class="track-logo transition col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <i class="icon icon-logo"></i>
                    </div>
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-9 track-form-wrap">
                        <form method='post' action="#" class="track-form">
                            <input type="text" name='track-input' placeholder="Track ID">
                            <i class="icon icon-magnify"></i>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Header Tracking Box - End -->
        <!-- Header Content Slide - Start -->
        <div style="position:relative;display:inline-block;width:100%;height:auto;">
            <img src="<?php echo base_url(); ?>assets/img/bg/tarif_bg.jpg" alt="Header Image" class="img-responsive">
            <div class="bg-overlay"></div>
            <div class="main-wrap">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 main-content">
                        <h1>Tarif Layanan<h1>
                        <div class="headul"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Content Slide - End -->
    </div>
</section>
<!-- Section End - Header -->
<!-- Section Start - Service Estimate -->
<section class='estimate' id='estimate'>
    <div class="estimate-wrap">
        <div class="row">
<!--             <div class="col-lg-8 col-md-8 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-sm-10  col-xs-offset-1 col-xs-10 ">
                <h1 class="heading left-align">Service Estimate</h1>
                <div class="headul left-align"></div>
                <p class="subheading left-align">Lorem ipsum dolor sit amet, consectetuer adipiscing elit enean commodo eget dolor aenean massa eget dolor aenean massa ipsum dolor sit amet, consectetuer adipisc</p>
            </div> -->
            <div class="col-lg-4 col-md-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-sm-10  col-xs-offset-1 col-xs-10 ">
                <!-- Estimate Form - Start -->
                <div class='row'>
                    <form action='#' method='post'>
                        <h4 class="col-md-12 last" style="margin: 25px 0;">Paket Layanan</h4>
                      <div class='col-xs-3'>
                          <label>Package</label>
                          <select id="package_id" name="package_id" class="form-control">
                            <option value="yes">YES</option>
                            <option value="reg" selected="selected">REG</option>
                            <option value="ok">OK</option>
                          </select>
                      </div>
                      <div class='col-xs-3'>
                          <label>Weight (KG)</label>
                          <input type='number' name='item_weight' value=1 placeholder='KG' class='transition' id='est_weight'>
                      </div>
                      <div class='col-xs-3'>
                          <label>Wdth/Hght</label>
                          <input type='number' name='item_size' value=0 placeholder='CM' class='transition' id='est_height'>
                      </div>
                      <!-- <div class='col-xs-3'>
                          <label>Width</label>
                          <input type='text' name='item_width' placeholder='CM' class='transition' id='est_width'>
                      </div> -->
                      <div class='col-xs-3'>
                          <label>Insurance</label>
                          <input type='number' name='insurance' value=0 class='transition' id='insurance'>
                          <!-- <input type='checkbox' name='insurance' class='transition' style="margin-top:0px;"> -->
                      </div>
                      <div class='col-xs-12'>
                          <label>City</label>
                          <select id="city_id" name="city_id" class="form-control">
                            <?php foreach ($kota as $k) { ?>
                              <option price="<?php echo $k['price']; ?>" value="<?php echo $k['id']; ?>"><?php echo $k['name']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <br>
                      <div class='col-xs-12'>
                          <label>Total (IDR) </label>
                          <input type='text' name='total_paid' placeholder='Rp' class='transition' id='total'>
                      </div>
                    </form>
                </div>
                <!-- Estimate Form - End -->
            </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pic">
                    <img src="<?php echo base_url(); ?>assets/img/bg/package.jpg" class="img-responsive style-dependent" alt="Estimate Fork Image">
                </div>
        </div>
    </div>
</section>
<!-- Section End - Service Estimate -->
<!-- Section Start - Footer -->
<section class='footer bg-black parallax ' id='footer'>
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <!-- Text Widget - Start -->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-widget inviewport animated delay1" data-effect="fadeInUp">
                <div class="logo">
                    <div>
                        <i class="icon icon-logo blue"></i>
                    </div>
                    <span class="name">SHIPPING</span>
                    <span class="small">Memberi Pelayanan Terbaik</span>
                </div>
                <p>This is a unique & creatively designed layout built in HTML+Photoshop with a modern look. All the files are well organized and named as per content. Its very easy to change any part.</p>
                <p>This is unique & creatively designed layout in HTML form.</p>
            </div>
            <!-- Text Widget - End -->
            <!-- News Widget - Start -->
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 news-widget inviewport animated delay2" data-effect="fadeInUp">
                                <h4>Berita</h4>
                                <div class="headul left-align"></div>
                                <div class="news-wrap row">
                                        <div class="pic col-md-3 col-xs-3 col-sm-3 col-lg-3">
                                                <img alt="news-image" class="img-responsive" src="<?php echo base_url(); ?>assets/img/bg/news.jpg">
                                        </div>
                                        <div class="info col-md-9 col-xs-9 col-sm-9 col-lg-9">
                                                <h5 class="title"><a href='#'>ROAD FREIGHT AND LOGISTICS AWARD OF THE YEAR</a></h5>
                                                <div class="date">21st October 2015</div>
                                        </div>
                                </div>
                                <div class="news-wrap row">
                                        <div class="pic col-md-3 col-xs-3 col-sm-3 col-lg-3">
                                                <img alt="news-image" class="img-responsive" src="<?php echo base_url(); ?>assets/img/bg/news_2.png">
                                        </div>
                                        <div class="info col-md-9 col-xs-9 col-sm-9 col-lg-9">
                                                <h5 class="title"><a href='#'>AIR FREIGHT AND LOGISTICS AWARD OF THE YEAR</a></h5>
                                                <div class="date">21st October 2015</div>
                                        </div>
                                </div>
                        </div>
            <!-- News Widget - End -->
            <!-- Contact Widget - Start -->
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 contact-widget inviewport animated delay3" data-effect="fadeInUp">
                                <h4>Contact</h4>
                                <div class="headul left-align"></div>
                                <p>Jl. Bangbayang No.27
                                        <br>Dago, Coblong,
                                        <br>Kota Bandung, 
                                        <br>Jawa Barat 40135</p>
                                <p>Email: contact@shipping.com
                                        <br> Phone: +1 234 5678 910</p>
                        </div>
            <!-- Contact Widget - End -->
        </div>
    </div>
    <!-- Copyright Bar - Start -->
    <div class="copyright">
				<div class="col-md-12">
						<div class="container">
								<div class="">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 message inviewport animated delay1" data-effect="fadeInUp">
												<span class="">&copy; 2017 </span>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 social">
												<a href="#" class="inviewport animated delay1" data-effect="fadeInUp"><i class="icon icon-facebook text-on-primary"></i></a>
												<a href="#" class="inviewport animated delay2" data-effect="fadeInUp"><i class="icon icon-twitter text-on-primary"></i></a>
												<a href="#" class="inviewport animated delay3" data-effect="fadeInUp"><i class="icon icon-dribbble text-on-primary"></i></a>
												<a href="#" class="inviewport animated delay4" data-effect="fadeInUp"><i class="icon icon-google-plus text-on-primary"></i></a>
												<a href="#" class="inviewport animated delay5" data-effect="fadeInUp"><i class="icon icon-youtube-play text-on-primary"></i></a>
										</div>
								</div>
						</div>
				</div>
		</div>
    <!-- Copyright Bar - End -->
</section>
