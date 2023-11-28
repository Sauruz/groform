<textarea style="{{isset($input['style']) ?$input['style'] : 'height: 100px;'}}"
          id="{{$input['id']}}"
          class="form-control @error(Sauruz\Groform\Groform::arrayToDotNotation($input['id'])) is-invalid @enderror @isset($input['class']) {{$input['class']}} @endif"
          style="@isset($input['style']) {{$input['style']}} @endif"
          name="{{$input['id']}}"
          placeholder="{{isset($input['placeholder']) ? __($input['placeholder']) :  __($input['title'])}}"
          {{ Sauruz\Groform\Groform::formSetRequired($input)}} >{{old(Sauruz\Groform\Groform::arrayToDotNotation($input['id']), isset($model) ? Sauruz\Groform\Groform::accessProperty($model, $input['id']) : null)}}</textarea>
