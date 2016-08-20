<?php namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Mgallegos\LaravelJqgrid\Repositories\EloquentRepositoryAbstract;
    use App\mmodule;
    class ExampleRepository extends EloquentRepositoryAbstract {
     
        public function __construct()
        {
            $this->Database = new mmodule();
     
            $this->visibleColumns = array('moduleid','modulename','moduleslug');
     
            $this->orderBy = array(array('moduleid', 'asc'), array('modulename','desc'));
        }
    }