<?php

namespace App\Http\Controllers;

use App\Service\MeetupApiClient;
use Carbon\Carbon;
use DMS\Service\Meetup\MeetupKeyAuthClient;

class JobsController extends Controller
{
    public function showJobSites()
    {
        $job_sites = [
            ['name' => 'City of Kingston', 'url' => 'https://careers.cityofkingston.ca'],
            ['name' => 'Github Jobs', 'url' => 'https://jobs.github.com/positions?description=&location=kingston%2C+ontario'],
            ['name' => 'Government of Canada (Developer)', 'url' => 'https://emploisfp-psjobs.cfp-psc.gc.ca/psrs-srfp/applicant/page2440?tab=1&title=Developer&locationsFilter=&departments=&officialLanguage=&selectionProcessNumber=&addedLocation=W260'],
            ['name' => 'Indeed', 'url' => 'https://ca.indeed.com/jobs?q=developer&l=Kingston%2C+ON'],
            ['name' => 'Keys', 'url' => 'https://keys.ca/jobboard/search.php?searchBarText=&searchBarLoc=all&searchBarCat=Computer%2FIT+%2F+Ordinateur%2FTechnologie+de+l%27information'],
            ['name' => 'Kijiji', 'url' => 'http://www.kijiji.ca/b-programmer-computer-jobs/kingston-on/c54l1700183'],
            ['name' => 'LinkedIn Jobs', 'url' => 'https://www.linkedin.com/jobs/search?keywords=Information%20Technology&location=Kingston%2C%20Ontario%2C%20Canada&locationId=PLACES.ca.2-1-0-565&trk=jobs_jserp_search_button_execute&searchOrigin=JSERP&applyLogin='],
            ['name' => 'Monster', 'url' => 'https://www.monster.ca/jobs/search/?q=developer&where=Kingston__2C-Ontario'],
            ['name' => 'Neuvoo', 'url' => 'https://neuvoo.ca/jobs/?k=developer&l=Kingston%2C+ON%2C+Canada&f=&o=&p=&r=15'],
            ['name' => 'Queens University', 'url' => 'http://clients.njoyn.com/cl4/xweb/Xweb.asp?page=joblisting&CLID=74827'],
            ['name' => 'SLC Job Board', 'url' => 'https://slc.totalhire.com/postings.php?l%5B-1%5D%5B%5D=l_10&f%5B5%5D%5B%5D=1_5_27&f%5B5%5D%5B%5D=1_5_28&f%5B5%5D%5B%5D=1_5_45'],
            ['name' => 'Stack Overflow', 'url' => 'https://stackoverflow.com/jobs?sort=i&l=Kingston%2C+ON%2C+Canada&d=50&u=Km'],
            ['name' => 'WOWJobs', 'url' => 'http://www.wowjobs.ca/BrowseResults.aspx?q=Developer&l=Kingston%2C+ON'],
        ];

        return view('jobs', ['job_sites' => $job_sites]);
    }
}
