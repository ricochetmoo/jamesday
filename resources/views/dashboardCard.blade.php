<x-app-layout>
	<x-slot name="header">
		<div class="inline-block grow">
			<h2 class="py-2 font-bold text-3xl">
				Jamesday 2022
			</h2>
		</div>
		@if (Auth::user()->admin)
		<div class="inline-block mx-3">
			<a class="font-medium" href="{{url('/admin/bookings')}}">Bookings</a>
		</div>
		<div class="inline-block mx-3">
			<a class="font-medium" href="{{url('/admin/invites')}}">Invites</a>
		</div>
		@endif
		<div class="inline-block ml-3">
			<a class="font-medium" href="{{url('/logout')}}">Log out</a>
		</div>
	</x-slot>

	<h1 class="text-5xl text-center font-bold mt-16">Hey, {{Auth::user()->first_name}}!</h1>

	<div class="max-w-xl mx-auto">
		<h3 class="text-3xl text-center font-bold mt-16">Badges</h3>
		<p class="mt-3">Get your <span class="font-medium">free</span> Jamesday 2022 badge now!</p>
		<div id="card"></div>

		<div class="text-center">
			<button role="submit" id="cardButton" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition">Pay</button>
		</div>

		<form action="payment" method="POST">
			@csrf
		</form>

		<h3 class="text-3xl text-center font-bold mt-16">The Details</h3>
		<p class="mt-3">The Jamesday Celebrations 2022 will be taking place at <span class="font-medium">Subrosa Liverpool</span> in the evening of <span class="font-medium">Saturday 11/06/2022</span>. For those travelling to the event, a variety of accommodation will be available ranging from space on someone's floor (free) to nearby hotels.</p>
		<p class="mt-2">The venue is conveniently located for both public transport and driving, with parking available minutes away from the venue. Further details about transport logistics will be made avaialable in the coming fortnight.</p>

		<h3 class="mt-16 text-3xl text-center font-bold">Final Details</h3>

		<form action="{{url('/user/' . Auth::user()->id)}}" method="POST">
		@csrf
		@method('PUT')
		<label class="block my-3">
			<span class="text-gray-700 font-medium">Do you need accommodation?</span><br>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="needs_accomYes" name="needs_accom" value="1" @if (Auth::user()->needs_accom) checked @endif>
					<span class="ml-2">Yes</span>
				</label>
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="needs_accomNo" name="needs_accom" value="0" @if (!Auth::user()->needs_accom) checked @endif>
					<span class="ml-2">No</span>
				</label>
			</div>
		</label>
		<label class="block my-3">
			<span class="text-gray-700 font-medium">Do you need parking?</span><br>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="needs_parkingYes" name="needs_parking" value="1" @if (Auth::user()->needs_parking) checked @endif>
					<span class="ml-2">Yes</span>
				</label>
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="needs_parkingNo" name="needs_parking" value="0" @if (!Auth::user()->needs_parking) checked @endif>
					<span class="ml-2">No</span>
				</label>
			</div>
		</label>

		<h3 class="mt-16 text-3xl text-center font-bold">Activity Interest</h3>
		<p class="mt-3">We're organising some additional activities around the event, here you can let us know whether you're interested in taking part in them. Saying that you're interested does not commit you to taking part.</p>

		<label class="block my-3">
			<h4 class="text-2xl font-bold mt-3">Spoons Breakfast</h4>
			<p class="mt-3">Pretty much what it says on the tin... We'll meet at the Richard John Blackler at about 10:00 on the Sunday and cure our hangovers with a spoons brekfast.</p>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="spoons_interestYes" name="spoons_interest" value="1" @if (Auth::user()->spoons_interest) checked @endif>
					<span class="ml-2">Yes</span>
				</label>
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="spoons_interestNo" name="spoons_interest" value="0" @if (!Auth::user()->spoons_interest) checked @endif>
					<span class="ml-2">No</span>
				</label>
			</div>
		</label>

		<label class="block my-3">
			<h4 class="text-2xl font-bold mt-3">Walking Tour</h4>
			<p class="mt-3">Come along on a free walking tour, led by James, showing off some of the highlights of Liverpool on the Sunday afternoon.</p>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="tour_interestYes" name="tour_interest" value="1" @if (Auth::user()->tour_interest) checked @endif>
					<span class="ml-2">Yes</span>
				</label>
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="tour_interestNo" name="tour_interest" value="0" @if (!Auth::user()->tour_interest) checked @endif>
					<span class="ml-2">No</span>
				</label>
			</div>
		</label>

		<label class="block my-3">
			<h4 class="text-2xl font-bold mt-3">Escape Room</h4>
			<p class="mt-3">Do an escape room with others from the event somewhere in Liverpool. Expected cost £10-£15 per person.</p>
			<div class="grid md:grid-cols-2 gap-6 my-3">
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="escape_room_interestYes" name="escape_room_interest" value="1" @if (Auth::user()->escape_room_interest) checked @endif>
					<span class="ml-2">Yes</span>
				</label>
				<label class="inline-flex items-center">
					<input type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" id="escape_room_interestNo" name="escape_room_interest" value="0" @if (!Auth::user()->escape_room_interest) checked @endif>
					<span class="ml-2">No</span>
				</label>
			</div>
		</label>

		<div class="block mt-6 text-center">
			<button role="submit" class="bg-indigo-700 rounded px-4 py-2 font-bold text-white hover:bg-indigo-500 transition">Save details and interests</button>
		</div>

		<h3 class="mt-16 text-3xl text-center font-bold">Your Plus ones</h3>

		@if (Auth::user()->plus_ones->first())
		<div class="max-w mt-6 overflow-x-auto">
			<table class="table-auto mx-auto">
				<thead>
					<tr>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">First Name</th>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Last Name</th>
						<th class="px-4 py-2 text-black text-left border-b-4 border-indigo-700">Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Auth::user()->plus_ones as $plusOne)
					<tr class="even:bg-indigo-100">
						<td class="px-4 py-2 text-black text-left">{{$plusOne->first_name}}</td>
						<td class="px-4 py-2 text-black text-left">{{$plusOne->last_name}}</td>
						<td class="px-4 py-2 text-black text-left capitalize">{{$plusOne->status}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@else
		<p class="mt-3">You currently don't have any plus ones.</p>
		@endif

		<div class="block mt-6 text-center">
			<a href="{{url('/plusone')}}" class="bg-indigo-700 rounded px-4 py-3 font-bold text-white hover:bg-indigo-500 transition">Request a plus one</a>
		</div>

		<h3 class="mt-16 text-3xl text-center font-bold">Your Registration</h3>
	</div>

	<div class="max-w-xl mx-auto rounded-md bg-gray-100 shadow-indigo-300 shadow-lg p-6 mt-6">
		<p>
			<span class="text-gray-700 font-bold">Name</span><br>
			{{Auth::user()->first_name}} {{Auth::user()->last_name}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Email address</span><br>
			{{Auth::user()->email}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Travelling from</span><br>
			{{Auth::user()->coming_from}}
		</p>
		<p class="mt-2">
			<span class="text-gray-700 font-bold">Can host?</span><br>
			@if(Auth::user()->can_host) Yes ({{Auth::user()->can_host}}) @else No @endif
		</p>

		<div class="block mt-6 text-center">
			<a href="{{url('/user/self/cancel')}}" class="bg-red-700 rounded px-4 py-3 font-bold text-white hover:bg-red-500 transition">Cancel Booking</a>
		</div>
	</div>

	<div class="max-w-xl mx-auto">
		<p class="mt-9">Please get in touch with James (<a href="mailto:james@jamesbarber.tech" class="text-indigo-700 hover:underline decoration-dashed">james@jamesbarber.tech</a>) to update your registration.</p>
	</div>

	<script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
<script>
	async function initialiseCard(payments)
	{
		const card = await payments.card();
		await card.attach('#card');
		
		return card;
	}

	async function tokenise(paymentMethod)
	{
		const tokenResult = await paymentMethod.tokenize();

		if (tokenResult.status === 'OK')
		{
			
			return tokenResult.token;
		}
	}
	
	async function verifyBuyer(payments, token)
	{
		const verificationDetails =
		{
			amount: '1.00',
			billingContact:
			{
				city: undefined,
				countryCode: undefined,
				email: undefined,
				familyName: undefined,
				givenName: undefined,
				phone: undefined,
				postalCode: undefined,
				state: undefined,
				addressLines: [],
			},
			currencyCode: 'GBP',
			intent: "CHARGE",
		};

		const verificationResults = await payments.verifyBuyer(token, verificationDetails);

		return verificationResults.token;
	}
	
	document.addEventListener('DOMContentLoaded', async function ()
	{
		if(!window.Square)
		{
			console.error('Square.js failed to load properly.');
		}

		let payments;

		try
		{
			
		}
		catch (error)
		{
			console.erorr(error);
			return;
		}

		let card;

		try
		{
			card = await initialiseCard(payments);
		}
		catch (error)
		{
			console.error("Initailising Card failed", error);
			return;
		}

		async function handlePaymentMethodSubmission(event, paymentMethod, shouldVerify = false)
		{
			event.preventDefault();
			try
			{
				cardButton.disabled = true;
				const token = await tokenise(paymentMethod);
				let verificationToken;
	
				if (shouldVerify)
				{
					verificationToken = await verifyBuyer(payments, token);
				}
	
				console.log(verificationToken);
			}
			catch (error)
			{
				cardButton.disabled = false;
				console.error(error.message);
			}

		}

		const cardButton = document.querySelector("#cardButton");
		cardButton.addEventListener('click', async function (event) {handlePaymentMethodSubmission(event, card, true)});
	});
</script>
</x-app-layout>