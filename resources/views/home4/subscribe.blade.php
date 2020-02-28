@extends('welcome4')
@section('subscriber')

      <div class="widget m-bottom-0">
        <h3 class="block-title"><span>Newsletter</span></h3>
        <div class="ts-newsletter">
          <div class="newsletter-introtext">
            <h4>Get Updates</h4>
            <p>Subscribe our newsletter to get the best stories into your inbox!</p>
          </div>

          <div class="newsletter-form">
            <form action="{{route('subscribe')}}" method="post">
            {{csrf_field()}}
              <div class="form-group">
                <input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="on">
                <button class="btn btn-primary">Subscribe</button>
              </div>
            </form>
          </div>

          @if (Session::get('error'))
            <div class="alert alert-error">
              {{ Session::get('error') }}
            </div>
          @endif
        </div><!-- Newsletter end -->

        @include('errors.errors')
      </div><!-- Newsletter widget end -->
@stop

@include('Alerts::alerts')
@section('script')
	<script type="text/javascript">
  $(".alert").delay(10000).slideUp(300, function() {
       $(this).alert('close');
    });
</script>
@stop