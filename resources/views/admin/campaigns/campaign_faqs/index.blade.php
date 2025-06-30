<ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <button class="nav-link {{ $option == 'default' ? 'active' : ''}} p-0" id="campaign-tab" data-bs-toggle="tab" data-bs-target="#campaignFaqs"
                type="button" role="tab" aria-controls="campaignFaqs" aria-selected="true" >
            {{__('messages.campaign_faqs.campaign_faqs')}}
        </button>
    </li> 
    <li class="nav-item position-relative me-7 mb-3" role="presentation">
        <button class="nav-link p-0" id="campaign-updates-tab" data-bs-toggle="tab" data-bs-target="#campaignUpdates"
                type="button" role="tab" aria-controls="campaignUpdates" aria-selected="false">
            {{__('messages.campaign_updates.campaign_updates')}}
        </button>
    </li>
    
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade {{ $option == 'default' ? 'show active' : ''}} " id="campaignFaqs" role="tabpanel" aria-labelledby="campaign-tab">
        <livewire:campaign-faq-table :campaign-id="$campaign->id"/>
        @include('admin.campaigns.campaign_faqs.create-modal')
        @include('admin.campaigns.campaign_faqs.edit-modal')
        @include('admin.campaigns.campaign_faqs.show_model')
    </div>
    <div class="tab-pane fade" id="campaignUpdates" role="tabpanel" aria-labelledby="campaign-updates-tab">
        <livewire:campaign-update-table :campaign-id="$campaign->id"/>
        @include('admin.campaigns.campaign_updates.create-modal')
        @include('admin.campaigns.campaign_updates.edit-modal')
        @include('admin.campaigns.campaign_updates.show_model')
    </div>
    
</div>

