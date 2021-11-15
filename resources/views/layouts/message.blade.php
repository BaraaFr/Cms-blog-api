@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		Success: {{ Session::get('success') }}
	</div>
@endif
@if(Session::has('delete'))
<div class="alert alert-danger" role="alert">
    Success: {{ Session::get('delete') }}
	</div>
@endif

@if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
	        </div>	
@endif
