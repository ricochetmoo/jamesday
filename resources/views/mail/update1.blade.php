<body>
	<h1 class="text-align:center;font-size:2.5em;font-weight:bold">The 2022 Jamesday Celebrations is less than <a href="mailto:"></a> week away!</h1>

	<p>Hey {{$first_name}},</p>

	<p>How time flies! The 2022 Jamesday Celebrations (or as anyone else would say, my 21st birthday party) is now less than a week away and there's a lot still to sort out. We have enough accommodation available for everyone travelling up from the South - you can now indicate if you need floor space on the website.</p>

	<p><b>If you need a place to stay, you must let us know before Tuesday 07/06/2022 21:00 BST (UTC+01:00) by logging in to the system and pressing the relevant button.</b></p>

	<p>You can also now cancel your booking if you can no longer make it, so please do this if you've let me know you won't be able to make it anymore :(</p>

	<p>There's still space for more people, and time left to invite, so please feel free to add any plus ones on the system in the usual way.</p>

	<p>Finally, we're putting on a few extra activities on around the event (including Spoons breakfast the next day, a guided tour of Liverpool, a pub crawl and an escape room), and you can now mark your interest for these on the system.</p>

	<p>You can log in to the system using this magic link: <a href="{{url('/')}}/auth/token/{{$details['token']}}">{{url('/')}}/auth/token/{{$details['token']}}</a></p>

	<p>Cheers,<br>James</p>

	<p><small>You have been sent this email as you are registered for Jamesday 2022.</small></p>
</body>