<div class="row">
     <div class="col-lg-3 col-md-3 col-sm-2 d-flex flex-column">
         {{ Form::label('name', __('messages.common.title').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
         <span class="fs-5 text-gray-800">{{ $campaign->title }}</span>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-2 d-flex flex-column mb-5">
         {{ Form::label('name', __('messages.campaign.campaign_category').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
         <span class="fs-5 text-gray-800">{{ $campaign->campaignCategory->name }}</span>
     </div>
    
     
     <div class="col-lg-12 col-md-12 col-sm-4 d-flex flex-column mt-4">
         {{ Form::label('description', __('messages.common.description').(':'), ['class' => 'pb-2 fs-5 text-gray-600']) }}
         <span class="fs-5 text-gray-800">
                                                 {!! nl2br($campaign->description) !!}
                                            </span>
     </div>
 </div>
 
 


