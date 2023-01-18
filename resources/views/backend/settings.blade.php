@extends('backend.master')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Website Settings</h1>
		</div>

		<div class="col-sm-4 cat-form">
			@if (Session::has('message'))
			<div class="alert alert-success alert-disable fade in">
				<a href="" class="close" data-dismiss="alert" >&time;</a>
				{{ Session('message')}}
			</div>
			@endif
			<h3>Website Settings</h3>
			<form method="POST" action="{{url('addsettings')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="tbl" value="{{encrypt('settings')}}" >
				<div class="form-group">
					<label>Logo</label>
					<input type="file" name="image" class="form-control">

				</div>

                <div class="form-group">
					<label>About Us</label>
					<textarea name="about" cols="30" rows="10" class="form-control"></textarea>
				</div>
                <div id="socialFieldGroup">
                    <div class="form-group">
                        <label>Social</label>
                        <input type="url" name="social[]"  class="form-control">
                        <p class="text-muted">e.g https://www.facebook.com/armantpi</p>
                    </div>
                </div>

                <div class="text-right form-group">
                    <span class="btn btn-warning" id="addSocialField"><i class="fa fa-plus"></i> </span>
                </div>
                <div class="form-group">
                    <div class="alert alert-danger alert-dismissable noshow" id="socialCounter">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sorry !</strong>You have reached the social field login
                    </div>
                </div>

				<div class="form-group">
					<button class="btn btn-primary">Add Settings</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
    .noshow{display: none;}
</style>

<script>
    var socialCounter = 1;
    $('#addSocialField').click(function(){
        socialCounter++;
        if(socialCounter > 5){
            $('#socialAlert').removeClass('noshow');
            return;
        }
        newDiv = $(document.createElement('div')).attr("class", "form-group");
        newDiv.after().html('<input type="url" name="social[]"  class="form-control"></div>');
        newDiv.appendTo("#socialFieldGroup");
    })


</script>

@stop
