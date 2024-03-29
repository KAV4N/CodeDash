<?php

class LeaderboardController extends Controller{

    function defaultAction() {
        $template = new Template('default');
        $template->view('leaderboard');
    }
    
}
