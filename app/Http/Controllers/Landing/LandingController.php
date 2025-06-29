<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCallToActionRequest;
use App\Http\Requests\CreateInquiryRequest;
use App\Http\Requests\CreateNewsCommentsRequest;
use App\Models\AboutUs;
use App\Models\Brand;
use App\Models\CallToAction;
use App\Models\Campaign;
use App\Models\Project;
use App\Models\CampaignCategory;
use App\Models\CampaignDonation;
use App\Models\Category;
use App\Models\CategoryThird;
use App\Models\ContactUs;
use App\Models\DonationGift;
use App\Models\Event;
use App\Models\Faqs;
use App\Models\FrontSlider;
use App\Models\FrontSlider2;
use App\Models\FrontSliderThird;
use App\Models\Inquiry;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use App\Models\NewsTags;
use App\Models\SecondVideoSection;
use App\Models\Setting;
use App\Models\SliderCard;
use App\Models\SuccessStory;
use App\Models\Team;
use App\Models\ThirdVideoSection;
use App\Models\VideoSection;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LandingController extends AppBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function home()
    {
        $settings = Setting::pluck('value', 'key');
        $homepage = 'index';

        $data = [];

        if ($settings['active_homepage_status'] == Setting::STATUS_HOMEPAGE_1) {
            $data['events'] = Event::all();
        } else {
            $data['events'] = Event::with('eventCategory')->where(
                'event_date',
                '>=',
                Carbon::now()
            )->latest()->take(3)->get();
        }

        $data['sliderCard'] = SliderCard::pluck('value', 'key')->toArray();

        $data['teams'] = Team::latest()->take(4)->get();

        $data['faqs'] = Faqs::latest()->take(3)->get();

        $data['videoSection'] = VideoSection::pluck('value', 'key');

        $data['homepageTwoVideo'] = SecondVideoSection::pluck('value', 'key');

        $data['homepageThreeVideo'] = ThirdVideoSection::pluck('value', 'key');

        $data['aboutUs'] = AboutUs::pluck('value', 'key')->toArray();

        $data['sliders'] = FrontSlider::all();

        $data['homepageTwoSliders'] = FrontSlider2::all();

        $data['homepageThreeSliders'] = FrontSliderThird::all();

        $data['homepageTwoCategories'] = Category::pluck('value', 'key');

        $data['homepageThreeCategories'] = CategoryThird::all();

        $data['campaignsCategories'] = CampaignCategory::withCount([
            'campaigns' => function ($q) {
                $q->where('status', '=', Campaign::STATUS_ACTIVE);
            },
        ])->get();

        $data['latestNewsFeeds'] = News::with('newsCategory')->latest()->first();

        $data['oldNewsFeeds'] = News::where(
            'id',
            '!=',
            $data['latestNewsFeeds'] != null ? $data['latestNewsFeeds']->id : ''
        )->limit(3)->get();

        $data['campaigns'] = Campaign::with('campaignCategory', 'user')->where(
            'status',
            Campaign::STATUS_ACTIVE
        )->latest()->take(6)->orderBy('is_emergency', 'desc')->get();

        $data['brands'] = Brand::all();

        return view("front_landing.$homepage", compact('data'));
    }

    /**
     * @return Application|Factory|View
     */
    public function aboutUs()
    {
        $aboutUs = AboutUs::pluck('value', 'key')->toArray();
        $brands = Brand::all();
        $successStories = SuccessStory::all();

        return view('front_landing.about', compact('aboutUs', 'brands', 'successStories'));
    }

    /**
     * @return Application|Factory|View
     */
    public function campaign($id = null)
    {
        if ($id) {
            $campaignCategoryId = $id;
        } else {
            $campaignCategoryId = '';
        }
        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        $campaignCategories = CampaignCategory::withCount([
            'campaigns' => function ($q) {
                $q->where('status', '=', Campaign::STATUS_ACTIVE);
            },
        ])->get();

        return view('front_landing.campaigns', compact('campaignCategories', 'contactUs', 'campaignCategoryId'));
    }
    public function projects($id = null)
    {
        // Set the campaignCategoryId based on the incoming parameter or default to an empty string
        if ($id) {
            $campaignCategoryId = $id;
        } else {
            $campaignCategoryId = '';
        }

        // Retrieve the contact us data
        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        // Retrieve projects with their associated campaigns
        $projects = Project::with([
            'campaign' => function ($query) {
                $query->where('status', '=', Campaign::STATUS_ACTIVE); // Only active campaigns
            }
        ])
            ->when($campaignCategoryId, function ($query) use ($campaignCategoryId) {
                // If a campaign category ID is provided, filter projects by the corresponding campaign category
                $query->whereHas('campaign', function ($query) use ($campaignCategoryId) {
                    $query->where('campaign_category_id', $campaignCategoryId);
                });
            })
            ->get();

        // Pass the data to the view
        return view('front_landing.project', compact('projects', 'contactUs', 'campaignCategoryId'));
    }

    /**
     * @return Application|Factory|View|JsonResponse
     */
    public function contact()
    {
        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        return view('front_landing.contact', compact('contactUs'));
    }

    /**
     * @param  CreateInquiryRequest  $request
     * @return JsonResponse
     */
    public function store(CreateInquiryRequest $request)
    {
        $input = $request->all();
        Inquiry::create($input);

        return $this->sendSuccess('Inquiry sent successfully.');
    }

    /**
     * @return Application|Factory|View
     */
    public function publications(Request $request)
    {
        // Initialize category and tag variables
        $newsCategoryId = '';
        $newsTagId = '';

        // Get the category and tag from the request if they are set
        if (isset($request->category)) {
            $newsCategoryId = $request->category;
        }

        if (isset($request->tag)) {
            $newsTagId = $request->tag;
        }

        // Fetch the most popular news based on the number of users
        $mostUser = News::withCount('users')
            ->with('users', 'newsCategory')
            ->whereHas('users', function (Builder $query) {
                // You can add further conditions if needed
            })
            ->distinct()
            ->take(1)
            ->orderByDesc('users_count')
            ->get();

        // Fetch the latest four news items
        $latestFourNews = News::latest()->take(4)->get();

        // Fetch the news categories, filtering based on category ID if provided
        $newsCategories = NewsCategory::withCount('news')
            ->with('news')
            ->whereHas('news', function (Builder $query) {
                // You can add conditions for filtering the news if needed
            })
            ->distinct()
            ->take(6)
            ->orderByDesc('news_count')
            ->get();

        // Fetch the news tags
        $newsTags = NewsTags::latest()->take(8)->get();

        // Fetch images for the "Contact Us" section
        $newsImg = ContactUs::pluck('value', 'key')->toArray();

        // Query news based on category
        $newsQuery = News::with('newsCategory', 'newsTags')->latest(); // Start the query for latest news

        // If a category is selected, filter news by category
        if ($newsCategoryId) {
            // Optionally, you can use the category slug or ID
            $newsQuery->where('news_category_id', $newsCategoryId);
        }

        // Optionally, filter by news tag
        if ($newsTagId) {
            $newsQuery->whereHas('newsTags', function (Builder $query) use ($newsTagId) {
                $query->where('news_tags_id', $newsTagId);
            });
        }

        // Paginate the results
        $newsItems = $newsQuery->paginate(7);

        // Return the data to the view
        return view(
            'front_landing.news',
            compact(
                'newsCategories',
                'newsTags',
                'latestFourNews',
                'mostUser',
                'newsCategoryId',
                'newsTagId',
                'newsImg',
                'newsItems' // Pass the filtered news items
            )
        );
    }

    /**
     * @return Application|Factory|View
     */
    public function gallery(Request $request)
    {
        $newsCategoryId = '';
        $newsTagId = '';

        if (isset($request->category)) {
            $newsCategoryId = $request->category;
        }

        if (isset($request->tag)) {
            $newsTagId = $request->tag;
        }

        $mostUser = News::withCount('users')->with('users', 'newsCategory')->whereHas(
            'users',
            function (Builder $query) {
            }
        )->distinct()->take(1)->orderByDesc('users_count')->get();

        $latestFourNews = News::latest()->take(4)->get();

        $newsCategories = NewsCategory::withCount('news')->with('news')->whereHas(
            'news',
            function (Builder $query) {
            }
        )->distinct()->take(6)->orderByDesc('news_count')->get();

        $newsTags = NewsTags::latest()->take(8)->get();

        $newsImg = ContactUs::pluck('value', 'key')->toArray();

        return view(
            'front_landing.gallery',
            compact(
                'newsCategories',
                'newsTags',
                'latestFourNews',
                'mostUser',
                'newsCategoryId',
                'newsTagId',
                'newsImg'
            )
        );
    }

    /**
     * @return Application|Factory|View
     */
    public function reports(Request $request)
    {
        $newsCategoryId = '';
        $newsTagId = '';

        if (isset($request->category)) {
            $newsCategoryId = $request->category;
        }

        if (isset($request->tag)) {
            $newsTagId = $request->tag;
        }

        $mostUser = News::withCount('users')->with('users', 'newsCategory')->whereHas(
            'users',
            function (Builder $query) {
            }
        )->distinct()->take(1)->orderByDesc('users_count')->get();

        $latestFourNews = News::latest()->take(4)->get();

        $newsCategories = NewsCategory::withCount('news')->with('news')->whereHas(
            'news',
            function (Builder $query) {
            }
        )->distinct()->take(6)->orderByDesc('news_count')->get();

        $newsTags = NewsTags::latest()->take(8)->get();

        $newsImg = ContactUs::pluck('value', 'key')->toArray();

        return view(
            'front_landing.news',
            compact(
                'newsCategories',
                'newsTags',
                'latestFourNews',
                'mostUser',
                'newsCategoryId',
                'newsTagId',
                'newsImg'
            )
        );
    }
    public function podcast(Request $request)
    {
        $newsCategoryId = '';
        $newsTagId = '';

        if (isset($request->category)) {
            $newsCategoryId = $request->category;
        }

        if (isset($request->tag)) {
            $newsTagId = $request->tag;
        }

        $mostUser = News::withCount('users')->with('users', 'newsCategory')->whereHas(
            'users',
            function (Builder $query) {
            }
        )->distinct()->take(1)->orderByDesc('users_count')->get();

        $latestFourNews = News::latest()->take(4)->get();

        $newsCategories = NewsCategory::withCount('news')->with('news')->whereHas(
            'news',
            function (Builder $query) {
            }
        )->distinct()->take(6)->orderByDesc('news_count')->get();

        $newsTags = NewsTags::latest()->take(8)->get();

        $newsImg = ContactUs::pluck('value', 'key')->toArray();

        return view(
            'front_landing.podcast',
            compact(
                'newsCategories',
                'newsTags',
                'latestFourNews',
                'mostUser',
                'newsCategoryId',
                'newsTagId',
                'newsImg'
            )
        );
    }
    /**
     * @param  News  $news
     * @return Application|Factory|View
     */
    public function newsDetails(News $news)
    {
        $news = News::with('newsCategory')->where('id', '=', $news->id)->first();

        $relatedPosts = News::with('newsCategory')->where('news_category_id', '=', $news->news_category_id)->where('id', '!=', $news->id)->latest()->take(2)->get();

        $allCommnets = NewsComment::with('users')->where('news_id', '=', $news->id)->orderBy('id', 'desc')->get();

        $newsies = News::latest()->take(3)->get();

        $newsCategories = NewsCategory::withCount('news')->with('news')->whereHas(
            'news',
            function (Builder $query) {
            }
        )->distinct()->take(6)->orderByDesc('news_count')->get();

        $latestFourNews = News::where('id', '!=', $news->id)->latest()->take(4)->get();

        $newsTags = NewsTags::latest()->take(8)->get();

        $newsDetailsImg = ContactUs::pluck('value', 'key')->toArray();

        return view(
            'front_landing.news-details',
            compact(
                'news',
                'newsies',
                'newsCategories',
                'newsTags',
                'latestFourNews',
                'allCommnets',
                'relatedPosts',
                'newsDetailsImg'
            )
        );
    }

    /**
     * @param  CreateCallToActionRequest  $request
     * @return mixed
     */
    public function callToActions(CreateCallToActionRequest $request)
    {
        CallToAction::create($request->all());

        return $this->sendSuccess('Call To Action Saved Successfully.');
    }

    /**
     * @return Application|Factory|View
     */
    public function faqs()
    {
        $faqs = Faqs::all();

        $faqsImg = ContactUs::pluck('value', 'key')->toArray();

        return view('front_landing.faqs', compact('faqs', 'faqsImg'));
    }

    /**
     * @return Application|Factory|View
     */
    public function livelihoodsWellbeing()
    {

        return view('front_landing.livelihoods');
    }
    public function knowledgeDevelopment()
    {

        return view('front_landing.knowledge-development');
    }

    public function civicParticipation()
    {

        return view('front_landing.civic-participation');
    }
    /**
     * @param  Campaign  $campaign
     * @return Application|Factory|View
     */
    public function campaignDetails(Campaign $campaign)
    {
        if (in_array($campaign->status, [Campaign::STATUS_BLOCKED, Campaign::STATUS_FINISHED])) {
            return redirect(route('landing.home'));
        }

        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        // Paginate the projects
        $campaign = $campaign->load([
            'campaignCategory',
            'projects' => function ($query) {
                $query->paginate(10);  // Paginate projects here, adjust the number as needed
            },
        ]);

        $campaignCategories = CampaignCategory::withCount([
            'campaigns' => function ($q) {
                $q->where('status', '=', Campaign::STATUS_ACTIVE);
            },
        ])->get();

        $sidebarCampaignCategories = CampaignCategory::withCount('campaigns')
            ->with('campaigns')
            ->whereHas('campaigns', function (Builder $query) {
                // Apply any filters if needed
            })
            ->distinct()
            ->take(6)
            ->orderByDesc('campaigns_count')
            ->get();

        $medias = $campaign->getMedia(Campaign::CAMPAIGN_DROP_IMAGE);

        $campaignFaqs = Campaign::with('campaignFaqs')->where('id', $campaign->id)->first();
        $campaignUpdates = Campaign::with('campaignUpdates')->where('id', $campaign->id)->first();

        $allDonors = CampaignDonation::where('campaign_id', $campaign->id)
            ->latest()
            ->take(5)
            ->get();

        $donationEnableGifts = Campaign::with('campaignGifts')
            ->where('id', $campaign->id)
            ->where('gift_status', true)
            ->first();

        return view(
            'front_landing.campaign-details',
            compact(
                'campaign',
                'campaignCategories',
                'medias',
                'contactUs',
                'campaignFaqs',
                'campaignUpdates',
                'sidebarCampaignCategories',
                'allDonors',
                'donationEnableGifts'
            )
        );
    }

    public function projectDetails(Project $project)
    {
        // if (in_array($project->status, [Project::STATUS_BLOCKED, Project::STATUS_FINISHED])) {
        //     return redirect(route('landing.home'));
        // }

        $contactUs = ContactUs::pluck('value', 'key')->toArray();

        // Load the campaign with the project
        $project = Project::with('campaign')->find($project->id);  // Make sure to fetch the model instance.

        // Now we can access the media
        $medias = $project->getMedia(Project::PROJECT_DROP_IMAGE);  // Correctly calling getMedia() on the model instance.

        return view(
            'front_landing.project-details',
            compact(
                'project',
                'medias',
                'contactUs'
            )
        );
    }

    /**
     * @param  CreateNewsCommentsRequest  $request
     * @return mixed
     */
    public function newsComments(CreateNewsCommentsRequest $request)
    {
        $newsComments = NewsComment::create($request->all());

        $newsComment = NewsComment::with('users')->where('id', '=', $newsComments->id)->first();

        $commentCount = NewsComment::where('news_id', '=', $request->news_id)->count();

        return $this->sendResponse(['newsComment' => $newsComment, 'commentCount' => $commentCount], 'News Comment saved successfully.');
    }

    /**
     * @return Application|Factory|View
     */
    public function termCondition()
    {
        $termsConditions = Setting::where('key', 'terms_conditions')->first();

        return view('front_landing.terms-conditions', compact('termsConditions'));
    }

    /**
     * @return Application|Factory|View
     */
    public function privacyPolicy()
    {
        $privacyPolicy = Setting::where('key', 'privacy_policy')->first();

        return view('front_landing.privacy-policy', compact('privacyPolicy'));
    }

    /**
     * @param  Campaign  $campaign
     * @return Application|Factory|View
     */
    public function getPayment()
    {


        $amount_prefilled = 5;

        $totalAmount = $amount_prefilled;
        $chargeAmount = 0;



        //        return view('front_landing.payment', compact('campaign', 'stripeWithdraw', 'paypalWithdraw', 'totalAmount', 'chargeAmount'));

        return view(
            'front_landing.payment',
            compact('totalAmount', )
        );
    }
}
