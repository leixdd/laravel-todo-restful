<?php

namespace todo\Console\Commands;

use Illuminate\Console\Command;
use todo\Task;

class tododelete extends Command
{
    public $id;

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct($id)
  {
      $this->id = $id;
  }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        return Task::where('id', $this->id)->delete();
    }
}
