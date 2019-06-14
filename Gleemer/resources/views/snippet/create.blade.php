@extends('layouts/default')

@section('title', 'Submit')

@section('content')
	<div id="snippet-create-content-wrapper">
		<form class="display(flex) flex-direction(column) flex-grow(1)" method="post" action="/snippets/store">
			@csrf
			<div class="snippet-create-form-row display(flex) align-items(flex-start) margin-bottom(8px)">
				<input class="flex-grow(1) margin-right(8px)" type="text" name="title"/>
				<select name="visibility_mode">
					<option disabled selected>Select visibility..</option>
					@foreach(config('gleemer.visibility_modes') as $mode)
						<option>{{ $mode }}</option>
					@endforeach
				</select>
			</div>
			<div class="snippet-create-form-row display(flex) align-items(flex-start) flex-grow(1) margin-bottom(8px)">
				<textarea class="align-self(stretch) flex-grow(1)" name="contents">class Hello
{
    static void Main()
    {
        Console.WriteLine("Hello World!");

        // Keep the console window open in debug mode.
        Console.WriteLine("Press any key to exit.");
        Console.ReadKey();
    }
}				</textarea>
			</div>
			<div class="snippet-create-form-row display(flex) align-items(flex-start)">
				<select name="language">
					<option disabled selected>Select language..</option>
					@foreach(config('gleemer.languages') as $i => $language)
						<option>{{ $language }}</option>
					@endforeach
				</select>
				<input class="margin-left(auto)" type="submit"/>
			</div>
		</form>
	</div>
@endsection
