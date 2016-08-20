<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReportCtrl extends Controller {

	public function index(){
		return view('Master.report');
	}


	public function create(){
		//
	}


	public function store($xls){
		$objPHPExcel = PHPExcel_IOFactory::load($xls);
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		    $worksheetTitle     = $worksheet->getTitle();
		    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
		    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		    $nrColumns = ord($highestColumn) - 64;
		    echo "<br>The worksheet ".$worksheetTitle." has ";
		    echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
		    echo ' and ' . $highestRow . ' row.';
		    echo '<br>Data: <table border="1"><tr>';
		    for ($row = 1; $row <= $highestRow; ++ $row) {
		        echo '<tr>';
		        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
		            $cell = $worksheet->getCellByColumnAndRow($col, $row);
		            $val = $cell->getValue();
		            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
		            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
		        }
		        echo '</tr>';
		    }
		    echo '</table>';
		}
	}


	public function show($id){
		//
	}


	public function edit($id){
		//
	}

	public function update($id){
		//
	}


	public function destroy($id){
		//
	}

}
