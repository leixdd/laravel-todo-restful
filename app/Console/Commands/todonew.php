<?php

namespace todo\Console\Commands;

use Illuminate\Console\Command;
use todo\Task;

class todonew extends Command
{

      public $id;
      public $taskname;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($id, $taskname)
    {
        $this->id = $id;
        $this->taskname = $taskname;
    }


    public function handle()
    {
      return Task::create([
        'id' => $this->id,
        'task_name' => $this->taskname
      ]);
    }
}
