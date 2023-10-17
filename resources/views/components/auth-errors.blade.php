<div>
    @props(['errors'])
    
    @if ($errors->any())
        <div {{ $attributes->merge(['class' => 'mt-10']) }}>
            <h1>
                {{ __('Whoops! Niečo sa nepodarilo. :\ ') }}
            </h1>
    
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    </div>