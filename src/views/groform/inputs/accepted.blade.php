<div class="form-check">
    <input type="hidden" name="{{$input['id']}}" value="off">
    <input name="{{$input['id']}}"
           class="form-check-input @error($input['id']) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif" type="checkbox" id="flexCheck{{$input['id']}}"
           style="@isset($input['style']) {{$input['style']}} @endif"
           @if(isset($input['rule']) && str_contains($input['rule'], 'accepted'))  required @endif
           @if(old(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])))
               @if( old(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])) == 'on') checked @endif
           @elseif(isset($model) && Sauruz\Groform\Groform::accessProperty($model, $input['id']) == 1)
               checked
        @endif>
    <label class="form-check-label" for="flexCheck{{$input['id']}}">
        {!! $input['placeholder']!!}
    </label>
</div>
