<form id="medicineHistoriesForm">
    <div class="card">
        <div class="card-header">
            <h4>Medical History <p>Mark (✓) any of these you may suffer from so we can
                    work out a holistic wellness plan for you</p>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Chronic Diseases</label>
                        <select class="form-control select2" multiple="" name="chronic_diseases" id="chronic_diseases">
                            @php($chronic_diseases_arr = isset($user_data['chronic_diseases']) ? explode(',',
                            $user_data['chronic_diseases']) : [])
                            @foreach ($data['chronic_diseases'] as $singleData)
                            <option {{ in_array($singleData['name'], $chronic_diseases_arr ) ? 'selected' : '' }}
                                value="{{ $singleData['name'] }}">
                                {{ $singleData['name'] }} </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label> Bone Health </label>
                        <select class="form-control select2" multiple="" name="bone_health" id="bone_health">
                            @php($bone_health_arr = isset($user_data['bone_health']) ? explode(',',
                            $user_data['bone_health']) : [])
                            @foreach ($data['bone_health'] as $singleData)
                            <option {{ in_array($singleData['name'], $bone_health_arr ) ? 'selected' : '' }}
                                value="{{ $singleData['name'] }}"> {{ $singleData['name'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label> Gastro Instestinal </label>
                        <select class="form-control select2" multiple="" name="gastro_instestinal"
                            id="gastro_instestinal">
                            @php($gastro_instestinal_arr = isset($user_data['gastro_instestinal']) ? explode(',',
                            $user_data['gastro_instestinal']) : [])
                            @foreach ($data['gastro_instestinal'] as $singleData)
                            <option {{ in_array($singleData['name'], $gastro_instestinal_arr ) ? 'selected' : '' }}
                                value="{{ $singleData['name'] }}"> {{ $singleData['name'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Others</label>
                        <select class="form-control select2" multiple="" name="others" id="others">
                            @php($others_arr = isset($user_data['others']) ? explode(',',
                            $user_data['others']) : [])
                            @foreach ($data['others'] as $singleData)
                            <option {{ in_array($singleData['name'], $others_arr ) ? 'selected' : '' }}
                                value="{{ $singleData['name'] }}"> {{ $singleData['name'] }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                        <textarea class="form-control" name="medical_prob"
                            value="{{ $user_data['medical_prob'] ?? '' }}">{{ $user_data['medical_prob'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Do you have any food allergies?</label>
                        <textarea class="form-control" name="food_allergy"
                            value="{{ $user_data['food_allergy'] ?? '' }}">{{ $user_data['food_allergy'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Have you ever been hospitalised?</label>
                        <textarea class="form-control" name="hopitalised"
                            value="{{ $user_data['hopitalised'] ?? '' }}">{{ $user_data['hopitalised']  ?? ''}}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Past Surgery Details? </label>
                        <textarea class="form-control" name="past_surgery"
                            value="{{ $user_data['past_surgery'] ?? '' }}">{{ $user_data['past_surgery']  ?? ''}}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Father Side Medical Info</label>
                        <textarea class="form-control" name="father_side"
                            value="{{ $user_data['father_side'] ?? '' }}">{{ $user_data['fasther_side']  ?? ''}}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mother Side Medical Info</label>
                        <textarea class="form-control" name="mother_side"
                            value="{{ $user_data['mother_side']  ?? ''}}">{{ $user_data['mother_side']  ?? ''}}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>How often do you suffer from cold, cough or flu?</label>
                        <textarea id="6" class="form-control" name="cold_cough_flu"
                            value="{{ $user_data['cold_cough_flu']  ?? ''}}">{{ $user_data['cold_cough_flu'] ?? '' }}</textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Family doctor details?</label>
                        <textarea class="form-control" name="family_doc_details"
                            value="{{ $user_data['family_doc_details'] ?? '' }}">{{ $user_data['family_doc_details'] ?? '' }}</textarea>
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
                        <textarea class="form-control" name="delivery_yrs"
                            value="{{ $user_data['delivery_yrs'] ?? '' }}">{{ $user_data['delivery_yrs'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Period Timeline</label>
                        <textarea class="form-control" name="periods_timeline"
                            value="{{ $user_data['periods_timeline'] ?? '' }}">{{ $user_data['periods_timeline'] ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Period Symtoms</label>
                        <textarea class="form-control" name="periods_symtoms"
                            value="{{ $user_data['periods_symtoms'] ?? '' }}">{{ $user_data['periods_symtoms'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" id="saveUser" type="button">Save Changes</button>
    </div>
</form>