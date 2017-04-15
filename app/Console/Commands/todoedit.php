<?php

namespace todo\Console\Commands;

use Illuminate\Console\Command;
use todo\Task;

class todoedit extends Command
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Task::where('id', $this->id)->update(array(
          'task_name' => $this->taskname
        ));
    }
}
