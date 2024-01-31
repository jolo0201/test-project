<?php

namespace App\Controllers;

use App\Models\CrudModel;
use App\Models\DataModel;

class Crud extends BaseController
{

	function index()
	{
       
		$crudModel = new CrudModel();

		$data['tbl_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

		$data['pagination_link'] = $crudModel->pager;

		return view('crud_view', $data);
	}

    function add()
	{
		return view('add_data');
	}

	function add_validation()
	{
		helper(['form', 'url']);

		$error = $this->validate([
			'lastname'	=>	'required|min_length[3]',
			'firstname'	=>	'required',
			'middlename'=>	'required',
			'age'=>	'required',
			'birthdate'=>	'required',
			'status'=>	'required',
		]);

		if(!$error)
		{
			echo view('add_data', [
				'error' 	=> $this->validator
			]);
		}
		else
		{
			$crudModel = new CrudModel();

			$crudModel->save([
				'lastname'	=>	$this->request->getVar('lastname'),
				'firstname'	=>	$this->request->getVar('firstname'),
				'middlename'=>	$this->request->getVar('middlename'),
				'age'=>	$this->request->getVar('age'),
				'birthdate'=>	$this->request->getVar('birthdate'),
				'status'=>	$this->request->getVar('status'),
			]);

			$session = \Config\Services::session();

			$session->setFlashdata('success', 'Data Added');

			return $this->response->redirect(base_url("test-project/public/data"));
		}
    }

    function generateXML()
    {
        $dataModel = new DataModel();
        $data['td'] = $dataModel->findAll();

        $xml = new \SimpleXMLElement('<data></data>');

        foreach ($data['td'] as $record) {
            $xmlRecord = $xml->addChild('record');
            foreach ($record as $key => $value) {
                $xmlRecord->addChild($key, htmlspecialchars($value));
            }
        }

        $passedData['xml'] = $xml->asXML();
        return view('xml_view', $passedData);
    }

    function readerXML()
    {
        return  view('xml_read');
    }

    function readXML()
    {
        //Load SimpleXML library
        helper(['form', 'url']);

        $error = $this->validate([
            'xml_reader'	=>	'required'
        ]);

        if(!$error)
        {
            echo view('xml_read', [
                'error' 	=> $this->validator
            ]);
        }
        else
        {
            $xmlData = simplexml_load_string( $this->request->getVar('xml_reader') );
            $data['table_html'] = $this->generateTable($xmlData);
            return  view('xml_reader', $data);
        }
    }

    private function generateTable($xml_data) {
        $table_html = '<table border="1"><thead><tr>';

        // Assuming the first child contains column names
        foreach ($xml_data->children()->children() as $column) {
            $table_html .= '<th>' . $column->getName() . '</th>';
        }

        $table_html .= '</tr></thead><tbody>';

        foreach ($xml_data->children() as $row) {
            $table_html .= '<tr>';
            foreach ($row->children() as $column) {
                $table_html .= '<td>' . $column . '</td>';
            }
            $table_html .= '</tr>';
        }

        $table_html .= '</tbody></table>';

        return $table_html;
    }
}

?>