@extends('layout.master')

@section('content')

<section class="section awe-section-1">
	<div class="section_slider clearfix">
		<div class>

			<div class="home-slider btn-slide--new">

				<div class="items text-center" data-color="#d1e3f2">
					<a href="collections/all.html" title="Slider 1">
						<picture>
							<source media="(max-width: 480px)"
								srcset="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}">
							<img class=" img-fluid mx-auto"
								decoding="async"
								src="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}"
								width="1920"
								height="775"
								alt="Slider 1" />
						</picture>
					</a>
				</div>

				<div class="items text-center" data-color="#e9e6e7">
					<a href="collections/all.html" title="Slider 2">
						<picture>
							<source media="(max-width: 480px)"
								srcset="//bizweb.dktcdn.net/thumb/large/100/484/026/themes/953543/assets/slider_2.jpg?1738827047187">
							<img class=" img-fluid mx-auto"
								loading="lazy"
								decoding="async"
								src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/slider_2c5aa.jpg?1738827047187"
								width="1920"
								height="775"
								alt="Slider 2" />
						</picture>
					</a>
				</div>

			</div>

		</div>
	</div>
</section>

<section class="section awe-section-2">
	<div class="ega-policies">
		<div class="container">
			<div class="policies-body">

				<div class="policies-item text-center">
					<div class="policies-image">
						<img loading=lazy
							src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/policies_icon_1c5aa.png?1738827047187"
							alt="policies_icon_1.png"
							width="40"
							height="40"
							class="img-fluid">
					</div>
					<div class="policies-info">
						<h3 class="policies-title">Miễn phí vận chuyển</h3>
						<div class="policies-desc">Nhận hàng trong vòng 3 ngày</div>
					</div>
				</div>

				<div class="policies-item text-center">
					<div class="policies-image">
						<img loading=lazy
							src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/policies_icon_2c5aa.png?1738827047187"
							alt="policies_icon_2.png"
							width="40"
							height="40"
							class="img-fluid">
					</div>
					<div class="policies-info">
						<h3 class="policies-title">Quà tặng hấp dẫn</h3>
						<div class="policies-desc">Nhiều ưu đãi khuyến mãi hot</div>
					</div>
				</div>

				<div class="policies-item text-center">
					<div class="policies-image">
						<img loading=lazy
							src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/policies_icon_3c5aa.png?1738827047187"
							alt="policies_icon_3.png"
							width="40"
							height="40"
							class="img-fluid">
					</div>
					<div class="policies-info">
						<h3 class="policies-title">Bảo đảm chất lượng</h3>
						<div class="policies-desc">Sản phẩm đã dược kiểm định</div>
					</div>
				</div>

				<div class="policies-item text-center">
					<div class="policies-image">
						<img loading=lazy
							src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/policies_icon_4c5aa.png?1738827047187"
							alt="policies_icon_4.png"
							width="40"
							height="40"
							class="img-fluid">
					</div>
					<div class="policies-info">
						<h3 class="policies-title">Hotline: 19001993</h3>
						<div class="policies-desc">Dịch vụ hỗ trợ bạn 24/7</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section awe-section-19">

	<div class="section_blog">
	<div class="container">
	<div class="title_module_main d-flex justify-content-between px-0">
		<h2 class="heading-bar__title" style="color: #000000">
			<a class="link" href="tin-tuc.html" title="DANH MỤC SẢN PHẨM">DANH MỤC SẢN PHẨM</a>
		</h2>
		<a href="/product" title="Xem tất cả" class="btn">Xem tất cả</a>
	</div>

	<div class="section__blogs">
		<div class="row blog-list blog-list-custom blog-size-5">

			@foreach ($categories as $category)
				@php
					$image = $category->images->first(); // chỉ lấy 1 ảnh đầu tiên
				@endphp

				@if ($image)
					<div class="col-12 col-sm-6 col-lg-6 col-xl-3 pos-relative mb-4">
						<div class="blogwp clearfix media only-title">
							<a class="image-blog text-center"
							   href="/products?category={{ $category->id }}"
							   title="{{ $category->name }}">
								<img loading="lazy" class="img-fluid"
									 src="{{ asset('storage/'.$image->path) }}"
									 alt="{{ $category->name }}">
							</a>

							<div class="content_blog clearfix media-body">
								<h3 class="mt-0 mb-2">
									<a class="link"
									   href="/products?category={{ $category->id }}"
									   title="{{ $category->name }}">
										{{ $category->name }}
									</a>
								</h3>

								<a class="btn btn-view"
								   href="/product"
								   title="Xem ngay">Xem ngay</a>
							</div>
						</div>
					</div>
				@endif
			@endforeach

		</div>
	</div>
</div>

	</div>
</section>

<!-- <section class="section awe-section-4">
	<link rel="preload" as='style' type="text/css"
		href="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.css?1738827047187">
	<link rel="stylesheet"
		href="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.css?1738827047187">

	<div class="section_coupons">
		<div class="container card border-0 ">
			<div class="row scroll justify-content-xl-center  ">

				<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

					<div class="coupon_item coupon--new-style ">

						<div
							class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
							<a href="collections/all.html" title="/collections/all">
								<img class="img-fluid"
									src="../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_1_imgc5aa.png?1738827047187"
									alt="coupon_1_img.png"
									loading="lazy" width="79" height="70" />
							</a>

						</div>
						<div class="coupon_body">
							<div class="coupon_head coupon--has-info">
								<h3 class="coupon_title">MIỄN PHÍ VẬN CHUYỂN</h3>
								<div class="coupon_desc">Freeship cho đơn hàng từ 500k</div>
								<div class="coupon-icon-info text-center" data-coupon="EGAFREESHIP">
									<i class="fa fa-info"></i>
									<div class="coupon-desc-info">
										<div class="coupon-desc--head">MIỄN PHÍ VẬN CHUYỂN</div>
										<div class="coupon-desc--body">
											<div class="coupon-desc--row">
												<span>Mã:</span>
												<div>
													<span>EGAFREESHIP</span>
													<div class="coupon-copy-code coupon_copy copied type--icon"
														data-ega-coupon="EGAFREESHIP">
														<i class="far fa-copy"></i>
													</div>
												</div>
											</div>
											<div class="coupon-desc--row">
												<span>HSD:</span>
												<div>30/12/2024</div>
											</div>
											<div class="coupon-desc--row coupon-about">- Mã giảm 10% cho đơn
												hàng có giá trị tối thiểu 2 triệu <br>
												- Giảm tối đa 500k</div>
										</div>
									</div>
									<div class="coupon_info">
										- Mã giảm 10% cho đơn hàng có giá trị tối thiểu 2 triệu <br>
										- Giảm tối đa 500k </div>
								</div>
							</div>
							<div
								class="d-flex align-items-center flex-wrap justify-content-between">
								<div class="coupon-code-body">
									<div class="coupon-code-row">
										<span>Mã:</span> EGAFREESHIP
									</div>

									<div class="coupon-code-row">
										<span>HSD: 30/12/2024</span>
									</div>
								</div>

								<img
									src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187"
									alt="outdated" />

							</div>
						</div>
					</div>
				</div>

				<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

					<div class="coupon_item coupon--new-style ">

						<div
							class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
							<a href="collections/all.html" title="/collections/all">
								<img class="img-fluid"
									src="../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_2_imgc5aa.png?1738827047187"
									alt="coupon_2_img.png"
									loading="lazy" width="79" height="70" />
							</a>

						</div>
						<div class="coupon_body">
							<div class="coupon_head coupon--has-info">
								<h3 class="coupon_title">GIẢM 50K</h3>
								<div class="coupon_desc">Áp dụng cho đơn hàng từ 600k</div>
								<div class="coupon-icon-info text-center" data-coupon="GIAM50K">
									<i class="fa fa-info"></i>
									<div class="coupon-desc-info">
										<div class="coupon-desc--head">GIẢM 50K</div>
										<div class="coupon-desc--body">
											<div class="coupon-desc--row">
												<span>Mã:</span>
												<div>
													<span>GIAM50K</span>
													<div class="coupon-copy-code coupon_copy copied type--icon"
														data-ega-coupon="GIAM50K">
														<i class="far fa-copy"></i>
													</div>
												</div>
											</div>
											<div class="coupon-desc--row coupon-about">- Mã giảm 15% cho đơn
												hàng có giá trị tối thiểu 5 triệu <br />
												- Giảm tối đa 2 triệu
											</div>
										</div>
									</div>
									<div class="coupon_info">
										- Mã giảm 15% cho đơn hàng có giá trị tối thiểu 5 triệu <br />
										- Giảm tối đa 2 triệu
									</div>
								</div>
							</div>
							<div
								class="d-flex align-items-center flex-wrap justify-content-between">
								<div class="coupon-code-body">
									<div class="coupon-code-row">
										<span>Mã:</span> GIAM50K
									</div>
								</div>

								<button type="button" class="btn btn-main btn-sm coupon_copy mb-0"
									data-ega-coupon="GIAM50K">
									<span>Sao chép</span>
								</button>

							</div>
						</div>
					</div>
				</div>

				<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

					<div class="coupon_item coupon--new-style ">

						<div
							class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
							<a href="collections/all.html" title="/collections/all">
								<img class="img-fluid"
									src="../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_3_imgc5aa.png?1738827047187"
									alt="coupon_3_img.png"
									loading="lazy" width="79" height="70" />
							</a>

						</div>
						<div class="coupon_body">
							<div class="coupon_head coupon--has-info">
								<h3 class="coupon_title">GIẢM 30%</h3>
								<div class="coupon_desc">
									Cho các sản phẩm trong <a
										href="collections/set-do-tap/index.html">Set đồ tập </a></div>
								<div class="coupon-icon-info text-center" data-coupon="GIAM30">
									<i class="fa fa-info"></i>
									<div class="coupon-desc-info">
										<div class="coupon-desc--head">GIẢM 30%</div>
										<div class="coupon-desc--body">
											<div class="coupon-desc--row">
												<span>Mã:</span>
												<div>
													<span>GIAM30</span>
													<div class="coupon-copy-code coupon_copy copied type--icon"
														data-ega-coupon="GIAM30">
														<i class="far fa-copy"></i>
													</div>
												</div>
											</div>
											<div class="coupon-desc--row">
												<span>HSD:</span>
												<div>01/09/2023</div>
											</div>
											<div class="coupon-desc--row coupon-about">- Đồng giá 2 triệu cho
												nhóm sản phẩm <a href="collections/set-do-tap/index.html">Set đồ
													tập </a> <br />
												- Tổng giá trị sản phẩm từ 5 triệu trở lên</div>
										</div>
									</div>
									<div class="coupon_info">
										- Đồng giá 2 triệu cho nhóm sản phẩm <a
											href="collections/set-do-tap/index.html">Set đồ tập </a> <br />
										- Tổng giá trị sản phẩm từ 5 triệu trở lên </div>
								</div>
							</div>
							<div
								class="d-flex align-items-center flex-wrap justify-content-between">
								<div class="coupon-code-body">
									<div class="coupon-code-row">
										<span>Mã:</span> GIAM30
									</div>

									<div class="coupon-code-row">
										<span>HSD: 01/09/2023</span>
									</div>
								</div>

								<img
									src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187"
									alt="outdated" />

							</div>
						</div>
					</div>
				</div>

				<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

					<div class="coupon_item coupon--new-style ">

						<div
							class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
							<a href="collections/all.html" title="/collections/all">
								<img class="img-fluid"
									src="../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_4_imgc5aa.png?1738827047187"
									alt="coupon_4_img.png"
									loading="lazy" width="79" height="70" />
							</a>

						</div>
						<div class="coupon_body">
							<div class="coupon_head coupon--has-info">
								<h3 class="coupon_title">GIẢM 40%</h3>
								<div class="coupon_desc">Cho sản phẩm thứ 4 trong đơn hàng</div>
								<div class="coupon-icon-info text-center" data-coupon="GIAM40">
									<i class="fa fa-info"></i>
									<div class="coupon-desc-info">
										<div class="coupon-desc--head">GIẢM 40%</div>
										<div class="coupon-desc--body">
											<div class="coupon-desc--row">
												<span>Mã:</span>
												<div>
													<span>GIAM40</span>
													<div class="coupon-copy-code coupon_copy copied type--icon"
														data-ega-coupon="GIAM40">
														<i class="far fa-copy"></i>
													</div>
												</div>
											</div>
											<div class="coupon-desc--row">
												<span>HSD:</span>
												<div>20/05/2023</div>
											</div>
											<div class="coupon-desc--row coupon-about">- Miễn phí ship 100K cho
												đơn hàng tối thiểu từ 1 triệu <br />
												- Áp dụng cho tất cả tỉnh / thành phố</div>
										</div>
									</div>
									<div class="coupon_info">
										- Miễn phí ship 100K cho đơn hàng tối thiểu từ 1 triệu <br />
										- Áp dụng cho tất cả tỉnh / thành phố </div>
								</div>
							</div>
							<div
								class="d-flex align-items-center flex-wrap justify-content-between">
								<div class="coupon-code-body">
									<div class="coupon-code-row">
										<span>Mã:</span> GIAM40
									</div>

									<div class="coupon-code-row">
										<span>HSD: 20/05/2023</span>
									</div>
								</div>

								<img
									src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187"
									alt="outdated" />

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script type="text/x-custom-template" data-template="couponPopup">
		<div id="coupon-modal" class="coupon-modal modal fade " role="dialog" style="display:none;">
	<div class="modal-dialog align-vertical">
    <div class="modal-content">
		<button type="button" class="close window-close" data-dismiss="modal" data-backdrop="false"
        aria-label="Close" style="z-index: 9;"><span aria-hidden="true">×</span></button>
		<div class="coupon-content"></div>
	</div>
	</div>
	</div>
</script>
	<script
		src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.js?1738827047187"
		defer></script>
</section> -->



<section class="section awe-section-6">
	<link rel="preload" as='style' type="text/css"
		href="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/flashsalec5aa.css?1738827047187">

	<link rel="stylesheet"
		href="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/flashsalec5aa.css?1738827047187">

	<noscript>
		<link
			href="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/flashsalec5aa.css?1738827047187"
			rel="stylesheet" type="text/css" media="all" />
	</noscript>

	<section class="section_flashsale flashsale"
		style="--background-color: #ffffff;
--countdown-background: #000000;
--countdown-color: #ffffff;
--process-background: #E9ECEF;
--process-color1: #7E89A6;
--process-color2: #7E89A6;
--stock-color: #393b3b;
--heading-color: #444444;
">
		<div class="container">
			<div class='flashsale__container border-0 p-0'>

				<div
					class="title_module_main heading-bar e-tabs d-flex justify-content-between align-items-center py-0 has-tabs">
					<div
						class='d-flex align-items-center flex-wrap flashsale__header justify-content-between'>
						<div class="flash-sale-heading">
							<div style='display: flex; align-items: center; gap: 10px;'>
								<h2 class="heading-bar__title flashsale__title m-0">
									<a class='link' href="san-pham-noi-bat.html"
										title="GIẢM SỐC 50%">Sản phẩm</a>
								</h2>
							</div>
						</div>

						<!-- <div class="flashsale__countdown-wrapper">
							<span class="flashsale__countdown-label">Kết thúc sau</span>
							<div class="flashsale__countdown" data-countdown-type="hours"
								data-countdown>
							</div>
						</div> -->
					</div>
					<!-- <div class="flash-sale-tabs ">
						<ul
							class='tabs tabs-title list-unstyled m-0 tabs-group d-flex align-items-center'>

							<li class=" ega-small tab-link px-3 link current"
								data-tab="tab-1">
								Hàng hiệu -50%
							</li>

							<li class=" ega-small tab-link px-3 linkml-2 "
								data-tab="tab-2">
								Năng động ngày hè
							</li>

							<li class=" ega-small tab-link px-3 linkml-2 "
								data-tab="tab-3">
								Chào biển nắng mới
							</li>

						</ul>
					</div> -->
				</div>

				<div class='e-tabs'>
				<div id="tab-1" class="tab-content content_extab current">
    <div class="row one-row">
        @foreach($products as $product)
            @php
                $image = $product->images->first();
            @endphp

            @if($image)
			<div class="col-12 col-sm-6 col-md-4 col-xl-3"
                    data-pd-id="{{ $product->id }}"
                    data-inventory-quantity="3"
                    data-management="true"
                    data-available="true"
                    data-max-stock="300">
                    
                    <div class="item_product_main">
                        <div class="product-container">
                            <div class="product-item">
                                <form action="https://ega-sportswear.mysapo.net/cart/add" method="post"
                                    class="variants product-action" data-id="product-actions-{{ $product->id }}"
                                    enctype="multipart/form-data">

                                    <div class="product-thumbnail pos-relative">
                                        <a class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
                                            href="{{  url('/productdetail/'.$product->row_id)}}"
                                            title="{{ $product->name }}">
                                            <img loading="lazy" class='img-fetured has-second-img' width="480" height="480"
                                                style="--image-scale: 1;"
                                                src="{{ asset('storage/product_images/'.$image->path) }}"
                                                alt="{{ $product->name }}">

                                            <img loading="lazy"
                                                class='product-thumbnail__img product-thumbnail__img--secondary'
                                                width="480" height="480" style="--image-scale: 1;"
                                                src="{{ asset('storage/product_images/'.$image->path) }}"
                                                alt="{{ $product->name }}">
                                        </a>

                                        <input type="hidden" name="variantId" value="86731548" />

                                      
                                    </div>
                                </form>

                                <div class="product-info">
								@if ($product->categories->isNotEmpty())
    <span class="product-vendor">{{ $product->categories->first()->name }}</span>
@endif


                                    <span class="product-name"> <a class="link"
                                            href="{{  url('/productdetail/'.$product->row_id)}}"
                                            title="{{ $product->title }}">{{ $product->title }}</a></span>
											@foreach ($product->variants as $variant )
											
										
                                    <div class="product-item-cta position-relative">
                                        <div class="price-box">
                                            <span class="price-contact hidden">Liên hệ</span>
                                            <span class="price">{{number_format($variant->price,0,',','.') }}đ</span>
                                            <span class="compare-price hidden">0₫</span>
                                            <div class="label_product d-inline-block hidden">
                                                <div class="label_wrapper">
                                                    -19%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
	@endforeach
                                    <div class="item-color-chosen">
                                        <!-- màu sắc -->
                                        <div data-variant-id="86731548" class="color-dot selected"
                                            style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-2-4aac64a6-506b-4a1e-9b88-d451525544b54632.jpg?v=1685682352997) no-repeat center center; background-size: cover">
                                            <span class="color-name">Đen</span>
                                        </div>
                                        <div data-variant-id="86731552" class="color-dot"
                                            style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-6a4f6.jpg?v=1685682354427) no-repeat center center; background-size: cover">
                                            <span class="color-name">Kem</span>
                                        </div>
                                        <a href="quan-legging-dai-tap-yoga.html"
                                            data-handle="quan-legging-dai-tap-yoga"
                                            class="color-more quick-view">
                                            +5 <span class="action-name">Xem thêm 5 màu khác</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flashsale__bottom" style="display:none;--stock-color: var(--text-color);">
                        <div class="flashsale__label  style1">
                            Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
                        </div>
                        <div class="flashsale__progressbar">
                            <div class="flashsale___percent"></div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>



					<div id="tab-2" class="tab-content  content_extab ">

						<div class="row one-row">

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584095"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584095" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-tap-dang-dai.html"
												title="Quần legging tập dáng dài">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488-113be33a-2f84-40d8-818d-edbfd351c67b3890.jpg?v=1685682462047"
													alt="Quần legging tập dáng dài">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488-1c11a.jpg?v=1685682463790"
													alt="Quần legging tập dáng dài">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-9%
												</div>
											</div>
											<input type="hidden" name="variantId" value="86731530" />
											<div class="action-bar">
												<a href="quan-legging-tap-dang-dai.html"
													data-handle="quan-legging-tap-dang-dai"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-tap-dang-dai.html"
													data-handle="quan-legging-tap-dang-dai"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Yinli</span>
											<span class="product-name "><a class="link"
													href="quan-legging-tap-dang-dai.html"
													title="Quần legging tập dáng dài">Quần legging tập dáng
													dài</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">410.000₫</span>

													<span class="compare-price ">450.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-9%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731530" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4488-113be33a-2f84-40d8-818d-edbfd351c67b3890.jpg?v=1685682462047) no-repeat center center; background-size: cover">
													<span class="color-name">Xanh đen</span>
												</div>

												<div data-variant-id="86731532" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4488-1c11a.jpg?v=1685682463790) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="quan-legging-tap-dang-dai.html"
													data-handle="quan-legging-tap-dang-dai"
													class="color-more quick-view">
													+4 <span class="action-name">Xem thêm 4 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584097"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584097" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-dai-tap-yoga.html"
												title="Quần legging dài tập yoga">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-2-4aac64a6-506b-4a1e-9b88-d451525544b54632.jpg?v=1685682352997"
													alt="Quần legging dài tập yoga">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-6a4f6.jpg?v=1685682354427"
													alt="Quần legging dài tập yoga">

											</a>
											<input type="hidden" name="variantId" value="86731548" />
											<div class="action-bar">
												<a href="quan-legging-dai-tap-yoga.html"
													data-handle="quan-legging-dai-tap-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-dai-tap-yoga.html"
													data-handle="quan-legging-dai-tap-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Khác</span>
											<span class="product-name "><a class="link"
													href="quan-legging-dai-tap-yoga.html"
													title="Quần legging dài tập yoga">Quần legging dài tập
													yoga</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">400.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-9%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731548" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-2-4aac64a6-506b-4a1e-9b88-d451525544b54632.jpg?v=1685682352997) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<div data-variant-id="86731552" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-6a4f6.jpg?v=1685682354427) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="quan-legging-dai-tap-yoga.html"
													data-handle="quan-legging-dai-tap-yoga"
													class="color-more quick-view">
													+5 <span class="action-name">Xem thêm 5 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584103"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584103" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-tron-dang-lung.html"
												title="Quần legging trơn dáng lửng">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488a1af.jpg?v=1685582143523"
													alt="Quần legging trơn dáng lửng">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488-2a1af.jpg?v=1685582143523"
													alt="Quần legging trơn dáng lửng">

											</a>
											<input type="hidden" name="variantId" value="86731644" />
											<div class="action-bar">
												<a href="quan-legging-tron-dang-lung.html"
													data-handle="quan-legging-tron-dang-lung"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-tron-dang-lung.html"
													data-handle="quan-legging-tron-dang-lung"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Khác</span>
											<span class="product-name "><a class="link"
													href="quan-legging-tron-dang-lung.html"
													title="Quần legging trơn dáng lửng">Quần legging trơn dáng
													lửng</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">350.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-9%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731644" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4488a1af.jpg?v=1685582143523) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<div data-variant-id="86731664" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4488-2a1af.jpg?v=1685582143523) no-repeat center center; background-size: cover">
													<span class="color-name">Nâu</span>
												</div>

												<a href="quan-legging-tron-dang-lung.html"
													data-handle="quan-legging-tron-dang-lung"
													class="color-more quick-view">
													+6 <span class="action-name">Xem thêm 6 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584102"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584102" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-lung-tap-yoga.html"
												title="Quần legging lửng tập yoga">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-97-730d50f374bc4cd687ca8a57ff56d6a705d4.jpg?v=1683190082777"
													alt="Quần legging lửng tập yoga">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4487-20f71.jpg?v=1685581844197"
													alt="Quần legging lửng tập yoga">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-7%
												</div>
											</div>
											<input type="hidden" name="variantId" value="86731612" />
											<div class="action-bar">
												<a href="quan-legging-lung-tap-yoga.html"
													data-handle="quan-legging-lung-tap-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-lung-tap-yoga.html"
													data-handle="quan-legging-lung-tap-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-legging-lung-tap-yoga.html"
													title="Quần legging lửng tập yoga">Quần legging lửng tập
													yoga</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">375.000₫</span>

													<span class="compare-price ">400.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-7%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731612" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-97-730d50f374bc4cd687ca8a57ff56d6a705d4.jpg?v=1683190082777) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<div data-variant-id="86731616" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-100-6624c86f3fb44e2389215590f74ce8a80f71.jpg?v=1685581844197) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="quan-legging-lung-tap-yoga.html"
													data-handle="quan-legging-lung-tap-yoga"
													class="color-more quick-view">
													+2 <span class="action-name">Xem thêm 2 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584101"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584101" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-tap-legging-duong-may-noi.html"
												title="Quần tập legging đường may nổi">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-101-a0e0621c11734bf09b9d2e852b19908dcdab.jpg?v=1682386825600"
													alt="Quần tập legging đường may nổi">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-102-db64e0c635da49e58caddb02664b99a7cdab.jpg?v=1682386825600"
													alt="Quần tập legging đường may nổi">

											</a>
											<input type="hidden" name="variantId" value="86731640" />
											<div class="action-bar">
												<a href="quan-tap-legging-duong-may-noi.html"
													data-handle="quan-tap-legging-duong-may-noi"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-tap-legging-duong-may-noi.html"
													data-handle="quan-tap-legging-duong-may-noi"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Khác</span>
											<span class="product-name "><a class="link"
													href="quan-tap-legging-duong-may-noi.html"
													title="Quần tập legging đường may nổi">Quần tập legging đường may
													nổi</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">450.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-7%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731640" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-101-a0e0621c11734bf09b9d2e852b19908dcdab.jpg?v=1682386825600) no-repeat center center; background-size: cover">
													<span class="color-name">Nâu nhạt</span>
												</div>

												<div data-variant-id="86731636" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-102-db64e0c635da49e58caddb02664b99a7cdab.jpg?v=1682386825600) no-repeat center center; background-size: cover">
													<span class="color-name">Tím</span>
												</div>

												<a href="quan-tap-legging-duong-may-noi.html"
													data-handle="quan-tap-legging-duong-may-noi"
													class="color-more quick-view">
													+2 <span class="action-name">Xem thêm 2 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584104"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584104" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-dui-the-thao.html"
												title="Quần legging đùi thể thao">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-3d3e2.jpg?v=1685682597010"
													alt="Quần legging đùi thể thao">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-7d3e2.jpg?v=1685682597010"
													alt="Quần legging đùi thể thao">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-10%
												</div>
											</div>
											<input type="hidden" name="variantId" value="86731680" />
											<div class="action-bar">
												<a href="quan-legging-dui-the-thao.html"
													data-handle="quan-legging-dui-the-thao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-dui-the-thao.html"
													data-handle="quan-legging-dui-the-thao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-legging-dui-the-thao.html"
													title="Quần legging đùi thể thao">Quần legging đùi thể
													thao</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">235.000₫</span>

													<span class="compare-price ">260.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-10%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731680" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-3d3e2.jpg?v=1685682597010) no-repeat center center; background-size: cover">
													<span class="color-name">Tím</span>
												</div>

												<div data-variant-id="86731676" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-7d3e2.jpg?v=1685682597010) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<a href="quan-legging-dui-the-thao.html"
													data-handle="quan-legging-dui-the-thao"
													class="color-more quick-view">
													+2 <span class="action-name">Xem thêm 2 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584100"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584100" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-tap-ong-dai-bo-gau.html"
												title="Quần tập ống dài bo gấu">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-95-2f6e9fb44bbf48eb8becfd491475dac422cc.jpg?v=1685682902207"
													alt="Quần tập ống dài bo gấu">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-94-97df2fddb3dd46c9ae989d7593ded2c022cc.jpg?v=1685682902207"
													alt="Quần tập ống dài bo gấu">

											</a>
											<input type="hidden" name="variantId" value="86731608" />
											<div class="action-bar">
												<a href="quan-tap-ong-dai-bo-gau.html"
													data-handle="quan-tap-ong-dai-bo-gau"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-tap-ong-dai-bo-gau.html"
													data-handle="quan-tap-ong-dai-bo-gau"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-tap-ong-dai-bo-gau.html"
													title="Quần tập ống dài bo gấu">Quần tập ống dài bo
													gấu</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">405.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-10%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731608" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-95-2f6e9fb44bbf48eb8becfd491475dac422cc.jpg?v=1685682902207) no-repeat center center; background-size: cover">
													<span class="color-name">Xanh rêu</span>
												</div>

												<div data-variant-id="86731604" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-94-97df2fddb3dd46c9ae989d7593ded2c022cc.jpg?v=1685682902207) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="quan-tap-ong-dai-bo-gau.html"
													data-handle="quan-tap-ong-dai-bo-gau"
													class="color-more quick-view">
													+1 <span class="action-name">Xem thêm 1 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584096"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584096" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-legging-tap-yoga-ong-loe.html"
												title="Quần legging tập yoga ống loe">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-91-4081f32565c847d891b972eb8d2688b06866.jpg?v=1682386824097"
													alt="Quần legging tập yoga ống loe">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/image-92-d0fb766008e54d36ad69146b90af84196866.jpg?v=1682386824097"
													alt="Quần legging tập yoga ống loe">

											</a>
											<input type="hidden" name="variantId" value="86731543" />
											<div class="action-bar">
												<a href="quan-legging-tap-yoga-ong-loe.html"
													data-handle="quan-legging-tap-yoga-ong-loe"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="quan-legging-tap-yoga-ong-loe.html"
													data-handle="quan-legging-tap-yoga-ong-loe"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-legging-tap-yoga-ong-loe.html"
													title="Quần legging tập yoga ống loe">Quần legging tập yoga ống
													loe</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">450.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-10%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731543" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-91-4081f32565c847d891b972eb8d2688b06866.jpg?v=1682386824097) no-repeat center center; background-size: cover">
													<span class="color-name">Xám</span>
												</div>

												<div data-variant-id="86731539" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/image-90-74d7b46a73d14a1586e4334d554295216866.jpg?v=1682386824097) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<a href="quan-legging-tap-yoga-ong-loe.html"
													data-handle="quan-legging-tap-yoga-ong-loe"
													class="color-more quick-view">
													+1 <span class="action-name">Xem thêm 1 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center mt-3 col-12">
							<a href="quan-legging.html" title="Xem tất cả"
								class="btn btn-main btn-icon">
								Xem tất cả

								<svg class="icon">
									<use xlink:href="#icon-arrow" />
								</svg>
							</a>
						</div>
					</div>

					<div id="tab-3" class="tab-content  content_extab ">

						<div class="row one-row">

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="31180491"
								data-inventory-quantity="0"
								data-management="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-31180491" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-dui-the-thao-lung-cao.html"
												title="Quần đùi thể thao lưng cao">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488-b65effa4-13b1-4126-9cc1-5a4c093a2ceef94c.jpg?v=1685683291660"
													alt="Quần đùi thể thao lưng cao">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4488-1-e202e9d6-d18d-4f62-9aa0-76f7b8c31073f94c.jpg?v=1685683291660"
													alt="Quần đùi thể thao lưng cao">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-10%
												</div>
											</div>
											<input type="hidden" name="variantId" value="89709606" />
											<div class="action-bar">
												<a href="quan-dui-the-thao-lung-cao.html"
													data-handle="quan-dui-the-thao-lung-cao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Hết hàng</span>
												</a>

												<a href="quan-dui-the-thao-lung-cao.html"
													data-handle="quan-dui-the-thao-lung-cao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-dui-the-thao-lung-cao.html"
													title="Quần đùi thể thao lưng cao">Quần đùi thể thao lưng
													cao</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">235.000₫</span>

													<span class="compare-price ">260.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-10%
														</div>
													</div>

												</div>

												<span class="item-label-soldout">Hết hàng</span>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="89709606" class="color-dot selected"
													style="background-color: #f8f6f1">
													<span class="color-name">Kem</span>
												</div>

												<div data-variant-id="89709610" class="color-dot "
													style="background-color: #f1f0f1">
													<span class="color-name">Trắng</span>
												</div>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="31180477"
								data-inventory-quantity="0"
								data-management="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-31180477" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="quan-dui-the-thao.html" title="Quần đùi thể thao">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4487e7e6.jpg?v=1685682736210"
													alt="Quần đùi thể thao">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4487-1e7e6.jpg?v=1685682736210"
													alt="Quần đùi thể thao">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-10%
												</div>
											</div>
											<input type="hidden" name="variantId" value="89709513" />
											<div class="action-bar">
												<a href="quan-dui-the-thao.html" data-handle="quan-dui-the-thao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Hết hàng</span>
												</a>

												<a href="quan-dui-the-thao.html" data-handle="quan-dui-the-thao"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="quan-dui-the-thao.html" title="Quần đùi thể thao">Quần đùi
													thể thao</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">235.000₫</span>

													<span class="compare-price ">260.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-10%
														</div>
													</div>

												</div>

												<span class="item-label-soldout">Hết hàng</span>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="89709513" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4487e7e6.jpg?v=1685682736210) no-repeat center center; background-size: cover">
													<span class="color-name">Tím</span>
												</div>

												<div data-variant-id="89709517" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4487-1e7e6.jpg?v=1685682736210) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584113"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584113" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<span
												class="product-promo-tag product-promo-tag--1 product-promo-tag--text-1"
												style="--color: #333; --background: #f0f0f0; --border-color: #dfdfdf">
												Bán chạy

											</span>
											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-croptop-tap-gym-yoga-quai-ao-doi.html"
												title="Áo croptop tập gym yoga">

												<img class="product-frame"
													src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/frame_2c5aa.png?1738827047187"
													alt
													data-image-scale="--image-scale: 1;
"
													loading="lazy"
													width="480"
													height="480" />

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-26c92.jpg?v=1685581773753"
													alt="Áo croptop tập gym yoga">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491f4ec.jpg?v=1685581775777"
													alt="Áo croptop tập gym yoga">

											</a>

											<img
												src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-button-playc5aa.png?1738827047187"
												loading="lazy"
												class="video-icon"
												alt="video-play-button" />
											<div class="label_product ">
												<div class="label_wrapper">
													-18%
												</div>
											</div>
											<input type="hidden" name="variantId" value="86731873" />
											<div class="action-bar">
												<a href="ao-croptop-tap-gym-yoga-quai-ao-doi.html"
													data-handle="ao-croptop-tap-gym-yoga-quai-ao-doi"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-croptop-tap-gym-yoga-quai-ao-doi.html"
													data-handle="ao-croptop-tap-gym-yoga-quai-ao-doi"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Yinli</span>
											<span class="product-name "><a class="link"
													href="ao-croptop-tap-gym-yoga-quai-ao-doi.html"
													title="Áo croptop tập gym yoga">Áo croptop tập gym
													yoga</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">290.000₫</span>

													<span class="compare-price ">350.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-18%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731873" class="color-dot selected"
													style="background-color: tim;">
													<span class="color-name">Tím</span>
												</div>

												<div data-variant-id="86731841" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-26c92.jpg?v=1685581773753) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<a href="ao-croptop-tap-gym-yoga-quai-ao-doi.html"
													data-handle="ao-croptop-tap-gym-yoga-quai-ao-doi"
													class="color-more quick-view">
													+7 <span class="action-name">Xem thêm 7 màu khác</span>
												</a>

											</div>

											<span
												class="product-promo-tag product-promo-tag--2 product-promo-tag--image"
												style="--color: #080808; --background: transparent; --border-color: transparent">
												<img class="img-fluid"
													src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/promo_tag_2c5aa.png?1738827047187'
													alt='Áo croptop tập gym yoga' width="125" height="16" />

											</span>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584112"
								data-inventory-quantity="62"
								data-management="true"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584112" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-tap-bra-thiet-ke.html" title="Áo tập bra thiết kế">

												<img class="product-frame"
													src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/frame_2c5aa.png?1738827047187"
													alt
													data-image-scale="--image-scale: 1;
"
													loading="lazy"
													width="480"
													height="480" />

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4493bea3.jpg?v=1685681685250"
													alt="Áo tập bra thiết kế">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4493-1196a.jpg?v=1685681689140"
													alt="Áo tập bra thiết kế">

											</a>
											<input type="hidden" name="variantId" value="86731837" />
											<div class="action-bar">
												<a href="ao-tap-bra-thiet-ke.html"
													data-handle="ao-tap-bra-thiet-ke"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-tap-bra-thiet-ke.html"
													data-handle="ao-tap-bra-thiet-ke"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">EGA</span>
											<span class="product-name "><a class="link"
													href="ao-tap-bra-thiet-ke.html" title="Áo tập bra thiết kế">Áo
													tập bra thiết kế</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">350.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-18%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731837" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4493bea3.jpg?v=1685681685250) no-repeat center center; background-size: cover">
													<span class="color-name">Xám</span>
												</div>

												<div data-variant-id="86731829" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4493-1196a.jpg?v=1685681689140) no-repeat center center; background-size: cover">
													<span class="color-name">Nâu nhạt</span>
												</div>

												<a href="ao-tap-bra-thiet-ke.html"
													data-handle="ao-tap-bra-thiet-ke" class="color-more quick-view">
													+4 <span class="action-name">Xem thêm 4 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584111"
								data-inventory-quantity="3"
								data-management="true"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584111" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-tap-croptop-day.html" title="Áo tập croptop dây">

												<img class="product-frame"
													src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/frame_1c5aa.png?1738827047187"
													alt
													data-image-scale="--image-scale: 1;
"
													loading="lazy"
													width="480"
													height="480" />

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4489-1-164f7.jpg?v=1685681059523"
													alt="Áo tập croptop dây">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4489-2-177ea.jpg?v=1685681223077"
													alt="Áo tập croptop dây">

											</a>
											<input type="hidden" name="variantId" value="86731805" />
											<div class="action-bar">
												<a href="ao-tap-croptop-day.html" data-handle="ao-tap-croptop-day"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-tap-croptop-day.html" data-handle="ao-tap-croptop-day"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Yinli</span>
											<span class="product-name "><a class="link"
													href="ao-tap-croptop-day.html" title="Áo tập croptop dây">Áo tập
													croptop dây</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">315.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-18%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731805" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4489-1-164f7.jpg?v=1685681059523) no-repeat center center; background-size: cover">
													<span class="color-name">Nâu</span>
												</div>

												<div data-variant-id="86731801" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4489-2-177ea.jpg?v=1685681223077) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="ao-tap-croptop-day.html" data-handle="ao-tap-croptop-day"
													class="color-more quick-view">
													+3 <span class="action-name">Xem thêm 3 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584110"
								data-inventory-quantity="49"
								data-management="true"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584110" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-tap-croptop-quai-lung-cheo.html"
												title="Áo tập croptop quai lưng chéo">

												<img class="product-frame"
													src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/frame_2c5aa.png?1738827047187"
													alt
													data-image-scale="--image-scale: 1;
"
													loading="lazy"
													width="480"
													height="480" />

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-1b023.jpg?v=1685682016667"
													alt="Áo tập croptop quai lưng chéo">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-54c98.jpg?v=1685682017903"
													alt="Áo tập croptop quai lưng chéo">

											</a>
											<input type="hidden" name="variantId" value="86731777" />
											<div class="action-bar">
												<a href="ao-tap-croptop-quai-lung-cheo.html"
													data-handle="ao-tap-croptop-quai-lung-cheo"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-tap-croptop-quai-lung-cheo.html"
													data-handle="ao-tap-croptop-quai-lung-cheo"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Yinli</span>
											<span class="product-name "><a class="link"
													href="ao-tap-croptop-quai-lung-cheo.html"
													title="Áo tập croptop quai lưng chéo">Áo tập croptop quai lưng
													chéo</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">368.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-18%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731777" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-1b023.jpg?v=1685682016667) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<div data-variant-id="86731781" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-54c98.jpg?v=1685682017903) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<a href="ao-tap-croptop-quai-lung-cheo.html"
													data-handle="ao-tap-croptop-quai-lung-cheo"
													class="color-more quick-view">
													+3 <span class="action-name">Xem thêm 3 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584109"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584109" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<span
												class="product-promo-tag product-promo-tag--1 product-promo-tag--text-1"
												style="--color: #333; --background: #f0f0f0; --border-color: #dfdfdf">
												Bán chạy

											</span>

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-tap-croptop-co-tay.html" title="Áo tập croptop có tay">

												<img class="product-frame"
													src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/frame_2c5aa.png?1738827047187"
													alt
													data-image-scale="--image-scale: 1;
"
													loading="lazy"
													width="480"
													height="480" />

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4489b2ca.jpg?v=1685582009410"
													alt="Áo tập croptop có tay">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;
"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4489-2dd5c.jpg?v=1685582013467"
													alt="Áo tập croptop có tay">

											</a>
											<input type="hidden" name="variantId" value="86731765" />
											<div class="action-bar">
												<a href="ao-tap-croptop-co-tay.html"
													data-handle="ao-tap-croptop-co-tay"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-tap-croptop-co-tay.html"
													data-handle="ao-tap-croptop-co-tay"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Khác</span>
											<span class="product-name "><a class="link"
													href="ao-tap-croptop-co-tay.html"
													title="Áo tập croptop có tay">Áo tập croptop có tay</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">295.000₫</span>

													<span class="compare-price hidden">0₫</span>

													<div class="label_product d-inline-block hidden">
														<div class="label_wrapper">
															-18%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731765" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4489b2ca.jpg?v=1685582009410) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<div data-variant-id="86731773" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4489-2dd5c.jpg?v=1685582013467) no-repeat center center; background-size: cover">
													<span class="color-name">Nâu nhạt</span>
												</div>

												<a href="ao-tap-croptop-co-tay.html"
													data-handle="ao-tap-croptop-co-tay"
													class="color-more quick-view">
													+2 <span class="action-name">Xem thêm 2 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="flashsale__item col-12 col-xl-3"
								data-pd-id="30584108"
								data-inventory-quantity="300"
								data-available="true"
								data-max-stock="300">
								<div class="item_product_main">

									<form action="https://ega-sportswear.mysapo.net/cart/add"
										method="post" class="variants product-action"
										data-id="product-actions-30584108" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">

											<span
												class="product-promo-tag product-promo-tag--1 product-promo-tag--text-1"
												style="--color: #333; --background: #f0f0f0; --border-color: #dfdfdf">
												Bán chạy

											</span>

											<a
												class="image_thumb pos-relative embed-responsive embed-responsive-3by4"
												href="ao-thun-tap-gym-yoga.html" title="Áo thun tập gym yoga">

												<img loading="lazy"
													class='img-fetured has-second-img'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-8c5ec28e-0c4b-4aca-87aa-bd91045354103b70.jpg?v=1685684129327"
													alt="Áo thun tập gym yoga">
												<img loading="lazy"
													class='product-thumbnail__img product-thumbnail__img--secondary'
													width="480"
													height="480"
													style="--image-scale: 1;"
													src="../bizweb.dktcdn.net/thumb/grande/100/484/026/products/frame-4491-1-9eecb2af-4216-49b0-aaf7-2bbbe18770cb3b70.jpg?v=1685684129327"
													alt="Áo thun tập gym yoga">

											</a>
											<div class="label_product ">
												<div class="label_wrapper">
													-16%
												</div>
											</div>
											<input type="hidden" name="variantId" value="86731745" />
											<div class="action-bar">
												<a href="ao-thun-tap-gym-yoga.html"
													data-handle="ao-thun-tap-gym-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<img width='20' height='20' class="icon-option"
														src="../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-optionsc5aa.png?1738827047187"
														alt="icon-option" />
													<span class="action-name">Tùy chọn</span>
												</a>

												<a href="ao-thun-tap-gym-yoga.html"
													data-handle="ao-thun-tap-gym-yoga"
													class="action-child xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
													<i class="fas fa-eye"></i>
													<span class="action-name">Xem nhanh</span>
												</a>
											</div>
										</div>
										<div class="product-info">

											<span class="product-vendor">Khác</span>
											<span class="product-name "><a class="link"
													href="ao-thun-tap-gym-yoga.html" title="Áo thun tập gym yoga">Áo
													thun tập gym yoga</a></span>
											<div class="product-item-cta position-relative">
												<div class="price-box">
													<span class="price-contact hidden">
														Liên hệ
													</span>

													<span class="price ">403.000₫</span>

													<span class="compare-price ">475.000₫</span>

													<div class="label_product d-inline-block ">
														<div class="label_wrapper">
															-16%
														</div>
													</div>

												</div>
											</div>

											<div class="item-color-chosen">

												<div data-variant-id="86731745" class="color-dot selected"
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-8c5ec28e-0c4b-4aca-87aa-bd91045354103b70.jpg?v=1685684129327) no-repeat center center; background-size: cover">
													<span class="color-name">Kem</span>
												</div>

												<div data-variant-id="86731741" class="color-dot "
													style="background: url(../bizweb.dktcdn.net/thumb/thumb/100/484/026/products/frame-4491-1-9eecb2af-4216-49b0-aaf7-2bbbe18770cb3b70.jpg?v=1685684129327) no-repeat center center; background-size: cover">
													<span class="color-name">Đen</span>
												</div>

												<a href="ao-thun-tap-gym-yoga.html"
													data-handle="ao-thun-tap-gym-yoga" class="color-more quick-view">
													+3 <span class="action-name">Xem thêm 3 màu khác</span>
												</a>

											</div>

											<div class='product-promotion hidden'>
												<span
													class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
													<img alt="KHUYẾN MÃI - ƯU ĐÃI"
														src='../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187'
														width='16' height='16' class='mr-2' />
													KHUYẾN MÃI - ƯU ĐÃI
												</span>

												<ul class="promotion-box">

													<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng
														[coupon="EGANY"]</li>

													<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>

													<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>

													<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
												</ul>
											</div>
										</div>
									</form>
									<div class="flashsale__bottom"
										style="display:none;--stock-color: var(--text-color);">
										<div class="flashsale__label  style1">
											Đã bán <b class="flashsale__sold-qty"></b> sản phẩm
										</div>

										<div class="flashsale__progressbar">
											<div class="flashsale___percent"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center mt-3 col-12">
							<a href="ao-thun-the-thao-hot.html" title="Xem tất cả"
								class="btn btn-main btn-icon">
								Xem tất cả

								<svg class="icon">
									<use xlink:href="#icon-arrow" />
								</svg>
							</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<script>
		window.flashSale = {
			flashSaleColl: "san-pham-noi-bat",
			type: "hours",
			dateStart: "21/07/2023",
			dateFinish: "3",
			hourStart: "00:00",
			hourFinish: "24",
			activeDay: "7",
			finishAction: "show",
			finishLabel: "Chương trình đã kết thúc",
			percentMin: "10",
			percentMax: "90",
			maxInStock: "300",
			useSoldQuantity: false,
			useTags: false,
			timestamp: new Date().getTime(),
			openingText: "Vừa mở bán",
			soldText: "Đã bán [soluong] sản phẩm",
			outOfStockSoonText: "<img src='//bizweb.dktcdn.net/100/484/026/themes/953543/assets/fire-icon.svg?1738827047187' /> Sắp cháy hàng"
		}
		window.sectionScripts = window.sectionScripts || []
		window.sectionScripts.push("../bizweb.dktcdn.net/100/484/026/themes/953543/assets/flashsalec5aa.js?1738827047187")
	</script>
</section>

<section class="section awe-section-19">
@foreach ($blog as $blogs )
	<div class="section_blog">
		<div class='container'>
			<div class="title_module_main d-flex justify-content-between px-0">
				<h2 class="heading-bar__title"
					style='color: #000000'>
					<a class='link' href="tin-tuc.html"
						title="Bài Viết">Bài Viết</a>
				</h2>
				<!-- <a href="tin-tuc.html" title="Xem tất cả"
					class="btn">
					Xem tất cả
				</a> -->
			</div>
			<div class='section__blogs'>
				<div class="row blog-list blog-list-custom blog-size-5">

					<div class="col-12 col-sm-6 col-lg-6 col-xl-3 pos-relative mb-4">

						<div class="blogwp clearfix media only-title">

							<a class="image-blog text-center"
								href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html"
								title="{{$blogs->title}}">
								<img loading="lazy" class="img-fluid"
									src="{{asset('storage/'. $blogs->thumbnail )}}"
									alt="{{$blogs->title}}">
							</a>

							<div class="content_blog clearfix media-body ">
								<h3 class='mt-0 mb-2'>
									<a class='link'
										href="/blogs"
										title="{{$blogs->title}}">{{$blogs->title}}</a>
								</h3>

								<div class="dated-post media">
									<div class="media-body d-flex flex--wrap align-items-center">
										<div class='text-muted mt-0'>

											Thứ Ba,
											06/06/2023
										</div>
									</div>
								</div>

								<a class="btn btn-view"
									href="/blogs"
									title="Xem ngay">Xem ngay</a>

								<p class="short-summary justify lead d-none d-md-block ">

									Gym hiện đang là một xu hướng mới của giới trẻ. Gym không chỉ là bộ
									môn phổ biến dành...

									<a class="button_custome_35 link"
										href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html"
										title="Đọc tiếp">Đọc tiếp</a>

								</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	@endforeach
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các tab và nội dung tab
    const tabs = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    // Thêm sự kiện click cho mỗi tab
    tabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Xóa class 'current' khỏi tất cả các tab và nội dung tab
            tabs.forEach(t => t.classList.remove('current'));
            tabContents.forEach(content => content.classList.remove('current'));
            
            // Thêm class 'current' cho tab được click
            this.classList.add('current');
            
            // Hiển thị nội dung tab tương ứng
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('current');
        });
    });
});
</script>
@endsection