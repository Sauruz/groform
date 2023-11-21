<select name="{{$input['id']}}"
        class="form-control  @error($input['id']) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
        style="@isset($input['style']) {{$input['style']}} @endif"
>
    <option value="">- @lang('Select') - </option>
    @foreach ($input['options'] as $k => $v)
        <option value="{{$k}}"
                @if(old($input['id']) && $k == old($input['id'])  || isset($model) && $k == accessProperty($model, $input['id']) ) selected @endif
                @if(isset($input['disabledOptions']) && in_array($k, $input['disabledOptions']) && $k !== accessProperty($model, $input['id'])) disabled @endif
        >{{$v}}</option>
    @endforeach
</select>
