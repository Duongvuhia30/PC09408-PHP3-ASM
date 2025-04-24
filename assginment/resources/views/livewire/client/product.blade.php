@extends('layout.master')
@section('content')
@section('title', 'Sản phẩm ')
<style>
	.swiper {
  width: 100%;
}
.swiper-slide {
  display: flex;
  justify-content: center;
}

</style>
<div class='collection_banner mb-3 container text-center'>
	<a class="banner" href="all.html" title="Ảnh banner">
		<picture>
			<source media="(min-width: 768px)" srcset="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}"
				data-srcset="//bizweb.dktcdn.net/100/484/026/themes/953543/assets/collection_main_banner.jpg?1738827047187">
			<source media="(max-width: 767px)" srcset="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}"
				data-srcset="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}">
			<img class=' img-fluid'
				src="{{ asset('storage/uploads/Banner_HHS_840x320_1.webp') }}"
				loading="lazy"
				width="1410"
				height="183"
				alt="Ảnh banner" />
		</picture>
	</a>
</div>
<div class="section mb-3">
	<div class='container'>
		<link rel="preload" as='style' type="text/css" href="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.css?1738827047187">
		<link rel="stylesheet" href="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.css?1738827047187">

		<div class="section_coupons">
			<div class="container card border-0 ">
				<div class="row scroll justify-content-xl-center  ">

					<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">


						<div class="coupon_item coupon--new-style ">

							<div class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
								<a href="all.html" title="/collections/all">
									<img class="img-fluid" src="../../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_1_imgc5aa.png?1738827047187" alt="coupon_1_img.png"
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
														<div class="coupon-copy-code coupon_copy copied type--icon" data-ega-coupon="EGAFREESHIP">
															<i class="far fa-copy"></i>
														</div>
													</div>
												</div>
												<div class="coupon-desc--row">
													<span>HSD:</span>
													<div>30/12/2024</div>
												</div>
												<div class="coupon-desc--row coupon-about">- Mã giảm 10% cho đơn hàng có giá trị tối thiểu 2 triệu <br>
													- Giảm tối đa 500k</div>
											</div>
										</div>
										<div class="coupon_info">
											- Mã giảm 10% cho đơn hàng có giá trị tối thiểu 2 triệu <br>
											- Giảm tối đa 500k </div>
									</div>
								</div>
								<div class="d-flex align-items-center flex-wrap justify-content-between">
									<div class="coupon-code-body">
										<div class="coupon-code-row">
											<span>Mã:</span> EGAFREESHIP
										</div>

										<div class="coupon-code-row">
											<span>HSD: 30/12/2024</span>
										</div>
									</div>

									<img src="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187" alt="outdated" />


								</div>
							</div>
						</div>
					</div>
					



					<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

						<div class="coupon_item coupon--new-style ">

							<div class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
								<a href="all.html" title="/collections/all">
									<img class="img-fluid" src="../../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_2_imgc5aa.png?1738827047187" alt="coupon_2_img.png"
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
														<div class="coupon-copy-code coupon_copy copied type--icon" data-ega-coupon="GIAM50K">
															<i class="far fa-copy"></i>
														</div>
													</div>
												</div>
												<div class="coupon-desc--row coupon-about">- Mã giảm 15% cho đơn hàng có giá trị tối thiểu 5 triệu <br />
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
								<div class="d-flex align-items-center flex-wrap justify-content-between">
									<div class="coupon-code-body">
										<div class="coupon-code-row">
											<span>Mã:</span> GIAM50K
										</div>
									</div>

									<button type="button" class="btn btn-main btn-sm coupon_copy mb-0" data-ega-coupon="GIAM50K">
										<span>Sao chép</span>
									</button>


								</div>
							</div>
						</div>
					</div>
					


					<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

						<div class="coupon_item coupon--new-style ">

							<div class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
								<a href="all.html" title="/collections/all">
									<img class="img-fluid" src="../../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_3_imgc5aa.png?1738827047187" alt="coupon_3_img.png"
										loading="lazy" width="79" height="70" />
								</a>

							</div>
							<div class="coupon_body">
								<div class="coupon_head coupon--has-info">
									<h3 class="coupon_title">GIẢM 30%</h3>
									<div class="coupon_desc">
										Cho các sản phẩm trong <a href="set-do-tap/index.html">Set đồ tập </a></div>
									<div class="coupon-icon-info text-center" data-coupon="GIAM30">
										<i class="fa fa-info"></i>
										<div class="coupon-desc-info">
											<div class="coupon-desc--head">GIẢM 30%</div>
											<div class="coupon-desc--body">
												<div class="coupon-desc--row">
													<span>Mã:</span>
													<div>
														<span>GIAM30</span>
														<div class="coupon-copy-code coupon_copy copied type--icon" data-ega-coupon="GIAM30">
															<i class="far fa-copy"></i>
														</div>
													</div>
												</div>
												<div class="coupon-desc--row">
													<span>HSD:</span>
													<div>01/09/2023</div>
												</div>
												<div class="coupon-desc--row coupon-about">- Đồng giá 2 triệu cho nhóm sản phẩm <a href="set-do-tap/index.html">Set đồ tập </a> <br />
													- Tổng giá trị sản phẩm từ 5 triệu trở lên</div>
											</div>
										</div>
										<div class="coupon_info">
											- Đồng giá 2 triệu cho nhóm sản phẩm <a href="set-do-tap/index.html">Set đồ tập </a> <br />
											- Tổng giá trị sản phẩm từ 5 triệu trở lên </div>
									</div>
								</div>
								<div class="d-flex align-items-center flex-wrap justify-content-between">
									<div class="coupon-code-body">
										<div class="coupon-code-row">
											<span>Mã:</span> GIAM30
										</div>

										<div class="coupon-code-row">
											<span>HSD: 01/09/2023</span>
										</div>
									</div>

									<img src="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187" alt="outdated" />


								</div>
							</div>
						</div>
					</div>

					<div class="coupon-item-wrap py-2 col-lg-3 col-md-5 col-lg col-10">

						<div class="coupon_item coupon--new-style ">

							<div class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
								<a href="all.html" title="/collections/all">
									<img class="img-fluid" src="../../bizweb.dktcdn.net/thumb/medium/100/484/026/themes/953543/assets/coupon_4_imgc5aa.png?1738827047187" alt="coupon_4_img.png"
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
														<div class="coupon-copy-code coupon_copy copied type--icon" data-ega-coupon="GIAM40">
															<i class="far fa-copy"></i>
														</div>
													</div>
												</div>
												<div class="coupon-desc--row">
													<span>HSD:</span>
													<div>20/05/2023</div>
												</div>
												<div class="coupon-desc--row coupon-about">- Miễn phí ship 100K cho đơn hàng tối thiểu từ 1 triệu <br />
													- Áp dụng cho tất cả tỉnh / thành phố</div>
											</div>
										</div>
										<div class="coupon_info">
											- Miễn phí ship 100K cho đơn hàng tối thiểu từ 1 triệu <br />
											- Áp dụng cho tất cả tỉnh / thành phố </div>
									</div>
								</div>
								<div class="d-flex align-items-center flex-wrap justify-content-between">
									<div class="coupon-code-body">
										<div class="coupon-code-row">
											<span>Mã:</span> GIAM40
										</div>

										<div class="coupon-code-row">
											<span>HSD: 20/05/2023</span>
										</div>
									</div>

									<img src="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/outdatedc5aa.png?1738827047187" alt="outdated" />


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
		<script src="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/couponc5aa.js?1738827047187" defer></script>
	</div>
</div>

<section class="section wrap_background">
	<div class="container">
		<div class="bg_collection section">
			<div class="main_container collection col-lg-12 col-12 pl-lg-0">
				<div class="filter-content aside-filter">
					<div class="filter-container">
						<div class="filter-container__selected-filter" style="display: none;">
							<div class="filter-container__selected-filter-list mb-2 ">
								<ul></ul>
							</div>
						</div>
					</div>
				</div>
				<div class="category-products products">
					<div class="products-view products-view-grid collection_reponsive list_hover_pro">
						<div class="row product-list content-col">

							@foreach($products as $product)
							<div class="col-6 col-sm-3 col-md-3 col-lg-3 product-col">
								<div class="item_product_main">
									<form action="https://ega-sportswear.mysapo.net/cart/add" method="post" class="variants product-action" data-id="product-actions-31761437" enctype="multipart/form-data">
										<div class="product-thumbnail pos-relative">
											<!-- Liên kết đến sản phẩm -->
											<a class="image_thumb pos-relative embed-responsive embed-responsive-3by4" href="{{ url('/productdetail/'.$product->row_id) }}" title="{{ $product->title }}">
												<!-- Hình ảnh sản phẩm -->
												<img loading="lazy" class='img-fetured has-second-img' width="100%" height="100%" style="--image-scale: 1;"
													src="{{ asset('storage/product_images/'.$product->path ?? 'default-image.jpg') }}" alt="{{ $product->title }}">

												@foreach($product->images as $image)
												<img src="{{ asset('storage/product_images/'.$image->path) }}"
													alt="{{ $product->title }}"
													width="300"
													loading="lazy">
												@endforeach

											</a>

											<div class="label_product">
												<div class="label_wrapper">
													<!-- Hiển thị giá trị giảm giá nếu có -->
													@if($product->discount)
													-{{ $product->discount }}%
													@else
													Không có giảm giá
													@endif
												</div>
											</div>
											<input type="hidden" name="variantId" value="92925928" />

										</div>
										<div class="product-info">
											<!-- Tên sản phẩm -->
											<span class="product-vendor">{{ optional($product->categories->first())->name }}</span>

												<span class="product-name ">
													<a class="link" href="{{ url('/productdetail/'.$product->row_id) }}" title="{{ $product->title }}">{{ $product->title }}</a>
												</span>
												<div class="product-item-cta position-relative">
													<div class="price-box">
														<span class="price-contact hidden">Liên hệ</span>
														<!-- Hiển thị giá sản phẩm -->
														@foreach ($product->variants as $variant)
														<span class="price">{{ number_format($variant->price, 0, ',', '.') }} đ</span>
														@endforeach
														<div class="label_product d-inline-block">
															<div class="label_wrapper">
																@if($product->discount)
																-{{ $product->discount }}%
																@else

																@endif
															</div>
														</div>
														<div class="item-color-chosen">
															@foreach($product->variants as $variant)
															<div data-variant-id="{{ $image->variant_id }}" class="color-dot"
																style="background: url({{ asset('storage/'.$variant->image) }}) no-repeat center center; background-size: cover">
																<span class="color-name">{{ $variant->name }} </span>
															</div>
															@endforeach

														</div>
													</div>
												</div>
										</div>
									</form>
								</div>
							</div>
							@endforeach







							<div class='product-promotion hidden'>
								<span class='product-promotion__heading rounded-sm d-inline-flex align-items-center'>
									<img alt="KHUYẾN MÃI - ƯU ĐÃI" src='../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/icon-product-promotionc5aa.png?1738827047187' width='16' height='16' class='mr-2' />
									KHUYẾN MÃI - ƯU ĐÃI
								</span>

								<ul class="promotion-box">



									<li>Nhập mã <strong>EGANY</strong> thêm 5% đơn hàng [coupon="EGANY"]</li>





									<li>Hỗ trợ 10.000 phí Ship cho đơn hàng từ 200.000đ</li>



									<li>Miễn phí Ship cho đơn hàng từ 300.000đ</li>



									<li>Đổi trả trong 30 ngày nếu sản phẩm lỗi bất kì</li>
								</ul>
							</div>
						</div>
						</form>
					</div>
				</div>




			</div>
			<div class="section pagenav">

				<nav class="clearfix relative nav_pagi w_100">
					<ul class="pagination clearfix float-right">

					{{ $products->links('vendor.livewire.circle-numbers') }}

					</ul>
				</nav>
			</div>

		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</section>

<section class="section container" id="recent-view-coll">
	<div class="title_module section heading-bar d-flex justify-content-between align-items-center">
		<h2 class="bf_flower heading-bar__title">
			Sản phẩm đã xem
		</h2>
	</div>
	<link rel="preload" as='style' type="text/css" href="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/recentviewc5aa.css?1738827047187">
	<link rel="stylesheet" href="../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/recentviewc5aa.css?1738827047187">

	<div class="recent-view-list row"></div>

	<script>
		window.sectionScripts = window.sectionScripts || []
		window.sectionScripts.push("../../bizweb.dktcdn.net/100/484/026/themes/953543/assets/recentviewc5aa.js?1738827047187")
	</script>
</section>
<script>
	var colName = "Tất cả sản phẩm";

	var colId = 0;
	var selectedViewData = "data";
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const couponList = document.querySelector('#coupon-list');
    const allCoupons = Array.from(couponList.children);

    // Nếu có nhiều hơn 4 coupon
    if (allCoupons.length > 4) {
        // Lấy 4 cái đầu
        const firstFour = allCoupons.slice(0, 4);
        const rest = allCoupons.slice(4);

        // Xóa tất cả khỏi couponList
        couponList.innerHTML = '';

        // Thêm lại 4 cái đầu
        firstFour.forEach(item => couponList.appendChild(item));

        // Tạo phần slide
        const swiperWrapper = document.createElement('div');
        swiperWrapper.classList.add('swiper-wrapper');

        rest.forEach(item => {
            const slide = document.createElement('div');
            slide.classList.add('swiper-slide');
            slide.appendChild(item);
            swiperWrapper.appendChild(slide);
        });

        const swiperContainer = document.createElement('div');
        swiperContainer.classList.add('swiper', 'mySwiper', 'mt-3');
        swiperContainer.appendChild(swiperWrapper);

        // Optional: thêm navigation
        swiperContainer.innerHTML += `
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        `;

        // Thêm vào DOM sau couponList
        couponList.parentElement.appendChild(swiperContainer);

        // Khởi tạo Swiper
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                }
            }
        });
    }
});
</script>

@endsection