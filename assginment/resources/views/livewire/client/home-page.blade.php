@extends('layout.master')

@section('content')
<style>
.prev-btn, .next-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    border: none;
    background: rgba(0, 0, 0, 0.6);
    cursor: pointer;
}

.prev-btn { left: 10px; }
.next-btn { right: 10px; }

.custom-arrow {
    font-size: 24px;
    color: white;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
    user-select: none;
}

.custom-arrow:hover {
    background: rgba(255, 255, 255, 0.2);
}


</style>
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
								src="{{ asset('storage/uploads/banner-nhasach-02_orig.jpg') }}"
								width="1920"
								height="775"
								alt="Slider 1" />
						</picture>
					</a>
				</div>
<!-- 
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
				</div> -->

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
	<div class="section__blogs position-relative" style="overflow: hidden;">
	<button class="prev-btn custom-arrow">&#10094;</button>
<button class="next-btn custom-arrow">&#10095;</button>


    <div class="blog-list-wrapper row blog-list blog-list-custom blog-size-5" >
        <div class="blog-list-container d-flex" >
            @foreach ($categories as $category)
                @php $image = $category->images->first(); @endphp
                @if ($image)
                    <div class="blog-item col-12 col-sm-6 col-lg-6 col-xl-3 pos-relative mb-4" >
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

</div>

	</div>
</section>
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
															@foreach($product->images as $image)
															<div data-variant-id="{{ $image->variant_id }}" class="color-dot"
																style="background: url({{ asset('storage/product_images/'.$image->path) }}) no-repeat center center; background-size: cover">
																<span class="color-name">{{ $variant->name }} </span>
															</div>
															@endforeach

														</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
	<div class="js-seemore ega-pro__seemore text-center pos-relative mt-3">
							<a href="/products" title="Xem thêm" class="btn btn-main btn-pill mx-auto">Xem thêm</a>
						</div>
</div>
				</div>
			</div>
		</div>
	</section>


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
<script>
$(document).ready(function () {
    const $container = $('.blog-list-container');
    const itemWidth = $('.blog-item').outerWidth(true); // chiều rộng 1 item
    const visibleCount = 4; // số mục hiển thị mỗi lần
    const totalItems = $('.blog-item').length;
    const maxIndex = Math.ceil(totalItems / visibleCount) - 1;
    let currentIndex = 0;

    function updateScroll() {
        const offset = itemWidth * visibleCount * currentIndex;
        $container.css('transform', `translateX(-${offset}px)`);
    }

    $('.next-btn').click(function () {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateScroll();
        }
    });

    $('.prev-btn').click(function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateScroll();
        }
    });
});

</script>
@endsection