<!-- <?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Employee extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('EmployeeModel');
    }    
	public function employeedata() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data';
        $data['employeeData'] = $this->EmployeeModel->employeeList();
		$this->load->view('employee', $data);
    }
	public function createExcel() {
		$fileName = 'employee.xlsx';  
		$employeeData = $this->EmployeeModel->employeeList();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Skills');
        $sheet->setCellValue('D1', 'Address');
	$sheet->setCellValue('E1', 'Age');
        $sheet->setCellValue('F1', 'Designation');       
        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['id']);
            $sheet->setCellValue('B' . $rows, $val['name']);
            $sheet->setCellValue('C' . $rows, $val['skills']);
            $sheet->setCellValue('D' . $rows, $val['address']);
	    $sheet->setCellValue('E' . $rows, $val['age']);
            $sheet->setCellValue('F' . $rows, $val['designation']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }    
}
?> -->