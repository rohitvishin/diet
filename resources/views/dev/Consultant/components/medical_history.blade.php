<div class="card">
    <div class="card-header">
        <h4>Medical History <p>Mark (✓) any of these you may suffer from so we can
                work out a holistic wellness plan for you</p>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            @for ($i = 0; $i < count($data); $i++)
                <div class="col-md-3">
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
                        covered above? Please give us the details.</label>
                    <textarea id="1" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Do you have any food allergies? If you do, please name
                        the foods and the reactions they cause in your body.</label>
                    <textarea id="2" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Have you ever been hospitalised? If yes, please write
                        down when and for what reason.</label>
                    <textarea id="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Have you undergone surgery in the past? If you have,
                        please mention when and for what.</label>
                    <textarea id="4" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Certain health problems such as diabetes, high blood
                        pressure, cancer,
                        heart ailments, thyroid, asthma, high cholesterol,
                        rheumatoid arthritis,
                        thalassemia minor run in our families. Please take a moment
                        to think about whether
                        any of these are present in yours. This will help us analyse
                        your case more accurately.</label>
                    <textarea id="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>How often do you suffer from cold, cough or flu?</label>
                    <textarea id="6" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>What’s the name of your family
                        doctor/GP/īendocrinologist?</label>
                    <textarea id="7" class="form-control"></textarea>
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
                    <label>do you have children? if you do, please mention the
                        year(s) of delivery.</label>
                    <textarea id="8" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-md-7">
                <div class="form-group">
                    <label>are you a breastfeeding mother? if yes, please mention
                        how many months you have been nursing your child
                        for.</label>
                    <textarea id="9" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>have you menopaused?</label>
                    <br>
                    <input id="10" type="radio" value="yes">Yes
                    <input id="10" type="radio" value="no">No
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>if you haven’t menopaused, do you have regular
                        periods?</label>
                    <br>
                    <input id="11" type="radio" value="yes">Yes
                    <input  id="11" type="radio" value="no">No
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>please tell us the name of your gynaecologist.</label>
                    <textarea id="12" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <button id="saveMedicalHistory" class="btn btn-primary">Save Changes</button>
</div>
