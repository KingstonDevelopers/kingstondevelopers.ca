<?php

namespace App\Http\Controllers;

use App\Service\Meetup;
use Carbon\Carbon;
use DMS\Service\Meetup\MeetupKeyAuthClient;

class JobsController extends Controller
{
    public function showJobSites()
    {
        $job_sites = [
            ['name' => 'City of Kingston', 'url' => 'https://careers.cityofkingston.ca/CL2/xweb/XWeb.asp?tbtoken=ZV9aQhsXCB17FHNxRidWCCM9c2NEcFBYBEggJyoMExZeX0QZW0oaBWUuJS5ALiReBAkbUhRXTncqWA%3D%3D&chk=dFlbQBJe&clid=61577&Page=joblisting'],
            ['name' => 'Github Jobs', 'url' => 'https://jobs.github.com/positions?description=&location=kingston%2C+ontario'],
            ['name' => 'Government of Canada', 'url' => 'https://emploisfp-psjobs.cfp-psc.gc.ca/psrs-srfp/applicant/page2440?locationsFilter=&officialLanguage=&title=Developer&tab=1&search=Search%20jobs&selectionProcessNumber=&departments=&log=false'],
            ['name' => 'Indeed', 'url' => 'https://ca.indeed.com/jobs?q=developer&l=Kingston%2C+ON'],
            ['name' => 'Keys', 'url' => 'http://jobs.keys.ca/find-a-job'],
            ['name' => 'Kijiji', 'url' => 'http://www.kijiji.ca/b-programmer-computer-jobs/kingston-on/c54l1700183'],
            // Kingston is hiring redirects to icims
//            ['name' => 'Kingston is hiring', 'url' => 'https://careersen-kingstoncanada.icims.com/jobs/search?ss=1&searchKeyword=developer'],
            ['name' => 'LinkedIn Jobs', 'url' => 'https://www.linkedin.com/jobs/search?keywords=Information%20Technology&location=Kingston%2C%20Ontario%2C%20Canada&locationId=PLACES.ca.2-1-0-565&trk=jobs_jserp_search_button_execute&searchOrigin=JSERP&applyLogin='],
            ['name' => 'Monster', 'url' => 'https://www.monster.ca/jobs/search/?q=developer&where=Kingston__2C-Ontario'],
            ['name' => 'Neuvoo', 'url' => 'https://neuvoo.ca/jobs/?k=developer&l=Kingston%2C+ON%2C+Canada&f=&o=&p=&r=15'],
            ['name' => 'Queens University', 'url' => 'http://clients.njoyn.com/cl4/xweb/Xweb.asp?page=joblisting&CLID=74827'],
            ['name' => 'SLC Job Board', 'url' => 'https://slc.totalhire.com/postings.php?l%5B-1%5D%5B%5D=l_10&f%5B5%5D%5B%5D=1_5_27&f%5B5%5D%5B%5D=1_5_28&f%5B5%5D%5B%5D=1_5_45'],
            ['name' => 'Stack Overflow', 'url' => 'https://stackoverflow.com/jobs?sort=i&l=Kingston%2C+ON%2C+Canada&d=50&u=Km'],
            ['name' => 'Vicinity Jobs', 'url' => 'http://kingston.vicinityjobs.com/technical-and-engineering/'],
            ['name' => 'WOWJobs', 'url' => 'http://www.wowjobs.ca/BrowseResults.aspx?q=Developer&l=Kingston%2C+ON'],
        ];
        
        return view('jobs', ['job_sites' => $job_sites]);
    }
}