<?php

namespace App\Http\Controllers;

use App\Services\PageSpeedInsightsService;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;


class PageSpeedInsightsController extends Controller
{

    public function __construct()
    {
        $finalData = null;

        $this->finalData['mobile']['is_data'] = false;
        $this->finalData['desktop']['is_data'] = false;

        $this->poor_round_color = "#f64331";
        $this->poor_text_color = "#cd351d";

        $this->medium_round_color = "#fda732";
        $this->medium_text_color = "#c3341b";

        $this->good_round_color = "#55c862";
        $this->good_text_color = "#3a8509";
    }

    public function show(Request $request, PageSpeedInsightsService $pageSpeedInsightsService)
    {
        $clients = [
            [
                'id' => 1,
                'url' => 'https://www.essentialdesigns.net/',
                'mail' => 'anuragdeep.xon@gmail.com'
            ],


        ];

        foreach ($clients as $client) {


            $mobileInsights = $this->getMobileInsights($pageSpeedInsightsService, $client['url']);
            $desktopInsights = $this->getDesktopInsights($pageSpeedInsightsService, $client['url']);

            $mobile_html = $client['url'] .
                '
                <style>
                .progress_outer{
                    display: flex; 
                    width: 100px; 
                    height: 100px; 
                    border-radius: 50%; 
                    font-size: 0; 
                    text-align: center;
                    position: relative;
                }    

                .progress_inner{
                    width: 80px;
                    height: 80px;
                    margin: 10px;
                    border-radius: 50%;
                    background: white;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
                </style>'

                . '<p>'
                . $this->finalData['mobile']['strategy']
                . '</p>'

                . '<div style="display: flex; justify-content: space-evenly; padding:10px">'
                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                    background: conic-gradient('
                . $this->finalData["mobile"]["categories"]["performance"]["roundc"]
                . ' '
                . $this->finalData["mobile"]["categories"]["performance"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["mobile"]["categories"]["performance"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["mobile"]["categories"]["performance"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["mobile"]["categories"]["performance"]["title"]
                . '</p>
                </div>'
                // SEO End 


                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                    background: conic-gradient('
                . $this->finalData["mobile"]["categories"]["accessibility"]["roundc"]
                . ' '
                . $this->finalData["mobile"]["categories"]["accessibility"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["mobile"]["categories"]["accessibility"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["mobile"]["categories"]["accessibility"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["mobile"]["categories"]["accessibility"]["title"]
                . '</p>
                </div>'
                // SEO End                 

                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                    background: conic-gradient('
                . $this->finalData["mobile"]["categories"]["best_practices"]["roundc"]
                . ' '
                . $this->finalData["mobile"]["categories"]["best_practices"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["mobile"]["categories"]["best_practices"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["mobile"]["categories"]["best_practices"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["mobile"]["categories"]["best_practices"]["title"]
                . '</p>
                </div>'
                // SEO End 

                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                    background: conic-gradient('
                . $this->finalData["mobile"]["categories"]["seo"]["roundc"]
                . ' '
                . $this->finalData["mobile"]["categories"]["seo"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["mobile"]["categories"]["seo"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["mobile"]["categories"]["seo"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["mobile"]["categories"]["seo"]["title"]
                . '</p>
                </div>'
                // SEO End 
                . '</div>';


            $mname = 'mobile_' . $client['id'] . '.png';
            $mobile_file_name = preg_replace('#[ -]+#', '-', $mname);

            $file = Browsershot::html($mobile_html)
                ->windowSize(720, 300)
                ->save($mobile_file_name);

            $desktop_html = $client['url']
                . '
            <style>
            .progress_outer{
                display: flex; 
                width: 100px; 
                height: 100px; 
                border-radius: 50%; 
                font-size: 0; 
                text-align: center;
                position: relative;
            }    


            .progress_inner{
                width: 80px;
                height: 80px;
                margin: 10px;
                border-radius: 50%;
                background: white;
                position: absolute;
                top: 0;
                left: 0;
            }
            </style>'

                . '<p>'
                . $this->finalData['desktop']['strategy']
                . '</p>'

                . '<div style="display: flex; justify-content: space-evenly; padding:10px">'
                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                background: conic-gradient('
                . $this->finalData["desktop"]["categories"]["performance"]["roundc"]
                . ' '
                . $this->finalData["desktop"]["categories"]["performance"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["desktop"]["categories"]["performance"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["desktop"]["categories"]["performance"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["desktop"]["categories"]["performance"]["title"]
                . '</p>
            </div>'
                // SEO End 


                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                background: conic-gradient('
                . $this->finalData["desktop"]["categories"]["accessibility"]["roundc"]
                . ' '
                . $this->finalData["desktop"]["categories"]["accessibility"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["desktop"]["categories"]["accessibility"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["desktop"]["categories"]["accessibility"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["desktop"]["categories"]["accessibility"]["title"]
                . '</p>
            </div>'
                // SEO End                 

                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                background: conic-gradient('
                . $this->finalData["desktop"]["categories"]["best_practices"]["roundc"]
                . ' '
                . $this->finalData["desktop"]["categories"]["best_practices"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["desktop"]["categories"]["best_practices"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["desktop"]["categories"]["best_practices"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["desktop"]["categories"]["best_practices"]["title"]
                . '</p>
            </div>'
                // SEO End 

                // SEO Start 
                . '<div style="text-align: center;"><div class="progress_outer" style=" 
                background: conic-gradient('
                . $this->finalData["desktop"]["categories"]["seo"]["roundc"]
                . ' '
                . $this->finalData["desktop"]["categories"]["seo"]["degree"]
                . 'deg, #eee 0deg); "> <div class="progress_inner"> <p style="color:'
                . $this->finalData["desktop"]["categories"]["seo"]["textc"]
                . '; font-size: 26px;">'
                . $this->finalData["desktop"]["categories"]["seo"]["score"]
                . '</p> </div> </div> <p>'
                . $this->finalData["desktop"]["categories"]["seo"]["title"]
                . '</p>
            </div>'
                // SEO End 
                . '</div>';

            $dname = 'desktop_' . $client['id'] . '.png';
            $desktop_file_name = preg_replace('#[ -]+#', '-', $dname);

            $file = Browsershot::html($desktop_html)
                ->windowSize(720, 300)
                ->save($desktop_file_name);

            // $file = Browsershot::html($mobile_html)->bodyHtml();
        }

        return $this->finalData;
        // return view('insights.mail', ['data' => $this->finalData]);
    }



    public function getMobileInsights(PageSpeedInsightsService $pageSpeedInsightsService, $url)
    {
        $strategy = 'mobile';
        $score = $pageSpeedInsightsService->getScore($url, $strategy);

        $this->finalData['site_url'] = $url;
        $this->finalData['mobile']['strategy'] = ucfirst($strategy);

        if (isset($score['lighthouseResult']['categories'])) {
            $this->finalData['mobile']['is_data'] = true;
        }

        // Mobile
        if (isset($score['lighthouseResult']['categories']['performance'])) {

            if ((($score['lighthouseResult']['categories']['performance']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['performance']['score'] * 100) <= 49)) {
                $this->finalData['mobile']['categories']['performance']['roundc'] = $this->poor_round_color;
                $this->finalData['mobile']['categories']['performance']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['performance']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['performance']['score'] * 100) <= 89)) {
                $this->finalData['mobile']['categories']['performance']['roundc'] = $this->medium_round_color;
                $this->finalData['mobile']['categories']['performance']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['mobile']['categories']['performance']['roundc'] = $this->good_round_color;
                $this->finalData['mobile']['categories']['performance']['textc'] = $this->good_text_color;
            }

            $this->finalData['mobile']['categories']['performance']['title'] = $score['lighthouseResult']['categories']['performance']['title'];
            $this->finalData['mobile']['categories']['performance']['score'] = $score['lighthouseResult']['categories']['performance']['score'] * 100;

            $this->finalData['mobile']['categories']['performance']['degree'] = $score['lighthouseResult']['categories']['performance']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['accessibility'])) {

            if ((($score['lighthouseResult']['categories']['accessibility']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['accessibility']['score'] * 100) <= 49)) {
                $this->finalData['mobile']['categories']['accessibility']['roundc'] = $this->poor_round_color;
                $this->finalData['mobile']['categories']['accessibility']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['accessibility']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['accessibility']['score'] * 100) <= 89)) {
                $this->finalData['mobile']['categories']['accessibility']['roundc'] = $this->medium_round_color;
                $this->finalData['mobile']['categories']['accessibility']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['mobile']['categories']['accessibility']['roundc'] = $this->good_round_color;
                $this->finalData['mobile']['categories']['accessibility']['textc'] = $this->good_text_color;
            }

            $this->finalData['mobile']['categories']['accessibility']['title'] = $score['lighthouseResult']['categories']['accessibility']['title'];
            $this->finalData['mobile']['categories']['accessibility']['score'] = $score['lighthouseResult']['categories']['accessibility']['score'] * 100;

            $this->finalData['mobile']['categories']['accessibility']['degree'] = $score['lighthouseResult']['categories']['accessibility']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['seo'])) {

            if ((($score['lighthouseResult']['categories']['seo']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['seo']['score'] * 100) <= 49)) {
                $this->finalData['mobile']['categories']['seo']['roundc'] = $this->poor_round_color;
                $this->finalData['mobile']['categories']['seo']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['seo']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['seo']['score'] * 100) <= 89)) {
                $this->finalData['mobile']['categories']['seo']['roundc'] = $this->medium_round_color;
                $this->finalData['mobile']['categories']['seo']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['mobile']['categories']['seo']['roundc'] = $this->good_round_color;
                $this->finalData['mobile']['categories']['seo']['textc'] = $this->good_text_color;
            }

            $this->finalData['mobile']['categories']['seo']['title'] = $score['lighthouseResult']['categories']['seo']['title'];
            $this->finalData['mobile']['categories']['seo']['score'] = $score['lighthouseResult']['categories']['seo']['score'] * 100;

            $this->finalData['mobile']['categories']['seo']['degree'] = $score['lighthouseResult']['categories']['seo']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['best-practices'])) {

            if ((($score['lighthouseResult']['categories']['best-practices']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['best-practices']['score'] * 100) <= 49)) {
                $this->finalData['mobile']['categories']['best_practices']['roundc'] = $this->poor_round_color;
                $this->finalData['mobile']['categories']['best_practices']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['best-practices']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['best-practices']['score'] * 100) <= 89)) {
                $this->finalData['mobile']['categories']['best_practices']['roundc'] = $this->medium_round_color;
                $this->finalData['mobile']['categories']['best_practices']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['mobile']['categories']['best_practices']['roundc'] = $this->good_round_color;
                $this->finalData['mobile']['categories']['best_practices']['textc'] = $this->good_text_color;
            }

            $this->finalData['mobile']['categories']['best_practices']['title'] = $score['lighthouseResult']['categories']['best-practices']['title'];
            $this->finalData['mobile']['categories']['best_practices']['score'] = $score['lighthouseResult']['categories']['best-practices']['score'] * 100;

            $this->finalData['mobile']['categories']['best_practices']['degree'] = $score['lighthouseResult']['categories']['best-practices']['score'] * 360;
        }

        return $this->finalData;
    }


    public function getDesktopInsights(PageSpeedInsightsService $pageSpeedInsightsService, $url)
    {
        $strategy = 'desktop';
        $score = $pageSpeedInsightsService->getScore($url, $strategy);
        $this->finalData['desktop']['strategy'] = ucfirst($strategy);

        if (isset($score['lighthouseResult']['categories'])) {
            $this->finalData['desktop']['is_data'] = true;
        }

        // Desktop
        if (isset($score['lighthouseResult']['categories']['performance'])) {

            if ((($score['lighthouseResult']['categories']['performance']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['performance']['score'] * 100) <= 49)) {
                $this->finalData['desktop']['categories']['performance']['roundc'] = $this->poor_round_color;
                $this->finalData['desktop']['categories']['performance']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['performance']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['performance']['score'] * 100) <= 89)) {
                $this->finalData['desktop']['categories']['performance']['roundc'] = $this->medium_round_color;
                $this->finalData['desktop']['categories']['performance']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['desktop']['categories']['performance']['roundc'] = $this->good_round_color;
                $this->finalData['desktop']['categories']['performance']['textc'] = $this->good_text_color;
            }

            $this->finalData['desktop']['categories']['performance']['title'] = $score['lighthouseResult']['categories']['performance']['title'];
            $this->finalData['desktop']['categories']['performance']['score'] = $score['lighthouseResult']['categories']['performance']['score'] * 100;

            $this->finalData['desktop']['categories']['performance']['degree'] = $score['lighthouseResult']['categories']['performance']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['accessibility'])) {

            if ((($score['lighthouseResult']['categories']['accessibility']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['accessibility']['score'] * 100) <= 49)) {
                $this->finalData['desktop']['categories']['accessibility']['roundc'] = $this->poor_round_color;
                $this->finalData['desktop']['categories']['accessibility']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['accessibility']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['accessibility']['score'] * 100) <= 89)) {
                $this->finalData['desktop']['categories']['accessibility']['roundc'] = $this->medium_round_color;
                $this->finalData['desktop']['categories']['accessibility']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['desktop']['categories']['accessibility']['roundc'] = $this->good_round_color;
                $this->finalData['desktop']['categories']['accessibility']['textc'] = $this->good_text_color;
            }

            $this->finalData['desktop']['categories']['accessibility']['title'] = $score['lighthouseResult']['categories']['accessibility']['title'];
            $this->finalData['desktop']['categories']['accessibility']['score'] = $score['lighthouseResult']['categories']['accessibility']['score'] * 100;

            $this->finalData['desktop']['categories']['accessibility']['degree'] = $score['lighthouseResult']['categories']['accessibility']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['seo'])) {

            if ((($score['lighthouseResult']['categories']['seo']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['seo']['score'] * 100) <= 49)) {
                $this->finalData['desktop']['categories']['seo']['roundc'] = $this->poor_round_color;
                $this->finalData['desktop']['categories']['seo']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['seo']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['seo']['score'] * 100) <= 89)) {
                $this->finalData['desktop']['categories']['seo']['roundc'] = $this->medium_round_color;
                $this->finalData['desktop']['categories']['seo']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['desktop']['categories']['seo']['roundc'] = $this->good_round_color;
                $this->finalData['desktop']['categories']['seo']['textc'] = $this->good_text_color;
            }


            $this->finalData['desktop']['categories']['seo']['title'] = $score['lighthouseResult']['categories']['seo']['title'];
            $this->finalData['desktop']['categories']['seo']['score'] = $score['lighthouseResult']['categories']['seo']['score'] * 100;

            $this->finalData['desktop']['categories']['seo']['degree'] = $score['lighthouseResult']['categories']['seo']['score'] * 360;
        }

        if (isset($score['lighthouseResult']['categories']['best-practices'])) {

            if ((($score['lighthouseResult']['categories']['best-practices']['score'] * 100) >= 0) && (($score['lighthouseResult']['categories']['best-practices']['score'] * 100) <= 49)) {
                $this->finalData['desktop']['categories']['best_practices']['roundc'] = $this->poor_round_color;
                $this->finalData['desktop']['categories']['best_practices']['textc'] =  $this->poor_text_color;
            } else if ((($score['lighthouseResult']['categories']['best-practices']['score'] * 100) >= 50) && (($score['lighthouseResult']['categories']['best-practices']['score'] * 100) <= 89)) {
                $this->finalData['desktop']['categories']['best_practices']['roundc'] = $this->medium_round_color;
                $this->finalData['desktop']['categories']['best_practices']['textc'] = $this->medium_text_color;
            } else {
                $this->finalData['desktop']['categories']['best_practices']['roundc'] = $this->good_round_color;
                $this->finalData['desktop']['categories']['best_practices']['textc'] = $this->good_text_color;
            }


            $this->finalData['desktop']['categories']['best_practices']['title'] = $score['lighthouseResult']['categories']['best-practices']['title'];

            $this->finalData['desktop']['categories']['best_practices']['score'] = $score['lighthouseResult']['categories']['best-practices']['score'] * 100;

            $this->finalData['desktop']['categories']['best_practices']['degree'] = $score['lighthouseResult']['categories']['best-practices']['score'] * 360;
        }

        return $this->finalData;
    }
}
