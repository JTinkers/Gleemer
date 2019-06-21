@extends('layouts/default')

@section('title', 'Submit')

@section('content')
	<div id="snippet-create-content-wrapper">
		<form class="display(flex) flex-direction(column) flex-grow(1)" method="post" action="/snippet/store">
			<div class="panel flex-grow(1)">
				@csrf
				<div class="panel-header">
					<input class="flex-grow(1) margin-left(-8px) margin-right(8px)" type="text" name="title"/>
					<select name="visibility_mode">
						<option disabled selected>Select visibility..</option>
						@foreach(config('gleemer.visibility_modes') as $mode)
							<option>{{ $mode }}</option>
						@endforeach
					</select>
				</div>
				<div class="panel-section">
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
				<div class="panel-footer">
					<select name="language">
						<option disabled selected>Select language..</option>
						@foreach(config('gleemer.languages') as $i => $language)
							<option>{{ $language }}</option>
						@endforeach
					</select>
					<input class="margin-left(auto) margin-right(-8px)" type="submit" value="Submit"/>
				</div>
			</div>
		</form>
	</div>
@endsection
