iWish$(document).ready(function () {
	iWishCheck();
	iWishCheckInCollection();
	// if change variant
	iWish$(".iWishAdd").parents('form').find("[name='id']").change(function () {
		iWishCheck();
	});
	iWish$(".iWishAdd").parents('form').find("[name='variantId']").change(function (event) {
		if (Bizweb.template != 'product') {
			return;
		}
		if (iWish$('.iWishAdd').length > 0 && iWish$('.iWishAdded').length > 0) {
			var iWishAdd = $(event.target).parents("form").find(".iWishAdd")[0];
			var iWishAdded = $(event.target).parents("form").find(".iWishAdded")[0];
			if (iWishAdd) {
				iWishAdd.setAttribute("data-variant", event.target.value);
			}
			if (iWishAdded) {
				iWishAdded.setAttribute("data-variant", event.target.value);
			}
		}
		iWishCheck();
	});
	iWish$('.single-option-selector').change(function () {
		iWishCheck();
	});

	if (iWish$(".iWishView").length > 0) {
		iWish$(".iWishView").click(function () {
			if (iwish_cid == 0) {
				iWishGotoStoreLogin();
			} else {
				iWishSubmit(iWishLink, { cust: iwish_cid });
			}
			return false;
		});
	}

	iWish$(".iWishAdd").click(function () {
		var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
		};
		var iWishpId = iWish$(this).attr('data-product');
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).attr('data-variant');
		}
		if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
			return false;
		}
		if (iwish_cid == 0) {
			iWishGotoStoreLogin();
		} else {
			var postObj = {
				actionx: 'add',
				cust: iwish_cid,
				pid: iWishpId,
				vid: iWishvId
			};
			iWish$.post(iWishLink, postObj, function (data) {
				if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
				var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
				var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
				if (result) {
					iWish$.each(iWish$('.iWishAdd'), function () {
						var _item = $(this);
						if (_item.attr('data-variant') == iWishvId) {
							_item.addClass('iWishHidden'), _item.parent().find('.iWishAdded').removeClass('iWishHidden');
						}
					});
					if (Bizweb.template == "product") {
						if (redirect == 2) {
							iWishSubmit(iWishLink, { cust: iwish_cid });
						}
					}
				}
			}, 'html');
		}
		return false;
	});
	iWish$(".iWishAdded").click(function () {
		var iWishvId = iWish$(this).parents('form').find("[name='id']").val();
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).parents('form').find("[name='variantId']").val();
		};
		var iWishpId = iWish$(this).attr('data-product');
		if (typeof iWishvId === 'undefined') {
			iWishvId = iWish$(this).attr('data-variant');
		}
		if (typeof iWishvId === 'undefined' || typeof iWishpId === 'undefined') {
			return false;
		}
		if (iwish_cid == 0) {
			iWishGotoStoreLogin();
		} else {
			var postObj = {
				actionx: 'remove',
				cust: iwish_cid,
				pid: iWishpId,
				vid: iWishvId
			};
			iWish$.post(iWishLink, postObj, function (data) {
				if (iWishFindAndGetVal('#iwish_post_result', data) == undefined) return;
				var result = (iWishFindAndGetVal('#iwish_post_result', data).toString().toLowerCase() === 'true');
				var redirect = parseInt(iWishFindAndGetVal('#iwish_post_redirect', data), 10);
				if (result) {
					iWish$.each(iWish$('.iWishAdd'), function () {
						var _item = $(this);
						if (_item.attr('data-variant') == iWishvId) {
							_item.removeClass('iWishHidden'), _item.parent().find('.iWishAdded').addClass('iWishHidden');
						}
					});
				}
			}, 'html');
		}
		return false;
	});
});
$(document).ready(function () {
	$('.single-option-selector').change(function (event) {
		if (Bizweb.template != 'product') {
			return;
		}
		if (iWish$('.iWishAdd').length > 0 && iWish$('.iWishAdded').length > 0) {
			var productSelectors = $(event.target).parents("form").find("#product-selectors")[0]
			var iWishAdd = $(event.target).parents("form").find(".iWishAdd")[0];
			var iWishAdded = $(event.target).parents("form").find(".iWishAdded")[0];
			if (iWishAdd) {
				iWishAdd.setAttribute("data-variant", productSelectors.value);
			}
			if (iWishAdded) {
				iWishAdded.setAttribute("data-variant", productSelectors.value);
			}
		}
		iWishCheck();
	});
});
