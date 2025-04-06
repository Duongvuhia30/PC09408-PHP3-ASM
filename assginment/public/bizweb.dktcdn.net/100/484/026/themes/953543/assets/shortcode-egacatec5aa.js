function relatedProductSlide(){
		if(window.matchMedia('(min-width: 768px)').matches && $('.ega-cate-shortcode .item').length >=3){
		$('.ega-cate-shortcode .row:not(.slick-initialized)').each(function(){
			$(this).slick({
				autoplay: false,
				autoplaySpeed: 6000,
				dots: false,
				arrows: true,
				infinite: false,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 1,
				centerMode: false,
				responsive: [
					{
						breakpoint: 1200,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					}
				]
			});
		
		})
			
		}
	}
	relatedProductSlide()