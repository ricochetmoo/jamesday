<body>
	<h1 class="text-align:center;font-size:2.5em;font-weight:bold">Your magic link to log in to Jamesday 2022</h1>

	<p>Hey {{$details['first_name']}},</p>

	<p>Use the magic link below to log in to Jamesday 2022. If you didn't request this, don't worry, soemone probably made a mistake.</p>

	<a href="{{url('/')}}/auth/token/{{urlencode($details['token'])}}">{{url('/')}}/auth/token/{{urlencode($details['token'])}}</a>

	<p>If anything's wrong, please get in touch with James at <a href="mailto:james@jamesbarber.tech">james@jamesbarber.tech</a>.</p>

	<p>Cheers,<br>The Jamesday Committee</p>

	<p><small>You have been sent this email as you have registered for Jamesday 2022.</small></p>
</body>