<?php

namespace App\Http\Livewire;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNews extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $newsCategory;

    public $newsTags;

    public $searchByNewsNameDesc = '';

    protected $listeners = ['changeFilter', 'resetFilter'];

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
        $newsies = $this->newsies();

        return view('livewire.show-news', compact('newsies'));
    }

    /**
     * @return mixed
     */
  public function newsies()
    {
        /** @var News $query */
        $query = News::withCount('newsComments')
            ->with('users', 'newsCategory', 'newsComments', 'newsTags.news'); // Eager load related models

        // Filter by news category if set
        $query->when(!empty($this->newsCategory), function (Builder $q) {
            $q->whereHas('newsCategory', function (Builder $q) {
                $q->where('name', $this->newsCategory);  // Using 'slug' for category matching
            });
        });

        // Filter by news tag ID if set
        $query->when(!empty($this->newsTags), function (Builder $q) {
            $q->whereHas('newsTags.news', function (Builder $q) {
                $q->where('news_tags_id', $this->newsTags);
            });
        });

        // Search news by title or description if a search term is provided
        if (!empty($this->searchByNewsNameDesc)) {
            $query->where('title', 'like', '%'.trim($this->searchByNewsNameDesc).'%')
                ->orWhere('description', 'like', '%'.trim($this->searchByNewsNameDesc).'%');
        }

        // Paginate the results
        $newsItems = $query->paginate(7);

        // Add category name to each news item (optional)
        $newsItems->getCollection()->transform(function ($news) {
            $news->category_name = $news->newsCategory->name;  // Add category name to news items
            return $news;
        });

        return $newsItems;
    }
}
