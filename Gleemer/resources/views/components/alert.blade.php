<div class="alert {{ $alert_type }}">
	<div class="alert-icon {{ $alert_type }}">
		@switch($alert_type)
    		@case('error')
				<i class="fas fa-exclamation-triangle"></i>
				@break
			@case('success')
				<i class="far fa-check-circle"></i>
				@break
			@case('warning')
				<i class="fas fa-exclamation-circle"></i>
				@break
			@case('info')
				<i class="far fa-question-circle"></i>
				@break
		@endswitch
	</div>
	<p>{{ $alert }}</p>
	<span class="alert-close" onclick="$(this).closest('.alert').remove()">@lang('general.close')</span>
</div>
