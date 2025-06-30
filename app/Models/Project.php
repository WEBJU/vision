<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Project extends Model implements HasMedia
{
     

/**
 * App\Models\Campaign
 *
 * @property int $id
 * @property string $title
 * @property int $campaign_id
 * @property string $slug
 * @property string|null $short_description
 * @property string $description
 * @property int|null $project_end_method
 * @property string|null $video_link
 * @property string|null $start_date
 * @property string|null $deadline
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign query()
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereAmountPrefilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCampaignCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCampaignEndMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereGoal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereIsEmergency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereRecommendedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Campaign whereVideoLink($value)
 * @mixin \Eloquent
 */

    use HasFactory, InteractsWithMedia;

    const AFTER_END_DATE = 1;


    const PROJECT_IMAGE = 'project_image';

    const PROJECT_DROP_IMAGE = 'project_drop_image';

    const AFTER_GOAL_ACHIEVE = 2;
    const STATUS_ACTIVE = 1;

    const STATUS_BLOCKED = 2;

    const STATUS_PENDING = 3;

    const STATUS_FINISHED = 4;

    const STATUS_All = 5;

    const STATUS_ARRAY = [
        self::STATUS_All => 'All',
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_BLOCKED => 'Blocked',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_FINISHED => 'Finished',
    ]; 

    const ADD_STATUS = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_BLOCKED => 'Blocked',
        self::STATUS_PENDING => 'Pending',
        self::STATUS_FINISHED => 'Finished',
    ];

    /**
     * @var string
     */
    protected $table = 'projects';

    protected $appends = ['image', 'status_name'];

    protected $with = ['media'];

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'campaign_id',
        'slug',
        'short_description',
        'description',
        'project_end_method',
        'video_link',
        'location',
        'start_date',
        'deadline',
        'status',
    ];

    public static $rules = [
        'title' => 'required|unique:projects,title|max:50',
        'slug' => 'required|unique:projects,slug|max:15',
        'campaign_id' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg',
        'status' => 'required',
    ];

    protected $casts = [
        'title' => 'string',
        'campaign_id' => 'integer',
        'slug' => 'string',
        'short_description' => 'string',
        'description' => 'string',
        'project_end_method' => 'integer',
        'video_link' => 'string',
        'location' => 'string',
        'start_date' => 'date',
        'deadline' => 'date',
        'status' => 'integer',
    ];

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::PROJECT_IMAGE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_landing/images/causes-hero-img.png');
    }

    /**
     * @return string
     */
    public function getStatusNameAttribute(): string
    {
        $status = $this->status;

        return self::STATUS_ARRAY[$status];
    }

  

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function projectUpdates(): HasMany
    {
        return $this->hasMany(CampaignUpdate::class);
    }

}
