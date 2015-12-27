<div class="main-container col2-left-layout">
				<div class="container">
					<div class="main">
						<div class="row show-grid">
							<div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 col-pull-3 hidden-xs">

								<div id="leftcatalogue"> </div><!-- leftcatalogue -->
								
								<div id="bestsellera"></div><!-- bestsellera -->
								
								<div id="saleproducta"></div><!-- sale product -->
								
								<div id="blockcompare"></div><!-- blockcompare -->
								<div id="populartags"></div><!-- populartags -->
								
								<div id="containernone"></div><!-- container-none -->
								
							</div>
							<div
								class="col-main col-lg-9 col-md-9 col-sm-9 col-push-9 col-xs-12">
								<div class="block block-subscribe popup" style="display: none;">
									<div id="popup-newsletter">
										<form
											action="<?php echo WEBPATH?>/newsletter/subscribernew"
											method="post" id="popup-newsletter-validate-detail">
											<div class="block-content">
												<p class="promo-panel-sale">
													<span>GET</span><span class="getsale">25% OFF</span><span>ON
														YOUR</span>
												</p>
												<p class="promo-panel-text">FIRST PURCHASE !</p>
												<p class="promo-panel-boder">boder</p>
												<div class="input-box">
													<input type="text" name="email" id="pnewsletter"
														title="Sign up for our newsletter"
														class="input-text required-entry validate-email" />
												</div>
												<div class="actions">
													<button type="submit" title="Subscribe !" class="button">
														<span><span>Subscribe !</span></span>
													</button>
												</div>
												<p class="promo-panel-text1">No Thank ! I’m not
													interested in this promotion</p>
												<p class="promo-panel-text2">Entering your email also
													subscribe you to the latest Smije fashion news and offers *</p>

											</div>
											<div class="subscribe-bottom">
												<input type="checkbox" name="checkboxdontshow" />Don’t show this popup again
											</div>
										</form>
										<script type="text/javascript">
											//<![CDATA[
											var newsletterSubscriberFormDetail = new VarienForm(
													'popup-newsletter-validate-detail');
											var searchForm = new Varien.searchForm(
													'popup-newsletter',
													'pnewsletter',
													'Enter Your Email Address Here...');
											//]]>
										</script>
									</div>
								</div>
								<script type="text/javascript">
									//<![CDATA[
									jQuery(document)
											.ready(
													function($) {

														(function(selector) {
															var popupCookie = Mage.Cookies.get('popupNewsletterOff');
															console.log("popupCookie :" + popupCookie);
															if (!popupCookie
																	|| popupCookie == 'undefined') {
																var $content = $(selector);
																var image = Themecfg.newsletter.background_image;
																var color = Themecfg.newsletter.background_color;
																var imageUrl = "<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/" + image;
																var popup = $( '#popup-newsletter', $content);
																var pwidth = Themecfg.newsletter.width;
																var pheight = Themecfg.newsletter.height;
																var overlay = Themecfg.newsletter.overlayColor;
																pwidth = typeof pwidth !== 'undefined' ? pwidth
																		: 800;
																pheight = typeof pheight !== 'undefined' ? pheight
																		: 400;
																overlay = typeof overlay !== 'undefined' ? overlay
																		: '#363636';
																popup .width(pwidth)
																	  .height(pheight)
																if (Themecfg.newsletter.background_image)
																	popup.css('background-image', 'url(' + imageUrl + ')');
																else if (color)
																	popup.css('background-color',color);
																$content.fancybox(
																				{
																					padding : '0px',
																					transitionIn : 'fade',
																					transitionOut : 'fade',
																					// showCloseButton: false,
																					centerOnScroll : true,
																					type : 'inline',
																					overlayColor : overlay,
																					href : '#popup-newsletter',
																				})
																		.trigger('click');
																$('.subscribe-bottom input', popup).on('click', function() {
																	                console.log('subscribe-bottom input is click');
																					if ($(this).parent().find('input:checked').length) 
																						{
																						 console.log('popupNewsletterOff is true');
																						Mage.Cookies.set('popupNewsletterOff',true);
																					} else {
																						Mage.Cookies.set('popupNewsletterOff',undefined);
																						console.log('popupNewsletterOff is undefined');
																					}
																				});
															}

														})
																(".block-subscribe.popup");
													});
									//]]>
								</script>
								<div class="std">
									<div class="slide-home">
										<div class="container-none">
											<div id="arjwbxiqak" class="iview">
												<div class="img-responsive image-important"
													data-iview-image="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/magicslider/cache/870x388//s/l/slide1-fashion.jpg"
													data-iview-transition="strip-down-right,strip-down-left,strip-up-right,strip-up-left,slide-in-right,slide-in-down,left-curtain,bottom-curtain,fade,block-random,block-fade,block-fade-reverse">
													<div class="iview-slide-right">
														<div class="iview-caption caption5" data-x="573"
															data-y="43" data-height="20" data-transition="fade">Are
															you Ready ?</div>
														<div class="iview-caption caption1 blackcaption"
															data-x="509" data-y="104">Sweater*</div>
														<div class="iview-caption caption3 blackcaption"
															data-x="468" data-y="170" data-height="26"
															data-width="500">Biggest Arrival of the Month</div>
														<div class="iview-caption caption4 blackcaption"
															data-x="537" data-y="208" data-height="28">*Hurry
															in December 10th - 16th !</div>
														<div class="iview-caption caption6 blackcaption"
															data-x="579" data-y="255" data-height="43"
															data-width="200">View more</div>
													</div>
												</div>
												<div class="img-responsive image-important"
													data-iview-image="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/magicslider/cache/870x388//s/l/slide2-fashion.jpg"
													data-iview-transition="strip-down-right,strip-down-left,strip-up-right,strip-up-left,slide-in-right,slide-in-down,left-curtain,bottom-curtain,fade,block-random,block-fade,block-fade-reverse">
													<div class="iview-slide-right">
														<div class="iview-caption caption5" data-x="573"
															data-y="43" data-height="20" data-transition="fade">New
															Arrivals !</div>
														<div class="iview-caption caption1 blackcaption"
															data-x="489" data-y="104" data-width="500">JK-
															Outet*</div>
														<div class="iview-caption caption3 blackcaption"
															data-x="448" data-y="170" data-height="26"
															data-width="500">Take cover - latest Accessories</div>
														<div class="iview-caption caption4 blackcaption"
															data-x="537" data-y="208" data-height="28">*Hurry
															in December 10th - 16th !</div>
														<div class="iview-caption caption6 blackcaption"
															data-x="579" data-y="255" data-height="43"
															data-width="200">View more</div>
													</div>
												</div>
											</div>
										</div>


										<script type="text/javascript">
											jQuery(document).ready(function($) {
												$('#arjwbxiqak').iView({
													// pauseTime: 7000,
													// directionNav: false,
													// controlNav: true,
													// controlNavNextPrev: true,
													// controlNavTooltip: true, // Show tooltip image previewer
													// pauseOnHover: true,
													// timerBarStroke: 0, // hide timerBar
													timerOpacity : 0, // hide timerBar
													pauseOnHover : true,
													pauseTime : 7000,
													controlNav : 1,
													controlNavNextPrev : 1,
													controlNavTooltip : false,
													directionNav : 1,
												});
											});
										</script>

									</div>
									<div>
										<div class="cxumzaxcno magicproduct">
										<?php $Product_FEATURED_PRODUCTS = $this->layout ()->Product_FEATURED_PRODUCTS;?>
											<div class="block-title-tabs">
												<ul class="magictabs"
													data-ajax='{"limit":"10","productDelay":null,"widthImages":"290","heightImages":"372","action":"cart,compare,wishlist,review"}'>
													<li class="item active loaded " data-type="featured"><span
														class="title">Featured Products(<?php echo count($Product_FEATURED_PRODUCTS);?>) </span></li>
													<li class="item " data-type="newproduct"><span
														class="title">New Products</span></li>
													<li class="item " data-type="saleproduct"><span
														class="title">Sale Products</span></li>
												</ul>
											</div>
											<div class="ajax_loading" style="display: none"
												data-url="<?php echo WEBPATH?>/magicproduct/index/ajax">
												<img
													src="<?php echo BAG_REAL_HTML; ?>/smije/skin/frontend/alosmije/default/magiccart/plugin/images/loading.gif"
													alt="Loading..." />
											</div>
											<div class="content-products" data-margin="30"
												data-slider='{"margin":30,"autoPlaySpeed":3000,"enableResponsiveBreakpoints":1,"visibleItems":4,"responsiveBreakpoints":{"portrait":{"changePoint":480,"visibleItems":2},"landscape":{"changePoint":640,"visibleItems":2},"tablet":{"changePoint":768,"visibleItems":3},"desktop":{"changePoint":992,"visibleItems":3}}}'
												data-options='{"480":"2","640":"2","768":"3","992":"3","993":"4"}'>

												<div class="mage-magictabs mc-featured">
													<div class="nbs-flexisel-container">
													<div class="nbs-flexisel-inner">
													<ul class="flexisel-content products-grid featured zoomOut play nbs-flexisel-ul" style="left: -30px;">
                                  
													
													
                                  <?php 
//                                   echo "Product_FEATURED_PRODUCTS </br>";
//                                   echo "<pre>";
//                                   print_r($Product_FEATURED_PRODUCTS);
//                                   echo "</pre>";
                                     $delay_efex_fea = 0;
                                     
											foreach ($Product_FEATURED_PRODUCTS as $key =>$Product_WEEKLY_FEATURED_featured)
											{
												//$delay_efex_fea = $delay_efex_fea + 500;
												?>
														<li style="animation-delay: <?php echo $delay_efex_fea;?>ms; -webkit-animation-delay: <?php echo $delay_efex_fea;?>ms; -moz-animation-delay: <?php echo $delay_efex_fea;?>ms; -o-animation-delay: <?php echo $delay_efex_fea;?>ms; margin-left: 30px; width: 189.5px;" class="item item-animate nbs-flexisel-item">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<span class="sticker top-left"><span class="labelnew">New</span></span> 
																			<?php
																		 $img_featured = '';
																		 if($Product_WEEKLY_FEATURED_featured->img !='' || $Product_WEEKLY_FEATURED_featured->img != null) { $img_featured =$Product_WEEKLY_FEATURED_featured->img; }
																		 if( ($Product_WEEKLY_FEATURED_featured->img =='' and $Product_WEEKLY_FEATURED_featured->img0 !='' ) || ($Product_WEEKLY_FEATURED_featured->img == null and $Product_WEEKLY_FEATURED_featured->img0 !='' ) ) { $img_featured =$Product_WEEKLY_FEATURED_featured->img0; }
																		 if($Product_WEEKLY_FEATURED_featured->img =='' and $Product_WEEKLY_FEATURED_featured->img0 =='' and $Product_WEEKLY_FEATURED_featured->img1 !='' ) { $img_featured =$Product_WEEKLY_FEATURED_featured->img1; }
																		 if($Product_WEEKLY_FEATURED_featured->img == null and $Product_WEEKLY_FEATURED_featured->img0 ==null and $Product_WEEKLY_FEATURED_featured->img1 !='' ) { $img_featured =$Product_WEEKLY_FEATURED_featured->img1; }
																		 if($Product_WEEKLY_FEATURED_featured->img == null and $Product_WEEKLY_FEATURED_featured->img0 ==null and $Product_WEEKLY_FEATURED_featured->img1 == null ) { $img_featured = 'default.jpg'; }
																		 
																		?>	
																		<!-- 290x372:widthxHeight -->
																			<a 	href="<?php echo WEBPATH;?>/product/index/view/<?php echo $Product_WEEKLY_FEATURED_featured->id;?>"
																			title="<?php echo $Product_WEEKLY_FEATURED_featured->name;?>">
																			<img class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/_/1_1.jpg"
																			width="290" height="372" alt="Plaid Cotton Shirt" />

																			<span class="product-img-back"> <img
																				class="img-responsive" src="<?php echo WEBPATH_UPLOAD_PATH_IMG_THUNB_.'/'.$img_featured; ?>"
																				width="290" height="372" alt="<?php echo $Product_WEEKLY_FEATURED_featured->name;?>" />
																		</span>
																		</a>
																	</div>
																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/25/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/25/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/25/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
																
																
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a href="<?php echo WEBPATH;?>/product/index/view/<?php echo $Product_WEEKLY_FEATURED_featured->id;?>"
																			title="<?php echo $Product_WEEKLY_FEATURED_featured->name;?>"><?php echo $Product_WEEKLY_FEATURED_featured->name;?></a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																		<?php if($Product_WEEKLY_FEATURED_featured->rating !='' || $Product_WEEKLY_FEATURED_featured->rating != null) { 
																			if(is_numeric($Product_WEEKLY_FEATURED_featured->rating) and $Product_WEEKLY_FEATURED_featured->rating >=0 )
																			{
																			 $rate_featured = @floor((($Product_WEEKLY_FEATURED_featured->rating)/10)*100);
																			}else $rate_featured = 0;
																		} else $rate_featured = 0;?>
																			<div class="rating" style="width: <?php echo $rate_featured;?>%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/25/'; return false;">1 Review(s)</a></span>
																	</div>



																	<div class="price-box">
																	<?php 
																if($Product_WEEKLY_FEATURED_featured->price !='' || $Product_WEEKLY_FEATURED_featured->price != null) {	
																	if(is_numeric($Product_WEEKLY_FEATURED_featured->price) and $Product_WEEKLY_FEATURED_featured->price >=0 )
																	{
																	$number_featured = $Product_WEEKLY_FEATURED_featured->price;
																	$format_number_featured = number_format($number, 0, '', '.');
																	 }else  {  $format_number_featured = 0; }
																 }else  $format_number_featured = 0; ?>
																		<span class="regular-price" id="product-price-25">
																			<span class="price">$<?php echo $format_number_featured;?></span>
																		</span>

																	</div>

																</div>
															</div>
														</li>
														
													<?php }//end for
													
													?>	
													

													</ul>
													<div class="nbs-flexisel-nav">
													<div class="nbs-flexisel-nav-left" style="top: 159.5px;"></div>
													<div class="nbs-flexisel-nav-right" style="top: 159.5px;">
													</div>
													</div>
													</div>
													</div>
												
												</div>


											</div>
											<!-- MAP -->
											<!-- MAP -->
										</div>

										<script type="text/javascript">
											jQuery(document)
													.ready(
															function() {
																jQuery(
																		".cxumzaxcno")
																		.magicproduct(
																				{
																					selector : ".cxumzaxcno", // Selector product grid
																				});
															});
										</script>

									</div>
									<div class="weekly-produc">
										<div class="xfuxftvddh magiccategory">
											<div class="magic-category">
											<?php $Product_WEEKLY_FEATURED = $this->layout ()->Product_WEEKLY_FEATURED;?>
												<div class="block-title-tabs clearfix">
													<h3 class="title">WEEKLY FEATURED(<?php echo count($Product_WEEKLY_FEATURED)?>)</h3>
													<ul class="magictabs"
														data-ajax='{"limit":"10","productDelay":"500","widthImages":"290","heightImages":"372","action":"cart,compare,wishlist,review","types":"latest"}'>
														<li class="item " data-type="90"><span class="title">Shirts</span></li>
														<li class="item active loaded" data-type="91"><span
															class="title">Outerwear</span></li>
														<li class="item " data-type="93"><span class="title">Accessories</span></li>
													</ul>
												</div>
											</div>
											<div class="ajax_loading" style="display: none"
												data-url="<?php echo WEBPATH?>/magiccategory/index/ajax">
												<img src="<?php echo BAG_REAL_HTML; ?>/smije/skin/frontend/alosmije/default/magiccart/plugin/images/loading.gif" 	alt="Loading..." />
											</div>
											<div class="content-products" data-margin="30" data-slider='null' data-options='{"480":"2","640":"3","768":"3","992":"4","993":"5"}'>

												<div class="mage-magictabs mc-91">
													<ul class="flexisel-content products-grid 91 zoomOut play">
										<?php $delay_efex = 0;
											foreach ($Product_WEEKLY_FEATURED as $key =>$Product_WEEKLY_FEATURED_tmp)
											{
												$delay_efex = $delay_efex + 500;
												?>
												<li style="-webkit-animation-delay: <?php echo $delay_efex;?>ms; -moz-animation-delay: <?php echo $delay_efex;?>ms; -o-animation-delay: <?php echo $delay_efex;?>ms; animation-delay: <?php echo $delay_efex;?>ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																	  <?php
																		 $img_weeklyFe = '';
																		 if($Product_WEEKLY_FEATURED_tmp->img !='' || $Product_WEEKLY_FEATURED_tmp->img != null) { $img_weeklyFe =$Product_WEEKLY_FEATURED_tmp->img; }
																		 if( ($Product_WEEKLY_FEATURED_tmp->img =='' and $Product_WEEKLY_FEATURED_tmp->img0 !='' ) || ($Product_WEEKLY_FEATURED_tmp->img == null and $Product_WEEKLY_FEATURED_tmp->img0 !='' ) ) { $img_weeklyFe =$Product_WEEKLY_FEATURED_tmp->img0; }
																		 if($Product_WEEKLY_FEATURED_tmp->img =='' and $Product_WEEKLY_FEATURED_tmp->img0 =='' and $Product_WEEKLY_FEATURED_tmp->img1 !='' ) { $img_weeklyFe =$Product_WEEKLY_FEATURED_tmp->img1; }
																		 if($Product_WEEKLY_FEATURED_tmp->img == null and $Product_WEEKLY_FEATURED_tmp->img0 ==null and $Product_WEEKLY_FEATURED_tmp->img1 !='' ) { $img_weeklyFe =$Product_WEEKLY_FEATURED_tmp->img1; }
																		 if($Product_WEEKLY_FEATURED_tmp->img == null and $Product_WEEKLY_FEATURED_tmp->img0 ==null and $Product_WEEKLY_FEATURED_tmp->img1 == null ) { $img_weeklyFe = 'default.jpg'; }
																		 
																		?>	
																		<a href="<?php echo WEBPATH;?>/product/index/view/<?php echo $Product_WEEKLY_FEATURED_tmp->id;?>"
																			title="<?php echo $Product_WEEKLY_FEATURED_tmp->name;?>"
																			class="product-image"> 
																		
																		<!-- 290x372:widthxHeight -->
																			<img
																			class="img-responsive" 
																			src="<?php echo WEBPATH_UPLOAD_PATH_IMG_THUNB_.'/'.$img_weeklyFe; ?>"
																			width="290" height="372"
																			alt="<?php echo $Product_WEEKLY_FEATURED_tmp->name;?>" /> 
																			<span class="product-img-back"> 
																			<img
																				class="img-responsive"
																				src="<?php echo WEBPATH_UPLOAD_PATH_IMG_THUNB_.'/'.$img_weeklyFe; ?>"
																				width="290" height="372"
																				alt="<?php echo $Product_WEEKLY_FEATURED_tmp->name;?>" />
																		   </span>
																		</a>
																	</div>
																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/39/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/39/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/39/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a href="<?php echo WEBPATH;?>/eshopbags/suede-loafer-navy.html"
																			title="<?php echo $Product_WEEKLY_FEATURED_tmp->name;?>"><?php echo $Product_WEEKLY_FEATURED_tmp->name;?></a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																		<?php if($Product_WEEKLY_FEATURED_tmp->rating !='' || $Product_WEEKLY_FEATURED_tmp->rating != null) { 
																			if(is_numeric($Product_WEEKLY_FEATURED_tmp->rating) and $Product_WEEKLY_FEATURED_tmp->rating >=0 )
																			{
																			 $rate = @floor((($Product_WEEKLY_FEATURED_tmp->rating)/10)*100);
																			}else $rate = 0;
																		} else $rate = 0;?>
																			<div class="rating" style="width: <?php echo $rate;?>%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/39/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																	<?php 
																if($Product_WEEKLY_FEATURED_tmp->price !='' || $Product_WEEKLY_FEATURED_tmp->price != null) {	
																	if(is_numeric($Product_WEEKLY_FEATURED_tmp->price) and $Product_WEEKLY_FEATURED_tmp->price >=0 )
																	{
																	$number = $Product_WEEKLY_FEATURED_tmp->price;
																	$format_number = number_format($number, 0, '', '.');
																	 }else  {  $format_number = 0; }
																 }else  $format_number = 0;
																	?>
																		<span class="regular-price" id="product-price-<?php echo $Product_WEEKLY_FEATURED_tmp->id;?>">
																			<span class="price">$<?php echo $format_number;?></span>
																		</span>

																	</div>

																</div>
															</div>
														</li>
												
										<?php 		
											}// end foreach
										?>
										
													</ul>
												</div>


											</div>
											<!-- MAP -->
											<!-- MAP -->
										</div>

										<script type="text/javascript">
											jQuery(document)
													.ready(
															function() {
																jQuery(
																		".xfuxftvddh")
																		.magicproduct(
																				{
																					selector : ".xfuxftvddh", // Selector product grid
																				});
															});
										</script>

									</div>
									<div class="row">
										<div class="banner-top banner1">
											<div
												class="banner-inner col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="banner-inner-content">
													<div class="overlay">&nbsp;</div>
													<a href="#"> <img class="img-responsive"
														src="<?php echo BAG_REAL_HTML; ?>/smije/media/wysiwyg/alothemes/static/banner-content1-fashion.jpg"
														alt="" />
													</a>
													<div class="text-banner text-banner-1">
														<h2>sweater</h2>
														<span class="border-bottom">&nbsp;</span>
													</div>
												</div>
											</div>
										</div>
										<div class="banner-top banner2">
											<div
												class="banner-inner col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="banner-inner-content">
													<div class="overlay">&nbsp;</div>
													<a href="#"> <img class="img-responsive"
														src="<?php echo BAG_REAL_HTML; ?>/smije/media/wysiwyg/alothemes/static/banner-content2-fashion.jpg"
														alt="" />
													</a>
													<div class="text-banner text-banner-2">
														<h2>OUTLET</h2>
														<span class="border-bottom">&nbsp;</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="qdzzaaxirx magicproduct">
													<div class="block-title-tabs">
														<ul class="magictabs"
															data-ajax='{"limit":"4","productDelay":null,"widthImages":"290","heightImages":"372","action":"cart,compare,wishlist,review"}'>
															<li class="item active loaded single" data-type="random"><span
																class="title">Random Products</span></li>
														</ul>
													</div>
													<div class="ajax_loading" style="display: none"
														data-url="<?php echo WEBPATH?>/magicproduct/ajax/index">
														<img
															src="<?php echo BAG_REAL_HTML; ?>/smije/skin/frontend/alosmije/default/magiccart/plugin/images/loading.gif"
															alt="Loading..." />
													</div>
													<div class="content-products" data-margin="30"
														data-slider='{"margin":30,"autoPlaySpeed":3000,"enableResponsiveBreakpoints":1,"pauseOnHover":1,"visibleItems":2,"responsiveBreakpoints":{"portrait":{"changePoint":480,"visibleItems":2},"landscape":{"changePoint":640,"visibleItems":2},"tablet":{"changePoint":768,"visibleItems":3},"desktop":{"changePoint":992,"visibleItems":2}}}'
														data-options='{"480":"2","640":"2","768":"3","992":"2","993":"2"}'>

														<div class="mage-magictabs mc-random">
															<ul
																class="flexisel-content products-grid random zoomOut play">

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/flat-front-trouser.html"
																					title="Flat Front Trouser" class="product-image">
																					<img class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/-/7-7_3.jpg"
																					width="290" height="372" alt="Flat Front Trouser" />

																					<span class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/_/7_1_7.jpg"
																						width="290" height="372" alt="Flat Front Trouser" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/37/form_key/CNujFwNHOtvHnMY6/')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/37/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/37/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/flat-front-trouser.html"
																					title="Flat Front Trouser">Flat Front Trouser</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 80%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/37/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-37">
																					<span class="price">$345.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/luggage-set.html"
																					title="Luggage Set" class="product-image"> <img
																					class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/5/15_3.jpg"
																					width="290" height="372" alt="Luggage Set" /> <span
																					class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/7/17_4.jpg"
																						width="290" height="372" alt="Luggage Set" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/40/form_key/CNujFwNHOtvHnMY6/')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/40/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/40/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/luggage-set.html"
																					title="Luggage Set">Luggage Set</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 80%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/40/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-40">
																					<span class="price">$562.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/roller-suitcase.html"
																					title="Roller Suitcase" class="product-image">
																					<img class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/7/17_2.jpg"
																					width="290" height="372" alt="Roller Suitcase" />

																					<span class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/5/15_1.jpg"
																						width="290" height="372" alt="Roller Suitcase" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/30/form_key/CNujFwNHOtvHnMY6/')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/34/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/30/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/roller-suitcase.html"
																					title="Roller Suitcase">Roller Suitcase</a>
																			</h2>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-30">
																					<span class="price">$456.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/plaid-cotton-shirt-54.html"
																					title="Plaid Cotton Shirt" class="product-image">
																					<img class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/_/7_1_6.jpg"
																					width="290" height="372" alt="Plaid Cotton Shirt" />

																					<span class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/-/7-7_2.jpg"
																						width="290" height="372" alt="Plaid Cotton Shirt" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/36/form_key/CNujFwNHOtvHnMY6/')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/34/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/36/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/plaid-cotton-shirt-54.html"
																					title="Plaid Cotton Shirt">Plaid Cotton Shirt</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 60%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/36/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-36">
																					<span class="price">$234.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>
															</ul>
														</div>


													</div>
													<!-- MAP -->
													<!-- MAP -->
												</div>

												<script type="text/javascript">
													jQuery(document)
															.ready(
																	function() {
																		jQuery(
																				".qdzzaaxirx")
																				.magicproduct(
																						{
																							selector : ".qdzzaaxirx", // Selector product grid
																						});
																	});
												</script>

											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="tuvoguoewb magicproduct">
													<div class="block-title-tabs">
														<ul class="magictabs"
															data-ajax='{"limit":"3","productDelay":null,"widthImages":"290","heightImages":"372","action":"cart,compare,wishlist,review"}'>
															<li class="item active loaded single"
																data-type="mostviewed"><span class="title">Most
																	Viewed</span></li>
														</ul>
													</div>
													<div class="ajax_loading" style="display: none"
														data-url="<?php echo WEBPATH?>/magicproduct/ajax/index">
														<img
															src="<?php echo BAG_REAL_HTML; ?>/smije/skin/frontend/alosmije/default/magiccart/plugin/images/loading.gif"
															alt="Loading..." />
													</div>
													<div class="content-products" data-margin="30"
														data-slider='{"margin":30,"autoPlaySpeed":3000,"enableResponsiveBreakpoints":1,"pauseOnHover":1,"visibleItems":2,"responsiveBreakpoints":{"portrait":{"changePoint":480,"visibleItems":2},"landscape":{"changePoint":640,"visibleItems":2},"tablet":{"changePoint":768,"visibleItems":3},"desktop":{"changePoint":992,"visibleItems":2}}}'
														data-options='{"480":"2","640":"2","768":"3","992":"2","993":"2"}'>

														<div class="mage-magictabs mc-mostviewed">
															<ul
																class="flexisel-content products-grid mostviewed zoomOut play">

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<span class="sticker top-left"><span
																					class="labelnew">New</span></span> <a
																					href="<?php echo WEBPATH?>/plaid-cotton-shirt.html"
																					title="Plaid Cotton Shirt" class="product-image">
																					<img class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/_/1_1.jpg"
																					width="290" height="372" alt="Plaid Cotton Shirt" />

																					<span class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/-/1-1.jpg"
																						width="290" height="372" alt="Plaid Cotton Shirt" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/25/form_key/CNujFwNHOtvHnMY6/')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/34/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/25/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/plaid-cotton-shirt.html"
																					title="Plaid Cotton Shirt">Plaid Cotton Shirt</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 100%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/25/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-25">
																					<span class="price">$185.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/flat-front-trouser.html"
																					title="Flat Front Trouser" class="product-image">
																					<img class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/-/7-7_3.jpg"
																					width="290" height="372" alt="Flat Front Trouser" />

																					<span class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/_/7_1_7.jpg"
																						width="290" height="372" alt="Flat Front Trouser" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions" id="phuctest37prodct">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/37/form_key/CNujFwNHOtvHnMY6')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/34/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/37/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/flat-front-trouser.html"
																					title="Flat Front Trouser">Flat Front Trouser</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 80%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/37/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-37">
																					<span class="price">$345.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>

																<li
																	style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
																	class="item item-animate">
																	<div class="per-product">
																		<div class="images-container">
																			<div class="product-hover">
																				<a
																					href="<?php echo WEBPATH?>/tori-tank.html"
																					title="Tori Tank" class="product-image"> <img
																					class="img-responsive"
																					src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/6/_/6_5.jpg"
																					width="290" height="372" alt="Tori Tank" /> <span
																					class="product-img-back"> <img
																						class="img-responsive"
																						src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/6/-/6-6_1.jpg"
																						width="290" height="372" alt="Tori Tank" />
																				</span>
																				</a>
																			</div>
																			<div class="actions-no">
																				<div class="actions">
																					<button type="button" title="Add to Cart"
																						class="pull-left button btn-cart"
																						onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/34/form_key/CNujFwNHOtvHnMY6')">
																						<span><span>Add to Cart</span></span>
																					</button>
																					<ul class="add-to-links pull-left">
																						<li class="pull-left"><a
																							href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/34/CNujFwNHOtvHnMY6"
																							title="Add to Wishlist" class="link-wishlist">Add
																								to Wishlist</a></li>
																						<li class="pull-right"><span
																							class="separator">|</span> <a
																							href="<?php echo WEBPATH?>/catalog/product_compare/add/product/34/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																							title="Add to Compare" class="link-compare">Add
																								to Compare</a></li>
																					</ul>
																				</div>
																			</div>
																		</div>
																		<div class="products-textlink clearfix">
																			<h2 class="product-name">
																				<a
																					href="<?php echo WEBPATH?>/tori-tank.html"
																					title="Tori Tank">Tori Tank</a>
																			</h2>
																			<div class="ratings">
																				<div class="rating-box">
																					<div class="rating" style="width: 60%"></div>
																				</div>
																				<span class="amount"><a href="#"
																					onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/34/'; return false;">1
																						Review(s)</a></span>
																			</div>



																			<div class="price-box">
																				<span class="regular-price" id="product-price-34">
																					<span class="price">$234.00</span>
																				</span>

																			</div>

																		</div>
																	</div>
																</li>
															</ul>
														</div>


													</div>
													<!-- MAP -->
													<!-- MAP -->
												</div>

												<script type="text/javascript">
													jQuery(document)
															.ready(
																	function() {
																		jQuery(
																				".tuvoguoewb")
																				.magicproduct(
																						{
																							selector : ".tuvoguoewb", // Selector product grid
																						});
																	});
												</script>

											</div>
										</div>
									</div>
									<div>
										<div class="tthnrmgmqj magicproduct">
											<div class="block-title-tabs">
												<ul class="magictabs"
													data-ajax='{"limit":"6","productDelay":"500","widthImages":"290","heightImages":"372","action":"cart,compare,wishlist,review"}'>
													<li class="item active loaded single" data-type="latest"><span
														class="title">Latest Products</span></li>
												</ul>
											</div>
											<div class="ajax_loading" style="display: none"
												data-url="<?php echo WEBPATH?>/magicproduct/ajax/index">
												<img
													src="<?php echo BAG_REAL_HTML; ?>/smije/skin/frontend/alosmije/default/magiccart/plugin/images/loading.gif"
													alt="Loading..." />
											</div>
											<div class="content-products product-bestsellers"
												data-margin="18" data-slider='null'
												data-options='{"480":"2","640":"3","768":"3","992":"3","993":"3"}'>

												<div class="mage-magictabs mc-latest">
													<ul
														class="flexisel-content products-grid latest zoomOut play">

														<li
															style="-webkit-animation-delay: 0ms; -moz-animation-delay: 0ms; -o-animation-delay: 0ms; animation-delay: 0ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a
																			href="http://localhost/demo/houston-travel-wallet.html"
																			title="Houston Travel Wallet" class="product-image">
																			<img class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/6/16_5.jpg"
																			width="290" height="372" alt="Houston Travel Wallet" />

																			<span class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/4/14_5.jpg"
																				width="290" height="372" alt="Houston Travel Wallet" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a
																			href="<?php echo WEBPATH?>/houston-travel-wallet.html"
																			title="Houston Travel Wallet">Houston Travel
																			Wallet</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 60%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/42/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-42">
																			<span class="price">$156.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/42/form_key/CNujFwNHOtvHnMY6')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/42/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/42/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>

														<li
															style="-webkit-animation-delay: 500ms; -moz-animation-delay: 500ms; -o-animation-delay: 500ms; animation-delay: 500ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a
																			href="<?php echo WEBPATH?>/broad-st-flapover.html"
																			title="Broad St. Flapover" class="product-image">
																			<img class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/8/18_6.jpg"
																			width="290" height="372" alt="Broad St. Flapover" />

																			<span class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/4/14_4.jpg"
																				width="290" height="372" alt="Broad St. Flapover" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a
																			href="<?php echo WEBPATH?>/broad-st-flapover.html"
																			title="Broad St. Flapover">Broad St. Flapover</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 60%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/41/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-41">
																			<span class="price">$234.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/41/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/41/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/41/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>

														<li
															style="-webkit-animation-delay: 1000ms; -moz-animation-delay: 1000ms; -o-animation-delay: 1000ms; animation-delay: 1000ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a
																			href="<?php echo WEBPATH?>/luggage-set.html"
																			title="Luggage Set" class="product-image"> <img
																			class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/5/15_3.jpg"
																			width="290" height="372" alt="Luggage Set" /> <span
																			class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/7/17_4.jpg"
																				width="290" height="372" alt="Luggage Set" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a
																			href="<?php echo WEBPATH?>/luggage-set.html"
																			title="Luggage Set">Luggage Set</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 80%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/40/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-40">
																			<span class="price">$562.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/40/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/40/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/40/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>

														<li
															style="-webkit-animation-delay: 1500ms; -moz-animation-delay: 1500ms; -o-animation-delay: 1500ms; animation-delay: 1500ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a href="<?php echo WEBPATH;?>/eshopbags/suede-loafer-navy.html"
																			title="Dorian Perforated Oxford"
																			class="product-image"> <img
																			class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/2/12_6.jpg"
																			width="290" height="372"
																			alt="Dorian Perforated Oxford" /> <span
																			class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/3/13_5.jpg"
																				width="290" height="372"
																				alt="Dorian Perforated Oxford" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a href="<?php echo WEBPATH;?>/eshopbags/suede-loafer-navy.html"
																			title="Dorian Perforated Oxford">Dorian
																			Perforated Oxford</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 100%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/39/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-39">
																			<span class="price">$345.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/39/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/39/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/39/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>

														<li
															style="-webkit-animation-delay: 2000ms; -moz-animation-delay: 2000ms; -o-animation-delay: 2000ms; animation-delay: 2000ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a
																			href="<?php echo WEBPATH?>/wingtip-cognac-oxford.html"
																			title="Wingtip Cognac Oxford" class="product-image">
																			<img class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/3/13_4.jpg"
																			width="290" height="372" alt="Wingtip Cognac Oxford" />

																			<span class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/1/2/12_5.jpg"
																				width="290" height="372" alt="Wingtip Cognac Oxford" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a
																			href="<?php echo WEBPATH?>/wingtip-cognac-oxford.html"
																			title="Wingtip Cognac Oxford">Wingtip Cognac
																			Oxford</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 40%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/38/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-38">
																			<span class="price">$267.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/38/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/38/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/38/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>

														<li
															style="-webkit-animation-delay: 2500ms; -moz-animation-delay: 2500ms; -o-animation-delay: 2500ms; animation-delay: 2500ms;"
															class="item item-animate">
															<div class="per-product">
																<div class="images-container">
																	<div class="product-hover">
																		<a
																			href="<?php echo WEBPATH?>/flat-front-trouser.html"
																			title="Flat Front Trouser" class="product-image">
																			<img class="img-responsive"
																			src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/-/7-7_3.jpg"
																			width="290" height="372" alt="Flat Front Trouser" />

																			<span class="product-img-back"> <img
																				class="img-responsive"
																				src="<?php echo BAG_REAL_HTML; ?>/smije/media/catalog/product/cache/4/small_image/290x372/9df78eab33525d08d6e5fb8d27136e95/7/_/7_1_7.jpg"
																				width="290" height="372" alt="Flat Front Trouser" />
																		</span>
																		</a>
																	</div>
																</div>
																<div class="products-textlink clearfix">
																	<h2 class="product-name">
																		<a
																			href="<?php echo WEBPATH?>/flat-front-trouser.html"
																			title="Flat Front Trouser">Flat Front Trouser</a>
																	</h2>
																	<div class="ratings">
																		<div class="rating-box">
																			<div class="rating" style="width: 80%"></div>
																		</div>
																		<span class="amount"><a href="#"
																			onclick="var t = opener ? opener.window : window; t.location.href='<?php echo WEBPATH?>/review/product/list/id/37/'; return false;">1
																				Review(s)</a></span>
																	</div>



																	<div class="price-box">
																		<span class="regular-price" id="product-price-37">
																			<span class="price">$345.00</span>
																		</span>

																	</div>

																	<div class="actions-no">
																		<div class="actions">
																			<button type="button" title="Add to Cart"
																				class="pull-left button btn-cart"
																				onclick="setLocation('<?php echo WEBPATH?>/checkout/cart/add/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/product/37/form_key/CNujFwNHOtvHnMY6/')">
																				<span><span>Add to Cart</span></span>
																			</button>
																			<ul class="add-to-links pull-left">
																				<li class="pull-left"><a
																					href="<?php echo WEBPATH;?>/wishlistaddproduct/index/add/37/CNujFwNHOtvHnMY6"
																					title="Add to Wishlist" class="link-wishlist">Add
																						to Wishlist</a></li>
																				<li class="pull-right"><span class="separator">|</span>
																					<a
																					href="<?php echo WEBPATH?>/catalog/product_compare/add/product/37/uenc/aHR0cDovL2Fsb3RoZW1lcy5jb20vZGVtby9zbWlqZS9pbmRleC5waHAvP19fX3N0b3JlPWVuZ2xpc2hfZmFzaGlvbg,,/form_key/CNujFwNHOtvHnMY6/"
																					title="Add to Compare" class="link-compare">Add
																						to Compare</a></li>
																			</ul>
																		</div>
																	</div>
																</div>
															</div>
														</li>
													</ul>
												</div>


											</div>
											<!-- MAP -->
											<!-- MAP -->
										</div>

										<script type="text/javascript">
											jQuery(document)
													.ready(
															function() {
																jQuery(
																		".tthnrmgmqj")
																		.magicproduct(
																				{
																					selector : ".tthnrmgmqj", // Selector product grid
																				});
															});
										</script>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="blog-static">
					<div class="container">
						<div class="main">
							<div class="row show-grid">
								<div class="alo-blog col-lg-9 col-md-9 col-sm-9 col-xs-12">
									<div>
										<div class="tgnsgotdwl">
											<div class="blogtabs block-title-tabs">
												<h3 class="item active loaded section-title title_left"
													data-type="blog">
													<span>Latest from our blog</span>
												</h3>
											</div>
											<div class="content-blog" data-margin="30"
												data-slider='{"margin":30,"autoPlaySpeed":3000,"enableResponsiveBreakpoints":1,"visibleItems":3,"responsiveBreakpoints":{"portrait":{"changePoint":480,"visibleItems":1},"landscape":{"changePoint":640,"visibleItems":2},"tablet":{"changePoint":768,"visibleItems":2},"desktop":{"changePoint":992,"visibleItems":3}}}'
												data-options='{"480":"1","640":"2","768":"2","992":"3","993":"3"}'>
												<div class="mc-blog">
													<ul class="flexisel-content">
														<li class="item">
															<div class="postcontent">
																<div class="blog-image image-container">
																	<a
																		href="<?php echo WEBPATH?>/blog/viviennewestwood/"><img
																		class="img-responsive"
																		src="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/blog/cache/290x145/blog4-fashion.jpg"
																		alt="imgBlog" /></a>
																	<div class="hover">
																		<div class="hover-icons">
																			<a
																				href="<?php echo WEBPATH?>/blog/viviennewestwood/"
																				class="view-project"><span class="fa fa-link">&nbsp;</span></a>
																		</div>
																	</div>
																</div>
																<div class="blog_short_text">
																	<a
																		href="<?php echo WEBPATH?>/blog/viviennewestwood/"><span
																		class="title">Vivienne Westwood </span></a>
																	<div class="post-date">
																		<i class="fa fa-calendar"></i><span>23 Nov 2014</span>
																		<span class="comments"><span
																			class="comments-text">2 comments</span></span>
																	</div>
																	<p>
																		I didn't consider myself a fashion designer at all at
																		the time of <span>[...]</span>
																	</p>
																	<!--<a href="">Read more >></a>-->
																</div>
															</div>
														</li>
														<li class="item">
															<div class="postcontent">
																<div class="blog-image image-container">
																	<a
																		href="<?php echo WEBPATH?>/blog/annielennox/"><img
																		class="img-responsive"
																		src="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/blog/cache/290x145/blog3-fashion.jpg"
																		alt="imgBlog" /></a>
																	<div class="hover">
																		<div class="hover-icons">
																			<a
																				href="<?php echo WEBPATH?>/blog/annielennox/"
																				class="view-project"><span class="fa fa-link">&nbsp;</span></a>
																		</div>
																	</div>
																</div>
																<div class="blog_short_text">
																	<a
																		href="<?php echo WEBPATH?>/blog/annielennox/"><span
																		class="title">Annie Lennox</span></a>
																	<div class="post-date">
																		<i class="fa fa-calendar"></i><span>23 Nov 2014</span>
																		<span class="comments"><span
																			class="comments-text">1 comments</span></span>
																	</div>
																	<p>
																		We all fight over what the label 'feminism' means but
																		for me it's <span>[...]</span>
																	</p>
																	<!--<a href="">Read more >></a>-->
																</div>
															</div>
														</li>
														<li class="item">
															<div class="postcontent">
																<div class="blog-image image-container">
																	<a
																		href="<?php echo WEBPATH?>/blog/dwaynejohnson/"><img
																		class="img-responsive"
																		src="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/blog/cache/290x145/blog2-fashion.jpg"
																		alt="imgBlog" /></a>
																	<div class="hover">
																		<div class="hover-icons">
																			<a
																				href="<?php echo WEBPATH?>/blog/dwaynejohnson/"
																				class="view-project"><span class="fa fa-link">&nbsp;</span></a>
																		</div>
																	</div>
																</div>
																<div class="blog_short_text">
																	<a
																		href="<?php echo WEBPATH?>/blog/dwaynejohnson/"><span
																		class="title">Dwayne Johnson</span></a>
																	<div class="post-date">
																		<i class="fa fa-calendar"></i><span>23 Nov 2014</span>
																		<span class="comments"><span
																			class="comments-text">3 comments</span></span>
																	</div>
																	<p>
																		I love making people laugh and feel good, and that's
																		awesome and <span>[...]</span>
																	</p>
																	<!--<a href="">Read more >></a>-->
																</div>
															</div>
														</li>
														<li class="item">
															<div class="postcontent">
																<div class="blog-image image-container">
																	<a
																		href="<?php echo WEBPATH?>/blog/annehathaway/"><img
																		class="img-responsive"
																		src="<?php echo BAG_REAL_HTML; ?>/smije/media/magiccart/blog/cache/290x145/blog1-fashion.jpg"
																		alt="imgBlog" /></a>
																	<div class="hover">
																		<div class="hover-icons">
																			<a
																				href="<?php echo WEBPATH?>/blog/annehathaway/"
																				class="view-project"><span class="fa fa-link">&nbsp;</span></a>
																		</div>
																	</div>
																</div>
																<div class="blog_short_text">
																	<a
																		href="<?php echo WEBPATH?>/blog/annehathaway/"><span
																		class="title">Anne Hathaway</span></a>
																	<div class="post-date">
																		<i class="fa fa-calendar"></i><span>23 Nov 2014</span>
																		<span class="comments"><span
																			class="comments-text"> comments</span></span>
																	</div>
																	<p>
																		I think fashion is a lot of fun. I love clothes. More
																		than fashion or <span>[...]</span>
																	</p>
																	<!--<a href="">Read more >></a>-->
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<script type="text/javascript">
											jQuery(document)
													.ready(
															function() {
																jQuery(
																		".tgnsgotdwl")
																		.magicproduct(
																				{
																					tabs : '.blogtabs',
																					product : '.content-blog',
																				});
															});
										</script>
									</div>
								</div>
								<div class="testimonials col-lg-3 col-md-3 col-sm-3">
									<div>
										<div class="alo-testimonial">
											<div id="aqfwelqsqn">
												<div class="block-title-tabs">
													<h3 class="title">
														<span>Testimonial</span>
													</h3>
												</div>
												<ul class="testimonial">
													<li>
														<div class="testimonial-content">
															<div class="customer"></div>
															<div class="testimonial_text">
																Suspendisse dictum ullamcorper diam, in posuere urna
																dignissim id. Mauris pellentesque, sem id dictum porta,
																lacus orci euismod er <a
																	href="<?php echo WEBPATH?>/testimonial/index/view/id/1/">
																	<span>[...]</span>
																</a>
																<div class="testimonial-arrow"></div>
															</div>
															<div class="product-name-testermonitnal">
																David,&nbsp;<span class="company">Creative
																	AloThemes</span>
															</div>
														</div>
													</li>
													<li>
														<div class="testimonial-content">
															<div class="customer"></div>
															<div class="testimonial_text">
																Praesent congue odio id neque vehicula; eget luctus urna
																consectetur. Phasellus augue nunc; tempus et ipsum et,
																iaculis blandit e <a
																	href="<?php echo WEBPATH?>/testimonial/index/view/id/2/">
																	<span>[...]</span>
																</a>
																<div class="testimonial-arrow"></div>
															</div>
															<div class="product-name-testermonitnal">
																Claire,&nbsp;<span class="company">Creative
																	Designer</span>
															</div>
														</div>
													</li>
												</ul>
											</div>
											<div class="actions">
												<a
													href="<?php echo WEBPATH?>/testimonial/">View
													All</a>
											</div>

										</div>
										<script type="text/javascript">
											jQuery(document)
													.ready(
															function($) {
																(function(
																		selector) {
																	var $content = $(selector);
																	var $slider = $(
																			'.testimonial',
																			$content);
																	$slider
																			.flexisel({
																				moveSlide : 1,
																				animationSpeed : 1000,
																				autoPlay : 1,
																				autoPlaySpeed : 7000,
																				clone : 1,
																				pauseOnHover : 1,
																				visibleItems : 1,
																				scroll : "right",
																				responsiveBreakpoints : {
																					portrait : {
																						changePoint : 480,
																						visibleItems : 1
																					},
																					landscape : {
																						changePoint : 640,
																						visibleItems : 2
																					},
																					tablet : {
																						changePoint : 768,
																						visibleItems : 3
																					},
																				}
																			});

																})
																		("#aqfwelqsqn");
															});
										</script>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
		
			
			
			
			
			