<?php

namespace MindBlown\ProductHealth\Queue;

use Carbon\Carbon;
use MindBlown\ProductHealth\Models\Issue;
use MindBlown\ProductHealth\Contracts\Queueable;

class UpdateIssues extends Queueable{

    /**
     * Hook on which this job runs
     *
     * @var string
     */
    protected $hook = 'ph_update_issues';

    /**
     * This job updates issues and makes them more important as they grow older
     *
     * @return void
     */
    public function run() : void
    {
        $time = Carbon::now()->subWeeks( 2 );
        $issues = Issue::where( 'created_at', '<=', $time )
                        ->where( 'ignore', false )
                        ->get();

        if( $issues->isEmpty() == false ){
            foreach( $issues as $issue ){
                $issue->importance += 1; 
                $issue->save();
            }
        }
    }

}
