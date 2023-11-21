<input type="{{$input['type']}}"
       id="{{$input['id']}}"
       name="{{$input['id']}}"
       class="form-control  @error(Gromatics\Groform\Groform::arrayToDotNotation($input['id'])) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
       style="@isset($input['style']) {{$input['style']}} @endif"
       @error(Gromatics\Groform\Groform::arrayToDotNotation($input['id'])) aria-invalid @enderror
       placeholder="{{isset($input['placeholder']) ? $input['placeholder'] :  $input['title']}}"
       value="{{old(Gromatics\Groform\Groform::arrayToDotNotation($input['id']), isset($model) ? Gromatics\Groform\Groform::accessProperty($model, $input['id']) : null)}}"
    {{ Gromatics\Groform\Groform::formSetRequired($input)}} >
