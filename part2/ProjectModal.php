<?php
/*
    This class is used to store the information to display the individual
    project modals.  I used this as more of an abstraction to make my php
    look cleaner in portfolio.php
*/
class ProjectModal
{
    private $id;
    private $title;
    private $png;
    private $problem;
    private $importance;
    private $role;
    private $learned;
    private $client;
    private $date;
    private $service;

    function __construct($new_id, $new_title, $new_png, $new_problem, $new_importance, $new_role, $new_learned, $new_client, $new_date, $new_service)
    {
        $this->id = $new_id;
        $this->title = $new_title;
        $this->png = $new_png;
        $this->problem = $new_problem;
        $this->importance = $new_importance;
        $this->role = $new_role;
        $this->learned = $new_learned;
        $this->client = $new_client;
        $this->date = $new_date;
        $this->service = $new_service;
    }

    /*
        This is the most important function.  It displays the formating for each
        project in the projects table in my database
    */
    function __toString()
    {
        $ans = <<<EOT
        <div class="portfolio-modal modal fade" id="portfolioModal{$this->id}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2>{$this->title}</h2>
                                <hr class="star-primary">
                                <img src="img/portfolio/{$this->png}" class="img-responsive img-centered" alt="">
                                <h3>Problem this project tries to solve</h3>
                                <p>{$this->problem}</p>
                                <h3>Why was this important to me</h3>
                                <p>{$this->importance}</p>
                                <h3>My role in this project</h3>
                                <p>{$this->role}</p>
                                <h3>My take aways</h3>
                                <p>{$this->learned}</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong>{$this->client}
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong>{$this->date}
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong>{$this->service}
                                        </strong>
                                    </li>
                                </ul>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
EOT;
        return $ans;
    }
}
?>
