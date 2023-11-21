<textarea style="{{isset($input['style']) ?$input['style'] : 'height: 100px;'}}"
          id="{{$input['id']}}"
          class="form-control @error(Gromatics\Groform\Groform::arrayToDotNotation($input['id'])) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
          style="@isset($input['style']) {{$input['style']}} @endif"
          name="{{$input['id']}}"
          placeholder="{{isset($input['placeholder']) ? $input['placeholder'] : $input['title']}}"
          {{ Gromatics\Groform\Groform::formSetRequired($input)}} >{{old(Gromatics\Groform\Groform::arrayToDotNotation($input['id']), isset($model) ? Gromatics\Groform\Groform::accessProperty($model, $input['id']) : null)}}</textarea>
