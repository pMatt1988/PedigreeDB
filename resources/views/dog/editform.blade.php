{{--<form action='/dogs' method="POST">--}}
{{ html()->form('PATCH', "/dogs/{$dog->id}")->class('form-horizontal')->attribute('autocomplete="off"')->open() }}
<div class="form-group row">
    <label for="name" class="col-4 col-form-label">Name</label>
    <div class="col-8">
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $dog->name) }}">
    </div>
</div>
<div class="form-group row">
    <label for="sire" class="col-4 col-form-label">Sire</label>
    <div class="col-8">
        <input id="sire" name="sire" type="text" class="form-control" value="{{ old('sire', ($dog->father() != null) ? $dog->father()->name : null) }}">

    </div>
</div>
<div class="form-group row">
    <label for="dam" class="col-4 col-form-label">Dam</label>
    <div class="col-8">
        <input id="dam" name="dam" type="text" class="form-control" value="{{ old('dam', ($dog->mother() != null) ? $dog->mother()->name : null) }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-4">Sex</label>
    <div class="col-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input name="sex" id="sexMale" type="radio" class="custom-control-input" value="male"
                    {{ (old('sex') == 'male' || $dog->sex == 'male') ? 'checked' : '' }}>
            <label for="sexMale" class="custom-control-label">Male</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input name="sex" id="sexFemale" type="radio" class="custom-control-input" value="female"
                    {{ (old('sex') == 'female' || $dog->sex == 'female') ? 'checked' : '' }}>
            <label for="sexFemale" class="custom-control-label">Female</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="dob" class="col-4 col-form-label">Date of Birth</label>
    <div class="col-8">
        <input id="dob" name="dob" type="text" class="form-control" aria-describedby="dobHelpBlock"
               value="{{ old('dob', $dog->dob) }}">
        <span id="dobHelpBlock" class="form-text text-muted">Format YYYY-DD-MM (2005-27-05)</span>
    </div>
</div>
<div class="form-group row">
    <label for="pretitle" class="col-4 col-form-label">Pre-title</label>
    <div class="col-8">
        <input id="pretitle" name="pretitle" type="text" class="form-control" value="{{ old('pretitle', $dog->pretitle) }}">
    </div>
</div>
<div class="form-group row">
    <label for="posttitle" class="col-4 col-form-label">Post-title</label>
    <div class="col-8">
        <input id="posttitle" name="posttitle" type="text" class="form-control" value="{{ old('posttitle', $dog->posttitle) }}">
    </div>
</div>
<div class="form-group row">
    <label for="reg" class="col-4 col-form-label">Registration Number</label>
    <div class="col-8">
        <input id="reg" name="reg" type="text" class="form-control" value="{{ old('reg', $dog->reg) }}">
    </div>
</div>
<div class="form-group row">
    <label for="color" class="col-4 col-form-label">Color</label>
    <div class="col-8">
        <input id="color" name="color" type="text" class="form-control" value="{{ old('color', $dog->color) }}">
    </div>
</div>
<div class="form-group row">
    <label for="markings" class="col-4 col-form-label">Markings</label>
    <div class="col-8">
        <input id="markings" name="markings" type="text" class="form-control" value="{{ old('markings', $dog->markings) }}">
    </div>
</div>

<div class="form-group row">
    <div class="offset-4 col-8">
        {{--{{ html()->button('Submit', 'submit', 'submit')->class('btn btn-primary') }}--}}
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{{ html()->form()->close() }}


@push('after-scripts')
    {{ script('js/typeahead.js') }}

    <script type="text/javascript">
        $('#sire').typeahead({
            minLength: 3,
            fitToElement: true,
            source: function(query, process) {
                $.get('../../autocomplete/' + query + '/male', function(data) {
                    console.log(data);
                    return process(JSON.parse(data));
                });
            },
        })
    </script>

    <script type="text/javascript">
        $('#dam').typeahead({
            minLength: 3,
            fitToElement: true,
            source: function(query, process) {
                $.get('../../autocomplete/' + query + '/female', function(data) {
                    console.log(data);
                    return process(JSON.parse(data));
                });
            },
        })
    </script>
@endpush
