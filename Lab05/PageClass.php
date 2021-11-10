<?php
class Page {
    private $page;
    private $title;
    private $year;
    private $copyright;

    function __construct($title, $year, $copyright){
        $this->title = $title;
        $this->year = $year;
        $this->copyright = $copyright;
    }

    private function addHeader() {
        $header = "<div class='header'> ".$this->title." </div><hr><hr>";
        $this->page .= $header ;
    }

    public function addContent($content) {
        $this->addHeader();
        $bodyContent = "<div class='body'> ".$content." </div>";
        $this->page .= $bodyContent;
        $this->addFooter();
    }

    private function addFooter() {
        $footer = "<hr><hr><div class='footer'>Copyright: ".$this->copyright." - ".$this->year."</div>";
        $this->page .= $footer;
    }

    public function get() {
        return ($this->page);
    }
}
?>
