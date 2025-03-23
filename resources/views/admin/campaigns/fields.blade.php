<div class="row gx-10 mb-5">
    <div class="col-lg-6">
        <div class="mb-5">
            <label for="campaignCreateTitle" class="form-label required">{{ __('messages.common.title') }}:</label>
            <input type="text" name="title" id="campaignCreateTitle" class="form-control"
                   placeholder="{{ __('messages.common.title') }}" required maxlength="50">
        </div>
    </div>

    <div class="col-lg-6" style="display:none">
        <div class="mb-5">
            <label for="campaignCreateSlug" class="form-label required">{{ __('messages.common.slug') }}:</label>
            <input type="text" name="slug" id="campaignCreateSlug" class="form-control"
                   placeholder="{{ __('messages.common.slug') }}" required readonly>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            <label for="campaignCategoryId" class="form-label required">{{ __('messages.campaign.campaign_category') }}:</label>
            <select name="campaign_category_id" id="campaignCategoryId" class="form-select" required
                    data-control="select2">
                <option value="">{{ __('messages.campaign.select_campaign_category') }}</option>
                @foreach($campaignCategory as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            <label for="status" class="form-label required">{{ __('messages.common.status') }}:</label>
            <select name="status" id="status" class="form-select" required data-control="select2">
                <option value="">{{ __('messages.common.status') }}</option>
                @foreach($status as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-5">
            <label for="short_description" class="form-label">{{ __('messages.common.short_description') }}:</label>
            <textarea name="short_description" id="short_description" class="form-control"
                      placeholder="{{ __('messages.common.short_description') }}" rows="5" maxlength="500"></textarea>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{ __('messages.common.image') }}:</label>
            <span data-bs-toggle="tooltip" data-placement="top"
                  data-bs-original-title="Best resolution for this image will be 200x200">
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark"></i>
            </span>
            <span class="required"></span>

            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage image-object-fit" id="profileImageIcon"
                         style="background-image:url('{{ asset('front_landing/images/cause-details.png') }}')"></div>
                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                          data-placement="top" data-bs-original-title="Change Image">
                        <label>
                            <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" name="image" class="image-upload d-none" accept="image/*">
                            <input type="hidden" name="avatar_remove">
                        </label>
                    </span>
                </div>
            </div>
            <div class="form-text">{{ __('messages.common.allowed_file_types') }}</div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="mb-7">
            <label for="campaignCreateDescription" class="form-label required">{{ __('messages.common.description') }}:</label>
            <div id="campaignDescriptionCreateId" class="editor-height"></div>
            <input type="hidden" name="description" id="campaignCreateDescription">
        </div>
    </div>

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary me-2" id="btnSubmit">{{ __('messages.common.save') }}</button>
        <a href="{{ route('campaigns.index') }}" class="btn btn-secondary">{{ __('messages.common.discard') }}</a>
    </div>
</div>
