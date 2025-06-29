<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProjects extends Component
{
    use WithPagination;

    public $campaignCategoryId;

    protected $listeners = ['changeFilter', 'resetFilter'];

    protected $paginationTheme = 'bootstrap';

    /**
     * @param $param
     * @param $value
     */
    public function changeFilter($param, $value)
    {
        $this->reset();

        $this->$param = $value;
    }

    public function resetFilter()
    {
        $this->reset();
    }

    /**
     * @return Application|Factory|View
     */
    public function render()
    {
        $projects = $this->projectCampaignWise();

        return view('livewire.show-projects', compact('projects'));
    }

    /**
     * @return mixed
     */
    public function projectCampaignWise()
    {
        // Start with the base query to retrieve projects along with their associated campaigns
        $mainQuery = Project::with('campaign'); // Eager load only the campaign relation

        // Get the campaign ids for the projects
        $campaignIds = $mainQuery->pluck('campaign_id')->toArray(); // Pluck campaign_id from projects

        // Filter out campaigns that have ended using the campaignEnd function
        $finalCampaignIds = [];
        foreach ($campaignIds as $campaignId) {
            if (!campaignEnd($campaignId)) {
                $finalCampaignIds[] = $campaignId; // Only include campaigns that haven't ended
            }
        }

        // Filter the projects based on the valid campaign ids
        $mainQuery->whereIn('campaign_id', $finalCampaignIds); // Filter projects by campaign_id

        // Optionally, filter by campaign category if a category id is provided
        if (!empty($this->campaignCategoryId)) {
            $mainQuery->when(!empty($this->campaignCategoryId), function (Builder $query) {
                $query->where('campaign_category_id', '=', $this->campaignCategoryId);
            });
        }

        // Retrieve and paginate the projects
        return $mainQuery->paginate(9); // Paginate the result to show 9 projects per page
    }


}
