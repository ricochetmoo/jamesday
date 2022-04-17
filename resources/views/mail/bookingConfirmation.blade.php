<body>
	<h1 class="text-align:center;font-size:2.5em;font-weight:bold">Thanks for registering for Jamesday 2022</h1>

	<p>Hey {{$details->first_name}},</p>

	<p>Thanks for registering for Jamesday 2022, here are the details we've got for your booking:</p>

	<p><b>Name:</b> {{$details->first_name}} {{$details->last_name}}</p>
	<p><b>Email:</b> {{$details->email}}</p>
	<p><b>Travelling from:</b> {{$details->coming_from}}</p>
	<p><b>Can host?</b> @if($details->host) Yes ({{$details->can_host}}) @else No @endif</p>

	<p>If anything's wrong, please get in touch with James at <a href="mailto:james@jamesbarber.tech">james@jamesbarber.tech</a>.</p>

	<p>Cheers,<br>The Jamesday Committee</p>

	<p><small>You have been sent this email as you have registered for Jamesday 2022.</small></p>
</body>