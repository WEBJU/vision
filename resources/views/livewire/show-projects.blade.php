<div>
    <div class="tab-content pt-5 mb-lg-4 ps-lg-0 ps-md-3" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
             aria-labelledby="pills-home-tab">
            @if(count($projects) > 0)
            <div class="row">
                    <div class="row">
                        @foreach($projects as $index => $project)
                            <div wire:key="{{$project->id}}" class="col-xl-4 col-lg-6 col-md-6 trending-card">
                                <div class="card">
                                    <div class="positon-relative">
                                        <div class="card-img">
                                            <a href="{{route('landing.project.details',$project->slug) }}">
                                                <img src="{{$project->image ? : asset('front_landing/images/card-img.png')}}"
                                                     class="card-img-top object-fit-cover" alt="card">
                                            </a>
                                        </div>
                                        {{-- <a href="javascript:void(0)"
                                           class="badge small-btn campaign_category_id {{ $campaign->is_emergency == 1 ? 'custom-cause-red' : ''}}"
                                           data-id="{{ $campaign->campaignCategory->id }}"> {{ $campaign->campaignCategory->name}}</a>
                                        @php
                                            $shareUrl = Request::root().'/c/'.$campaign->slug;
                                        @endphp --}}
                                       
                                    </div>
                                    <div class="card-body">
                                        {{-- <h4 class="card-title  fs-14">
                                            Program Lead <span class="text-primary">{{ $campaign->user->full_name }}</span></h4> --}}
                                        <a class="text-dark fs-18 mb-4 lh-sm"
                                           href="{{ route('landing.project.details',$project->slug) }}">{{ Str::limit($project->title,50) }}</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            {{-- <div class="col-7">
                                                <span class="count-num count-num1 me-1">{{getRaisedAmountPercentage($campaign->campaignDonations->sum('donated_amount'),$campaign->goal)}}%</span>
                                                <span class="text-primary">{{__('messages.front_landing.raised')}}</span>
                                            </div> --}}
                                            <div class="col-5 d-flex justify-content-between">
                                                <div style="display: none">
                                                {{-- <span class="text-primary count-num2 me-1">{{__('messages.campaign.goal')}}</span>
                                                <span class="count-num ">
                                                    {{ getCurrencySymbol($campaign->currency) . ($campaign->goal ? $campaign->goal : 0) }}
                                                </span> --}}
                                                </div>
                                                {{-- @if($campaign->is_featured)
                                                <div class="">
                                                    <i class="fas fa-award"></i>
                                                </div>
                                                @endif --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            <div class="row justify-content-center align-items-center mt-3">
                <div class="col-md-6 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center mb-0  flex-wrap">
                            <span class="page-item">{{ $projects->links() }}</span>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
            @else
                <h3 align="center">{{__('No Projects found')}}</h3>
            @endif
    </div>
    </div>
</div>





