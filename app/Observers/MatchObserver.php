<?php

namespace App\Observers;

use App\Models\Matches;
use App\Traits\LogsActivity;
use Illuminate\Support\Str;

class MatchObserver
{
    // Use the LogsActivity trait to log activity to the database
    use LogsActivity;

    /**
     * Handle the Matches "created" event.
     *
     * @param  \App\Models\Matches  $match
     * @return void
     */
    public function created(Matches $match)
    {
        $this->logActivity('match.created', $match, [
            'title' => $match->title,
            'court_id' => $match->court_id,
        ]);
    }

    /**
     * Handle the Matches "updated" event.
     * This method is triggered any time a match is updated.
     *
     * @param  \App\Models\Matches  $match
     * @return void
     */
    public function updated(Matches $match)
    {
        $hasChanges = false;
        
        // Define fields to watch and their corresponding activity types
        $loggableChanges = [
            'match_status' => 'match.updated',
            'title' => 'match_title_updated',
            'play_date' => 'match.updated',
            'price' => 'match.updated',
        ];

        foreach ($loggableChanges as $field => $activityType) {
            if ($match->isDirty($field)) {
                $changes = [
                    $field => [
                        'old' => $match->getOriginal($field),
                        'new' => $match->{$field},
                    ],
                ];
                $this->logActivity($activityType, $match, $changes);
                $hasChanges = true;
            }
        }

        if ($match->isDirty('from_hour') || $match->isDirty('to_hour')) {
            $changes['schedule'] = [
                'old_from' => $match->getOriginal('from_hour'),
                'new_from' => $match->from_hour,
                'old_to' => $match->getOriginal('to_hour'),
                'new_to' => $match->to_hour,
            ];
            $this->logActivity('match.updated', $match, $changes);
            $hasChanges = true;
        }
        
        // Log a general update if no specific fields were changed
        if (!$hasChanges) {
            $this->logActivity('match.updated', $match, [
                'message' => 'Match was updated, but no specific watched fields changed.',
            ]);
        }
    }

    /**
     * Handle the Matches "deleted" event.
     *
     * @param  \App\Models\Matches  $match
     * @return void
     */
    public function deleted(Matches $match)
    {
        $this->logActivity('match.deleted', $match, [
            'title' => $match->title,
        ]);
    }

    /**
     * Handle the Matches "restored" event.
     *
     * @param  \App\Models\Matches  $match
     * @return void
     */
    public function restored(Matches $match)
    {
        $this->logActivity('match.updated', $match, [
            'title' => $match->title,
        ]);
    }

    /**
     * Handle the Matches "force deleted" event.
     *
     * @param  \App\Models\Matches  $match
     * @return void
     */
    public function forceDeleted(Matches $match)
    {
        $this->logActivity('match.deleted', $match, [
            'title' => $match->title,
        ]);
    }
}
