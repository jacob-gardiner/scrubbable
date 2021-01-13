<?php

namespace JacobGardiner\Scrubbable;


trait Scrubbable
{
    public function scrub($chunkSize = 5)
    {
        $count = 0;
        $query = $this->model::query();
        $this->scrubScope($query);

        // Scrub result set chunk by chunk
        $query->chunkById($chunkSize, function ($models) use ( $chunkSize, &$count) {
            $count += $chunkSize;
            $models->each(function ($model) {
                $model->update($this->model::factory()->scrubAttributes());
            });
        });

        return $count;
    }

    /**
     * Set query scope to limit record sets to be included
     * when scrubbing
     *
     * @param $query
     */
    public function scrubScope($query)
    {
        // $query->where('status', 'active');
    }

    abstract public function scrubAttributes(): iterable;
}
