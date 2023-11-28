<!-- Error handling -->
@if ($errors->all())
    <div id="form-error" style="margin-top: -200px; padding-bottom: 200px;"> </div>
    <div class="alert alert-danger bg-danger border-danger text-white">
        {{$errors->first()}}
    </div>
    <script type="application/javascript">
        location.hash = "form-error";
    </script>
@endif
@if (session()->has('success'))
    <div id="form-success" style="margin-top: -200px; padding-bottom: 200px;"></div>
    <script type="application/javascript">
        location.hash = "form-success";
    </script>
    <div class="alert alert-success bg-success border-success text-white">
        {{ session('success')}}
    </div>
@endif
@if (session()->has('error'))
    <div id="form-success" style="margin-top: -200px; padding-bottom: 200px;"></div>
    <script type="application/javascript">
        location.hash = "form-success";
    </script>
    <div class="alert alert-danger bg-danger border-danger text-white">
        {{ session('error')}}
    </div>
@endif
<!-- /Error handling -->


@if (!session('success'))
    <form method="post" class="needs-validation" novalidate enctype="multipart/form-data" @if($action) action="{{$action}}" @endif >
        @csrf
        @foreach($form['sections'] as $section)
            <div class="row">
                @if(isset($form['show_section_labels']) && $form['show_section_labels'])
                    <div class="col-md-4">
                        <h4>@lang($section['label'])</h4>
                    </div>
                @endif
                <div class="@if(isset($form['show_section_titles']) && $form['show_section_titles']) col-md-8 @else col-12 @endif">
                    <div class="row mb-4">
                        @foreach($section['fields'] as $input)
                            <div class="col-md-12 mb-3">
                                @if($input['title'])
                                    <label for="{{$input['id']}}" class="col-form-label">
                                        <span>@lang($input['title'])</span>
                                        @if(isset($input['subtitle']))
                                            <br><small class="text-muted">@lang($input['subtitle'])</small>
                                        @endif
                                    </label>
                                @endif
                                @if(!empty($input))
                                    @if(View::exists('vendor.groform.inputs.' . $input['type']))
                                        @include('vendor.groform.inputs.' . $input['type'])
                                    @elseif(View::exists('groform::groform.inputs.' . $input['type']))
                                        @include('groform::groform.inputs.' . $input['type'])
                                    @elseif(View::exists('vendor.groform.inputs.text'))
                                        @include('vendor.groform.inputs.text')
                                    @else
                                        @include('groform::groform.inputs.text')
                                    @endif
                                    @error(Sauruz\Groform\Groform::arrayToDotNotation($input['id']))
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <hr class="mt-5">
        <div class="row">
            <div class="col-md-12 mb-3 text-end">
                <button type="submit" class="btn btn-warning ms-auto  w-100  w-md-auto">@lang($buttons['submit'])</button>
            </div>
        </div>
    </form>
@endif
