<div class="card">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="addBasicDetails" role="tabpanel" aria-labelledby="add-basic-details-tab">
                {{ Form::open(['route' => ['projects.update', $project->id], 'files' => 'true', 'id' => 'projectEditForm', 'enctype' => 'multipart/form-data']) }}
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-5">
                                {{ Form::label('title', __('messages.common.title') . ':', ['class' => 'form-label required']) }}
                                {{ Form::text('title', isset($project) ? $project->title : '', ['class' => 'form-control ', 'placeholder' => __('messages.common.title'), 'id' => 'projectCreateTitle', 'required', 'maxLength' => 50]) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-5">
                                {{ Form::label('slug', __('messages.common.slug') . ':', ['class' => 'form-label required']) }}
                                {{ Form::text('slug', isset($project) ? $project->slug : '', ['class' => 'form-control ', 'placeholder' => __('messages.common.slug'), 'id' => 'projectCreateSlug', 'readonly', 'required']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-5">
                                {{ Form::label('campaign_category_id', __('messages.project.project_category') . ':', ['class' => 'form-label required']) }}
                                {{ Form::select('campaign_id', $campaignCategory, isset($project) ? $project->campaign_id : '', ['class' => 'form-select', 'required', 'data-control' => 'select2', 'placeholder' => __('messages.project.select_project_category'), 'id' => 'projectCategoryId']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-5">
                                {{ Form::label('status', __('messages.common.status') . ':', ['class' => 'form-label required']) }}
                                {{ Form::select('status', $status, isset($project) ? $project->status : '', ['class' => 'form-select', 'required', 'data-control' => 'select2', 'placeholder' => 'Select Status']) }}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-5">
                                {{ Form::label('short_description', __('messages.common.short_description') . ':', ['class' => 'form-label']) }}
                                {{ Form::textarea('short_description', isset($project) ? $project->short_description : '', ['class' => 'form-control', 'placeholder' => __('messages.common.short_description'), 'rows' => '5', 'maxLength' => 500]) }}
                            </div>
                        </div>
                        <div class="col-lg-3 mb-5">
                            <div io-image-input="true">
                                <label for="exampleInputImage"
                                    class="form-label">{{__('messages.common.image')}}</label>
                                <span data-bs-toggle="tooltip" data-placement="top"
                                    data-bs-original-title="Best resolution for this image will be 200x200">
                                    <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
                                </span>
                                <span class="required"></span>
                                <div class="d-block">
                                    <div class="image-picker">
                                        <div class="image previewImage" id="exampleInputImage"
                                            style="background-image: url('{{ isset($project) ? $project->image : asset('front_landing/images/cause-details.png') }}')">
                                        </div>
                                        <span class="picker-edit rounded-circle text-gray-500 fs-small" title="edit">
                                            <label><span data-bs-toggle="tooltip" data-placement="top"
                                                    data-bs-original-title="Change Image">
                                                    <i class="fa-solid fa-pen" id="profileImageIcon"></i></span>
                                                <input type="file" id="profile_image" name="image"
                                                    class="image-upload d-none" accept="image/*" />
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-5">
                                {{ Form::label('description', __('messages.common.description') . ':', ['class' => 'form-label required']) }}
                                <div id="editCampaignDescriptionId" class="vh-ql-container"></div>
                                {{ Form::hidden('description', $project->description, ['id' => 'editCampaignDescription']) }}
                            </div>
                        </div>

                        <div class="d-flex">
                            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-5', "id" => "editCampaignBtn"]) }}
                            <a href="{{ route('projects.index') }}" type="reset"
                                class="btn btn-secondary">{{__('messages.common.discard')}}</a>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <div class="tab-pane fade  show active" id="addDefineGoal" role="tabpanel"
                aria-labelledby="add-define-goal">
                {{ Form::open(['id' => 'editCampaignFieldForm']) }}
                {{ Form::hidden('id', isset($project) ? $project->id : '', ['id' => 'projectId']) }}
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::label('current_currency', __('messages.setting.currency') . ':', ['class' => 'form-label required']) }}
                        <select id="currencyType" data-show-content="true" class="form-select form-select-solid"
                            name="currency">
                            @foreach($currencies as $key => $currency)
                                <option value="{{$key}}" {{$project->currency == $key ? 'selected' : ''}}>
                                    {{ $currency['symbol'] }}
                                    &nbsp;&nbsp;&nbsp; {{$currency['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6" style="display: none">
                        <div class="mb-5">
                            {{ Form::label('goal', __('messages.project.goal') . ':', ['class' => 'form-label required']) }}
                            {{ Form::text('goal', isset($project) ? $project->goal : '', ['class' => 'form-control ', 'placeholder' => __('messages.project.goal'), 'required', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('recommended_amount', __('messages.project.recommended_amount') . ':', ['class' => 'form-label required']) }}
                            {{ Form::text('recommended_amount', isset($project) ? $project->recommended_amount : '', ['class' => 'form-control ', 'placeholder' => __('messages.project.recommended_amount'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                        </div>
                    </div>
                    <div class="col-lg-6" style="display: none">
                        <div class="mb-5">
                            {{ Form::label('amount_prefilled', __('messages.project.amount_prefilled') . ':', ['class' => 'form-label required']) }}
                            {{ Form::text('amount_prefilled', isset($project) ? $project->amount_prefilled : '', ['class' => 'form-control ', 'required', 'placeholder' => __('messages.project.amount_prefilled'), 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('project_end_method', __('messages.project.project_end_method') . ':', ['class' => 'form-label required']) }}
                            <div class="d-flex justify-content-between align-self-center">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input name="project_end_method" class="form-check-input me-3" type="radio"
                                            value="{{ \App\Models\Campaign::AFTER_GOAL_ACHIEVE }}" {{ ($project->project_end_method == \App\Models\Campaign::AFTER_GOAL_ACHIEVE || $project->project_end_method == null) ? 'checked' : '' }}>
                                        {{ __('messages.project.after_goal_achieve') }}
                                    </label>
                                </div>
                                <div class="d-inline-block col-6">
                                    <label class="form-check-label">
                                        <input name="project_end_method" class="form-check-input me-3" type="radio"
                                            value="{{ \App\Models\Campaign::AFTER_END_DATE }}" {{ ($project->project_end_method == \App\Models\Campaign::AFTER_END_DATE) ? 'checked' : '' }}>
                                        {{ __('messages.project.after_end_date') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('video_link', __('messages.project.video') . ':', ['class' => 'form-label']) }}
                            {{ Form::text('video_link', isset($project) ? $project->video_link : '', ['class' => 'form-control ', 'placeholder' => __('messages.project.video_link')]) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('country_id', __('messages.country.country') . ':', ['class' => 'form-label required']) }}
                            {{ Form::select('country_id', $country, isset($project) ? $project->country_id : '', ['class' => 'form-select', 'required', 'data-control' => 'select2', 'placeholder' => __('messages.country.select_country')]) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('location', __('messages.project.location') . ':', ['class' => 'form-label']) }}
                            {{ Form::text('location', isset($project) ? $project->location : '', ['class' => 'form-control ', 'placeholder' => __('messages.project.location')]) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('start_date', __('messages.project.start_date') . ':', ['class' => 'form-label required']) }}
                            {{ Form::text('start_date', isset($project) ? $project->start_date : '', ['class' => 'form-control bg-white', 'placeholder' => __('messages.project.select_start_date'), 'id' => 'projectStartDate', 'required']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-5">
                            {{ Form::label('deadline', __('messages.project.deadline') . ':', ['class' => 'form-label required']) }}
                            {{ Form::text('deadline', isset($project) ? $project->deadline : '', ['class' => 'form-control bg-white', 'placeholder' => __('messages.project.select_deadline_date'), 'id' => 'projectDeadlineDate', 'required']) }}
                        </div>
                    </div>
                    <div class="col-lg-3 mb-5">
                        {{ Form::label('is_featured', __('messages.project.is_featured') . (':'), ['class' => 'form-label']) }}
                        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                            <input type="checkbox" name="is_featured" class="form-check-input editIsFeatured" value="1"
                                {{ (isset($project) && $project->is_featured == 1) ? 'checked' : '' }}>
                        </label>
                    </div>
                    <div class="col-lg-3 mb-5" style="display: none">
                        {{ Form::label('is_emergency', __('messages.project.is_emergency') . (':'), ['class' => 'form-label']) }}
                        <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm">
                            <input type="checkbox" name="is_emergency" class="form-check-input editIsEmergency"
                                value="1" {{ (isset($project) && $project->is_emergency == 1) ? 'checked' : '' }}>
                        </label>
                    </div>

                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary me-0"
                            id="editCampaignFieldBtnSave">{{ __('messages.common.save') }}</button>&nbsp;&nbsp;&nbsp;
                        <a href="{{ route('projects.index') }}" type="reset"
                            class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
                    </div>
                </div>
            </div>
            {{ Form::close() }}

            <div class="tab-pane fade" id="addGallery" role="tabpanel" aria-labelledby="add-gallery-tab">
                {{ Form::open(['id' => 'editCampaignImageForm']) }}
                <div class="card-body maincard-section p-12">
                    <div class="row gx-10 mb-5">
                        <div class="col-12">
                            <div class="dropzone border-primary" id="projectImageDropZone">
                                <div class="dz-message needsclick text-start d-flex justify-content-start">
                                    <i class="bi bi-file-earmark-arrow-up text-primary fa-3x"></i>
                                    <div class="ms-4">
                                        <h3 class="text-gray-900 mb-1">
                                            {{__('messages.common.drop_files_here_or_click_to_upload')}}</h3>
                                        <span
                                            class="text-gray-400">{{__('messages.common.upload_up_to_10_files')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>