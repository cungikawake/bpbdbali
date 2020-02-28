@extends('welcome4')

@section('cat_feature')

	<h3>Contact Us</h3>

	<div class="widget contact-info">
	@if($Gsetting->address != null)
		<div class="contact-info-box">
			<div class="contact-info-box-content">
				<h4>Address</h4>
				<p>{!! $Gsetting->address !!}</p>
			</div>
		</div>
	@endif

	@if($Gsetting->email != null)
		<div class="contact-info-box">
			<div class="contact-info-box-content">
				<h4>Mail Us</h4>
				<p>{!! $Gsetting->email !!}</p>
			</div>
		</div>
	@endif

	@if($Gsetting->phone != null)
		<div class="contact-info-box">
			<div class="contact-info-box-content">
				<h4>Call Us</h4>
				<p>{!! $Gsetting->phone !!}</p>
			</div>
		</div>
	@endif

	@if($Gsetting->fax != null)
		<div class="contact-info-box">
			<div class="contact-info-box-content">
				<h4>Call Us</h4>
				<p>{!! $Gsetting->phone !!}</p>
			</div>
		</div>
	@endif
	</div><!-- Widget end -->
<br>
	<h3>Contact Form</h3>
		<form  action="{{route('contact')}}" method="post" role="form">
		{{csrf_field()}}
			<div class="error-container"></div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label>Name</label>
					<input class="form-control form-control-name" name="name" id="name" placeholder="" type="text" required="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Email</label>
						<input class="form-control form-control-email" name="email" id="email" placeholder="" type="email" required="">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Subject</label>
						<input class="form-control form-control-subject" name="subject" id="subject" placeholder="" required="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10" required=""></textarea>
			</div>
			<div class="text-right"><br>
				<button class="btn btn-primary solid blank" type="submit">Send Message</button> 
			</div>
		</form>

<br>
@stop