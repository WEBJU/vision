<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectFieldRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Campaign;
use App\Models\CampaignCategory;
use App\Models\Country;
use App\Models\DonationGift;
use App\Repositories\ProjectRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
class ProjectController extends  AppBaseController
{
    
    public ProjectRepository $projectRepo;

    /** 
     * UserController constructor.
     *
     * @param  ProjectRepository  $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepo = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     */
    public function index()
    {
        return view('admin.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
{
    // Retrieve active campaigns instead of campaign categories
    $campaigns = Campaign::where('status', Campaign::STATUS_ACTIVE)->pluck('title', 'id')->toArray();
    $status = Campaign::ADD_STATUS;

    return view('admin.projects.create', compact('campaigns', 'status'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProjectRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();
        $input['slug'] = $input['slug'] ?? str_replace('_', ' ', strtolower($input['title']));
        $project = $this->projectRepo->store($input);

        Flash::success('Project created successfully.');

        return redirect(route('projects.edit', $project->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project  $project
     * @return Application|Factory|View
     */ 
    public function edit(Project $project)
    {
        $campaignCategory = CampaignCategory::whereIsActive(true)->pluck('name', 'id')->toArray();
        $country = Country::all()->pluck('country_name', 'id')->toArray();
        $status = Project::ADD_STATUS;
        $currencies = $this->getCurrencies();

        // $giftIds = $campaign->campaignGifts()->pluck('donation_gift_id')->toArray();
        // $donationGifts = DonationGift::whereStatus(true)->pluck('title', 'id')->toArray();

        return view('admin.projects.edit', compact('project', 'campaignCategory', 'country', 'status', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Project  $project
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $input = $request->all();

        $this->projectRepo->update($input, $project->id);

        Flash::success('Project updated successfully.');

        return redirect(route('project.edit', $project->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project  $project
     * @return void
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return $this->sendSuccess('Project deleted successfully.');
    }

    /**
     * @param  Project  $project
     * @param  Request  $request
     * @return Application|Factory|View
     */
    public function show(Project $project, Request $request)
    {
        $option = $request->get('option');

        if (empty($option)) {
            $option = 'default';
        } else {
            $option = 'donors';
        }

        // $project->load('campaignDonations');

        return view('admin/projects.show', compact('project', 'option'));
    }
    
    /**
     * @param  UpdateProjectFieldRequest  $request
     * @param $id
     * @return mixed
     */
    public function updateField(UpdateProjectFieldRequest $request, $id)
    {
        $input = $request->all();
        $this->projectRepo->updateField($input, $id);

        return $this->sendSuccess('Project updated successfully.');
    }

    /**
     * @param  Request  $request
     * @param $id
     * @return mixed
     */
    public function projectFileStore(Request $request, $id)
    {
        $input = $request->all();
        $this->projectRepo->projectFileStore($input, $id);

        return $this->sendSuccess('File uploaded successfully.');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProjectFile($id)
    {
        $asset = Project::find($id);
        $mediaUrl = [];

        $medias = $asset->getMedia(Project::PROJECT_DROP_IMAGE);

        foreach ($medias as $attachment) {
            $obj['id'] = $attachment->id;
            $obj['name'] = $attachment->file_name;
            $obj['size'] = $attachment->size;
            $obj['url'] = $attachment->getFullUrl();
            $mediaUrl[] = $obj;
        }

        return $this->sendResponse($mediaUrl, 'File retrieved successfully');
    }

    /**
     * @param  Request  $request
     * @return mixed
     */
    public function removeProjectFile(Request $request)
    {
        try {
            DB::beginTransaction();
            $media = Media::where('file_name', $request->file)->first();

            if ($media) {
                $media->delete();
            }

            $asset = Project::find($request->id);
            $medias = $asset->getMedia(Project::PROJECT_DROP_IMAGE);

            DB::commit();

            return $this->sendResponse($medias, 'File deleted successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function getCurrencies(): array
    {
        $currencyPath = file_get_contents(resource_path().'/currencies/defaultCurrency.json');
        $currenciesData = json_decode($currencyPath, true);
        $currencies = [];

        foreach ($currenciesData['currencies'] as $currency) {
            $convertCode = strtolower($currency['code']);
            $currencies[$convertCode] = [
                'symbol' => $currency['symbol'],
                'name' => $currency['name'],
            ];
        }

        return $currencies;
    }
}
