@extends('welcome2')
 
@section('modal_info') 
      <!-- Modal -->
	<div id="myModalInfo" class="modal" data-backdrop="true">
	  <div class="modal-dialog modal-sm" >

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title" id="popup-title">Informasi BPBD BALI</h4>
	      </div>
	      <div class="modal-body">
                <a href="" id="popup-url">    
                    <img src="{{asset('/images/siaga_gunung_agung.jpeg')}}" alt="bali" id="popup-image">
                </a>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
@stop