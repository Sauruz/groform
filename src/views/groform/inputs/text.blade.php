<input type="{{$input['type']}}"
       id="{{$input['id']}}"
       name="{{$input['id']}}"
       class="form-control  @error(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
       style="@isset($input['style']) {{$input['style']}} @endif"
       @error(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])) aria-invalid @enderror
       placeholder="{{isset($input['placeholder']) ? __($input['placeholder']) :  __($input['title'])}}"
       value="{{old(Sauruz\Groform\Groform::arrayToDotNotation($input['id']), isset($model) ? Sauruz\Groform\Groform::accessProperty($model, $input['id']) : null)}}"
    {{ Sauruz\Groform\Groform::formSetRequired($input)}} >
