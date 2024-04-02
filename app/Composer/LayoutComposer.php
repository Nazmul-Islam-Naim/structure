<?php
namespace App\Composer;

use App\Enum\SeenUnseen;
use App\Models\Category;
use App\Models\Contact;
use App\Models\DaySchedule;
use App\Models\Logo;
use App\Models\RatingReview;
use App\Models\SocialMedia;
use App\Models\VisitorQuery;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class LayoutComposer {
    /**
     * return global data for layout
     */
    public static function todayUnseenQuery() {
        View::composer('layouts.layout', function ($view) {
            $todayUnseenQuery = VisitorQuery::whereDate('created_at', Carbon::today())->where('status', SeenUnseen::Unseen)->count();
            $view->with('todayUnseenQuery', $todayUnseenQuery);
        });
    }
    
    /**
     * website layout
     */
    public static function websiteLayout() {
        View::composer('website.layouts.master', function ($view) {
            $view->with('contact', Contact::first())
                ->with('logo', Logo::first())
                ->with('daySchedules', DaySchedule::all())
                ->with('socialMedias', SocialMedia::all());
        });
    }
    
    /**
     * rating review
     */
    public static function ratingReview() {
        View::composer('website.components.food', function ($view) {
            $view->with('ratingReviews', RatingReview::isActive()->inRandomOrder()->limit(8)->get());
        });
    }
    
    /**
     * category carousel
     */
    public static function category() {
        View::composer('website.components.category-carousel', function ($view) {
            $view->with('categories', Category::isActive()->get());
        });
    }
}