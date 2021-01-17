@extends('layouts.app')

@section('content')
<form action="{{ route('storepost') }}" method="POST">
	@csrf
	<div class="mb-3">
		<input type="text" name="name" placeholder="name">
		<input type="text" name="description" placeholder="description">
		<input type="number" name="price" placeholder="price">
	<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
@endsection
