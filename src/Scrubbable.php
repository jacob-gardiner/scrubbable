<?php

namespace JacobGardiner\Scrubbable;

use Illuminate\Database\Eloquent\Builder;

trait Scrubbable
{
    public function scrub()
    {
        $chunkSize = 5;
        $count = 0;
        $modelClass = $this->model;
        $query = $modelClass::query();
        $this->scrubScope($query);
        // Scrub a dub dub
        $query->chunkById(5, function ($models) use ($modelClass, $chunkSize, &$count) {
            $count += $chunkSize;
            $models->each(function ($model) use ($modelClass) {
                $model->update($modelClass::factory()->scrubAttributes());
            });
        });

        return $count;
    }

    public function scrubScope($query)
    {
        //
    }

    abstract public function scrubAttributes(): iterable;
}
