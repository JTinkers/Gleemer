@extends('layouts.default')

@section('content')
<div class="grid">
    <div class="row">
        @for ($i=0; $i < 20; $i++)
            <div>Span</div>
        @endfor
    </div>
    <hr>
    <div class="column">
        @for ($i=0; $i < 20; $i++)
            <div>Span</div>
        @endfor
    </div>
</div>
<hr>
<div class="grid">
    <div class="column">
        @for ($i=0; $i < 20; $i++)
            <div>Span</div>
        @endfor
    </div>
    <hr>
    <div class="row">
        @for ($i=0; $i < 20; $i++)
            <div>Span</div>
        @endfor
    </div>
</div>
@endsection
