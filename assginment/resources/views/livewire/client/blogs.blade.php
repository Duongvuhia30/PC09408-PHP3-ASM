@extends('layout.master')
@section('content')
@section('title', 'Bài viết')


<section class="blogpage section">
	<div class="containers" itemscope itemtype="https://schema.org/Blog">
		<meta itemprop="name" content="Tin tức">
		<meta itemprop="description" content="Giao diện tối ưu chuyển đổi cho doanh nghiệp kinh doanh thời trang, thực phẩm thể thao,..">
		<div class="wrap_background_aside margin-bottom-0">
			<div class="container">
				<h1 class="title_page text-center">Tin tức</h1>
				
				
				
				<div class="row blog-list">
					<div class="col-lg-9 col-12 content-blog">
						<div class="row">
							<div class="col-12">
								@foreach ($blog as $blogs )
								<div class="blogwp ">
									<a class="image-blog card-img-top text-center position-relative 
			   d-flex align-items-center justify-content-center rounded overflow-hidden"
										href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html"
										title="{{ $blogs->title }}"
										style=' --width: 433;
			  --height: 231;'>
										<img loading="lazy"
											class="img-fluid m-auto mh-100 w-auto"
											src="{{asset('storage/'. $blogs->thumbnail )}}"
											alt="TẬP GYM LÀ GÌ? CHỌN MẶC QUẦN ÁO GYM ĐÚNG CHUẨN">
									</a>
									<div class="content_blog clearfix card-body px-0 py-2">
										<h3 class=''>
											<a class='link' href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html" title="TẬP GYM LÀ GÌ? CHỌN MẶC QUẦN ÁO GYM ĐÚNG CHUẨN">{{ $blogs->title }}</a>
										</h3>
										<div class="media">
											<div class="media-body">
												<div class='art-info text-muted '>
													<span>
														<svg class="icon">
															<use xlink:href="#icon-calendar" />
														</svg> {{ $blogs->published_at }}
													</span>
												</div>
											</div>
										</div>
										<p class="justify">
											<span class="art-summary">

											{{ $blogs->describe }}
											</span>
											<a class="button_custome_35 link" href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html" title="Đọc tiếp">Đọc tiếp</a>
										</p>
									</div>
									@endforeach
								</div>
								
							</div>

							<div class="text-center pageinate-page-blog col-12">
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-12 left-content sidebar">
						<aside class="aside-item blog-sidebar sidebar-category collection-category margin-bottom-25">
							<div class="aside-title">
								<h2 class="title-head margin-top-0 cate"><span>Danh mục tin tức</span></h2>
							</div>
							<div class="aside-content">
								<nav class="nav-category navbar-toggleable-md">
									<ul class="nav navbar-pills flex-column">
										@foreach ( $category as $categories )
										
										@endforeach

										<li class="nav-item ">
											<a href="collections/all.html" class=" nav-link link ">
											{{	 $categories->name}}
											</a>
										
								</nav>
							</div>
						</aside>


						<div class="blog-aside aside-item blog-aside-article">
							<div class="aside-title">
								<h2 class="title-head"><span><a class="link" href="tin-tuc.html" title="Tin nổi bật">Tin nổi bật</a></span></h2>
							</div>
							<div class="aside-content-article aside-content margin-top-0">
								<div class="blog-image-list">







									<div class="blogwp clearfix media default">

										<a class="image-blog text-center mr-2 mr-md-3"
											href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html" title="{{ $blogs->title }}">
											<img loading="lazy" class="img-fluid" src="{{asset('storage/'. $blogs->thumbnail )}}"
												alt="{{ $blogs->title }}">
										</a>

										<div class="content_blog clearfix media-body ">
											<h3 class='mt-0 mb-2'>
												<a class='link' href="tap-gym-la-gi-chon-mac-quan-ao-tap-gym-dung-chuan.html" title="{{ $blogs->title }}">{{ $blogs->title }}</a>
											</h3>
										</div>
									</div>





									
</section>
<div class="ab-module-article-mostview"></div>
@endsection