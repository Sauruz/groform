<input type="file"
       id="{{$input['id']}}"
       name="{{$input['id']}}"
       class="form-control w-100 @error(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
       placeholder="{{isset($input['placeholder']) ? $input['placeholder'] :  $input['title']}}"
       value="{{old(Sauruz\Groform\Groform::arrayToDotNotation($input['id']))}}"
    {{ Sauruz\Groform\Groform::formSetRequired($input)}} >

@if(isset($model))
    @php
        $explode = explode('/', Sauruz\Groform\Groform::accessProperty($model, $input['id']));
    @endphp
    <small>{{ end($explode)}}<br></small>
@endif

@if(str_contains($input['rule'], 'max:'))
    @php
        $explode = explode('|', $input['rule']);
        $mb = str_replace('max:', '', current(array_filter($explode, function($var) {
            return str_contains($var, 'max:');
        })));
    @endphp
    <span class="text-muted">@lang('Maximum grootte: :size', ['size' => formatBytes($mb)])</span>
@endif
