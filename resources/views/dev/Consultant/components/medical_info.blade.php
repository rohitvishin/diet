<div class="card">
    <div class="card-header">
        <h4>Medical History <p>Mark (✓) any of these you may suffer from so we can
                work out a holistic wellness plan for you</p>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            @for ($i = 0; $i < count($data); $i++) <div class="col-md-3">
                <div class="form-group">
                    <label> {{ $data[$i][0]->type }} </label>
                    <select class="form-control select2" multiple="">
                        @foreach ($data[$i] as $singleData)
                        <option> {{ $singleData['name'] }} </option>
                        @endforeach
                    </select>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Other Medical Details</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Do you have any other medical problems that are not
                        covered above?</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Do you have any food allergies?</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Have you ever been hospitalised?</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Past Surgery Details? </label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Father Side Medical Info</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Mother Side Medical Info</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>How often do you suffer from cold, cough or flu?</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Family doctor details?</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>
</hr>
<div class="card">
    <div class="card-header">
        <h4>Are you a female? Tell us about your obstetric history.</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Year(s) of delivery.</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label>Period Regular Timeline</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label>Period Regular Symtoms</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary">Save Changes</button>
</div>