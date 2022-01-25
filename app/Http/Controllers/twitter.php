<?php
namespace App\Console\Commands;

    use App\Http\Traits\CultureScore;
    use App\Http\Traits\Twitter;
    use App\Models\Company;
    use App\Models\Survey;
    use App\Notifications\SurveyNotification;
    use Carbon\Carbon;
    use Illuminate\Console\Command;

class FollowersCounter extends Command
{
    use Twitter;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitter:followers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get company twitter profile followers count';

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

    //get only accepted surveys to send email for emails assigned to that survey
    public function handle()
    {
        $companies = Company::whereHas('contact', function ($q) {
            return $q->where('twitter_url', '!=', '');
        })->get();
        foreach ($companies as $company) {
            //  $user_name=trim($company->contact->twitter_url,"https://twitter.com/");
            $user_name = trim(str_replace("https://twitter.com/", '', $company->contact->twitter_url));
            if ($user_name != '') {

                echo
                $data = $this->profileData(null, $user_name);
                if ($data) {
                    $followers = ['month' => Carbon::now()->format('Y-m'), 'statistics_date' => Carbon::now()->format('Y-m-d'), 'followers' => $data->followers_count];
                    $company->followers()->create($followers);

                    echo $company->id . "-" . $user_name . ":" . $data->followers_count . "</br>";

                }
            }
        }

    }

}
