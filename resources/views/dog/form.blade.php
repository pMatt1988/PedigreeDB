<form action='/dogs/' method="POST">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-4 col-form-label">Name</label>
        <div class="col-8">
            <input id="name" name="name" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="sire" class="col-4 col-form-label">Sire</label>
        <div class="col-8">
            <input id="sire" name="sire" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="dam" class="col-4 col-form-label">Dam</label>
        <div class="col-8">
            <input id="dam" name="dam" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4">Sex</label>
        <div class="col-8">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="sex" id="sex_0" type="radio" class="custom-control-input" value="male">
                <label for="sex_0" class="custom-control-label">Male</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="sex" id="sex_1" type="radio" class="custom-control-input" value="female">
                <label for="sex_1" class="custom-control-label">Female</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="dob" class="col-4 col-form-label">Date of Birth</label>
        <div class="col-8">
            <input id="dob" name="dob" type="text" class="form-control" aria-describedby="dobHelpBlock">
            <span id="dobHelpBlock" class="form-text text-muted">Format MM/DD/YYYY</span>
        </div>
    </div>
    <div class="form-group row">
        <label for="pretitle" class="col-4 col-form-label">Pre-title</label>
        <div class="col-8">
            <input id="pretitle" name="pretitle" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="posttitle" class="col-4 col-form-label">Post-title</label>
        <div class="col-8">
            <input id="posttitle" name="posttitle" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="reg" class="col-4 col-form-label">Registration Number</label>
        <div class="col-8">
            <input id="reg" name="reg" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="color" class="col-4 col-form-label">Color</label>
        <div class="col-8">
            <input id="color" name="color" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="markings" class="col-4 col-form-label">Markings</label>
        <div class="col-8">
            <input id="markings" name="markings" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
