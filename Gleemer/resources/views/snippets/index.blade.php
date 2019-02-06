@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div id="snippets-index-content">
        <div id="snippets-index-list">
            @for ($i=1; $i < 10; $i++)
                <div class="panel">
                    <div class="panel-division flex">
                        <span>Snippet Title #{{ $i }}</span>
                        <div class="ml-a">User</div>
                    </div>
                    <div class="panel-division flex ai-c">
                        <div>language</div>
                        <div class="ml-a">tags</div>
                    </div>
                </div>
            @endfor
        </div>
        <div id="snippets-index-side">
            <div class="panel">
                <div class="panel-division flex">
                    <span>Statistics</span>
                </div>
                <div class="panel-division info flex">
                    <span class="mr-16">{{ rand(0, 100) }}</span>
                    <span>Snippets</span>
                </div>
                <div class="panel-division info flex">
                    <span class="mr-16">{{ rand(0, 100) }}</span>
                    <span>Views</span>
                </div>
                <div class="panel-division info flex">
                    <span class="mr-16">{{ rand(0, 100) }}</span>
                    <span>Users</span>
                </div>
            </div>
        </div>
    </div>
@endsection
