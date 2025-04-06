function getRecentView(query) {
		try {
			let storage = JSON.parse(localStorage.getItem('recentProduct')) || [];

			if(storage && storage.length && Array.isArray(storage)) {
				if(typeof currentProduct != 'undefined' && currentProduct.alias){
					//storage = storage.filter(item => item !== currentProduct.alias)
				}
				console.log(storage)
			 let filter = storage.join(' OR ')
				$.ajax({
					url: `/search?q=alias:${filter}&view=recent`,
					success: function(data){
						if(data && data.length){
							let wrapper = $(query).find('.recent-view-list');
							wrapper.html(data)
							if(window.BPR && window.BPR.loadBadges){
								window.BPR.initDomEls(), window.BPR.loadBadges()
							}
							window.matchMedia('(min-width: 768px)').matches && wrapper.find('.item_product_main').length >= 5 && $(`${query} .recent-view-list`).slick({
								autoplay: false,
								autoplaySpeed: 6000,
								dots: false,
								arrows: true,
								infinite: false,
								speed: 300,
								slidesToShow: 5,
								slidesToScroll: 5,
								centerMode: false,
								responsive: [
									{
										breakpoint: 1200,
										settings: {
											slidesToShow: 5,
											slidesToScroll: 5
										}
									},
									{
										breakpoint: 991,
										settings: {
											slidesToShow: 4,
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

						}else{
							$(query).remove()
						}
					}
				})
			}else{
				$(query).remove()
			}
		}catch(e){
			$(query).remove()
		}
	}
		getRecentView('#recent-view-coll')