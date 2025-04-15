@extends('layout.master')
@section('content')

<section class="page_contact section ">
	<div class="container py-3">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="left-contact px-lg-2">
					<h1 class="title_page mb-3">Công ty TNHH EGANY</h1>
					<div class="single-contact">
						<i class="fa fa-map-marker-alt"></i>
						<div class="content">Địa chỉ:
														<span>70 Lu Gia, District 11, Ho Chi Minh City</span>
							
						</div>
					</div>
					<div class="single-contact">
						<i class="fa fa-mobile-alt"></i>
						<div class="content">
							Số điện thoại: <a class="link" title="19006750" href="tel:19006750">19006750</a>
						</div>
					</div>
					<div class="single-contact">
						<i class="fa fa-envelope"></i>
						<div class="content">
						Email: <a title="support@sapo.vn" class="link" href="mailto:support@sapo.vn">support@sapo.vn</a>
						</div>
					</div>
					<div id="pagelogin" class="pt-3 mt-3 border-top">
						<h2 class="title-head">Liên hệ với chúng tôi</h2>
						<form method="post" action="https://ega-sportswear.mysapo.net/postcontact" id="contact" accept-charset="UTF-8"><input name="FormType" type="hidden" value="contact"/><input name="utf8" type="hidden" value="true"/><input type="hidden" id="Token-0a0e7a83ec6b462ca8b0e6bdac8e3910" name="Token" /><script src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script><script>grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "contact"}).then(function(token) {document.getElementById("Token-0a0e7a83ec6b462ca8b0e6bdac8e3910").value = token});});</script>
						
						
						<div class="form-signup clearfix">
							<div class="row group_contact">
								<fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input placeholder="Họ tên*" type="text" class="form-control  form-control-lg" required value="" name="contact[Name]">
								</fieldset>
								<fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input placeholder="Email*" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required id="email1" class="form-control form-control-lg" value="" name="contact[email]">
								</fieldset>
								<fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<input placeholder="Số điện thoại*" type="text" class="form-control  form-control-lg" required pattern="\d+" name="contact[Phone]" value="">
								</fieldset>
								<fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<textarea placeholder="Nhập nội dung*" name="contact[body]" id="comment" class="form-control content-area form-control-lg" rows="5" Required></textarea>
								</fieldset>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<button type="submit" class="btn btn-main--primary btn-block btn-lienhe">Gửi liên hệ của bạn</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="iFrameMap px-2 mt-3 mt-lg-0">
					<div id="contact_map" class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.904611732553!2d105.81388241542348!3d21.03650239288885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1946cc7e23%3A0x87ab3917166a0cd5!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8O0bmcgbmdo4buHIFNBUE8!5e0!3m2!1svi!2s!4v1555900531747!5m2!1svi!2s" width="600" height="450" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>


</section>

@endsection