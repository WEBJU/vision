<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\CampaignDonation;
use App\Models\Withdraw;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class CampaignRepository
 */
class ProjectRepository extends BaseRepository
{
    public array $fieldSearchable = [
        'title',
        'campaign_category_id',
    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model(): string
    {
        return Project::class;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        try {
            DB::beginTransaction();

            // $userId = Auth::id();
            $project = Project::create($input);
            // Project::where('id', $campaign->id)->update(['user_id' => $userId]);
            if (isset($input['image']) && ! empty($input['image'])) {
                $project->addMedia($input['image'])->toMediaCollection(Project::PROJECT_IMAGE);
            }

            DB::commit();

            return $project;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param  array  $input
     * @param  int  $id
     * @return void
     */
    public function update($input, $id)
    {
        try {
            DB::beginTransaction();
            $project = Project::find($id);

            $input['gift_status'] = isset($input['gift_status']) ? 1 : 0;

            $project->update($input);

            if (isset($input['gifts'])) {
                $project->campaignGifts()->sync($input['gifts']);
            }

            if (isset($input['image']) && ! empty($input['image'])) {
                $project->clearMediaCollection(Project::PROJECT_IMAGE);
                $project->addMedia($input['image'])->toMediaCollection(Project::PROJECT_IMAGE);
            }
            
            $allWithdrawals = Withdraw::where('campaign_id',$project->id)->get() ?->sum('amount');
            $campaignDonation = CampaignDonation::where('campaign_id',$project->id)->get() ?->sum('donated_amount');
            $remainingAmount = $campaignDonation - $allWithdrawals;
            if($project->status == Project::STATUS_FINISHED && $remainingAmount > 0) {
                Withdraw::create([
                    'amount'      => $remainingAmount,
                    'status'      => \App\Models\Withdraw::NEED_TO_WITHDRAW,
                    'is_approved' => \App\Models\Withdraw::NEED_TO_WITHDRAW,
                    'campaign_id' => $project->id,
                ]);
            }
            DB::commit();

            return $project;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $id
     * @return mixed
     */
    public function updateField($input, $id)
    {
        try {
            DB::beginTransaction();
            $campaign = Project::find($id);
            $input['is_featured'] = isset($input['is_featured']);
            $input['is_emergency'] = isset($input['is_emergency']);
            $campaign->update($input);

            DB::commit();

            return $campaign;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     * @param $id
     * @return mixed
     */
    public function campaignFileStore($input, $id)
    {
        try {
            DB::beginTransaction();
            $project = Project::find($id);

            if (isset($input['file']) && ! empty($input['file'])) {
                $project->addMedia($input['file'])->toMediaCollection(Project::PROJECT_DROP_IMAGE);
            }

            DB::commit();

            return $project;
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }
}
