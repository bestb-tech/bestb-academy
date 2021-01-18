<?php

namespace App\Console\Commands;

use App;
use App\Models\Course;
use App\Models\CourseType;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;
use URL;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        try{
            $sitemap = App::make("sitemap");

            $today = Carbon::now();
            $sitemap->add(URL::to('/'),$today,'1.0','daily');
            $sitemap->add(URL::to('/introduction'),$today,'1.0','daily');

            //list course by type
            $root_category_types = CourseType::whereNull('parent_id')->pluck('slug');
            foreach ($root_category_types as $type){
                $sitemap->add(URL::to('/course-types/'.$type),$today,'1.0','monthly');
            }

            //course detail
            $courses = Course::pluck('slug');
            foreach ($courses as $course){
                $sitemap->add(URL::to('/courses/'.$course),$today,'1.0','monthly');
            }

            //teacher detail
            $teachers = App\Models\Teacher::pluck('slug');
            foreach ($teachers as $teacher){
                $sitemap->add(URL::to('/teachers/'.$teacher),$today,'1.0','monthly');
            }

            $sitemap->add(URL::to('/news'),$today,'1.0','daily');

            //list_news
            $news = App\Models\News::pluck('slug');
            foreach ($news as $news_item){
                $sitemap->add(URL::to('/news/'.$news_item),$today,'1.0','monthly');
            }

            $sitemap->add(URL::to('/contact'),$today,'1.0','daily');

            $sitemap->store('xml', 'sitemap');
//            return 1;
//        }catch (Exception $exception){
//            return 0;
//        }
    }
}
