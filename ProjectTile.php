<?php
/*
    This class is used to store the information to display the individual
    project tiles
*/
class ProjectTile
{
    protected $png;
    protected $proj_id;

    function __construct($new_id, $new_png)
    {
        $this->png = $new_png;
        $this->proj_id = $new_id;
    }

    function __toString()
    {
        $ans = <<<EOT
            <div class="col-sm-4 portfolio-item">
                <a href="#portfolioModal{$this->proj_id}" class="portfolio-link" data-toggle="modal">
                    <div class="caption">
                        <div class="caption-content">
                            <i class="fa fa-search-plus fa-3x"></i>
                        </div>
                    </div>
                    <img src="img/portfolio/{$this->png}" class="img-responsive" alt="">
                </a>
            </div>
EOT;
        return $ans;
    }
}
?>
