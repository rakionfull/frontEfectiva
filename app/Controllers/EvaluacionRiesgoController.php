<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EvaluacionRiesgoController extends BaseController
{
    public function index()
    {
        if ($this->session->logged_in) {
            return view('evaluacionriesgos/evaluacion_riesgo',[
                'escenario' => $this->session->escenario,
            ]);
        }
    }

    public function getAll(){
        if ($this->session->logged_in) {
            $get_endpoint = '/api/listEvaluacionRiesgos/';
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function countByValor(){
        if ($this->session->logged_in) {
            $get_endpoint = '/api/countByValor/';
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }

    public function getById($id){
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getEvaluacionRiesgo/'.$id;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }



    public function store(){
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/evaluacion_riesgo'));
            } else {
                $currentDate = date("Y-m-d H:i:s");
                $post_endpoint = '/api/addEvaluacionRiesgo';
                $request_data = [];
                $request_data = $this->request->getPost();
                $request_data['id_user_added'] = $this->session->id;
                $request_data['date_add'] = $currentDate;
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
                if ($response) {
                    echo json_encode($response);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function update($id)
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/evaluacion_riesgo'));
            } else {
                $currentDate = date("Y-m-d H:i:s");
                $post_endpoint = '/api/updateEvaluacionRiesgo/'.$id;
                $request_data = [];
                $request_data = $this->request->getPost();
                $request_data['id_user_updated'] = $this->session->id;
                $request_data['date_modify'] = $currentDate;
                $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));

                if ($response) {
                    echo json_encode($response);
                } else {
                    echo json_encode(false);
                }
            }
        }
    }

    public function delete($id)
    {
        if ($this->session->logged_in) {
            $post_endpoint = '/api/deleteEvaluacionRiesgo/' . $id;
            $currentDate = date("Y-m-d H:i:s");
            $request_data = $this->request->getPost();
            $request_data['id_user_deleted'] = $this->session->id;
            $request_data['date_deleted'] = $currentDate;
            $response = (perform_http_request('POST', REST_API_URL . $post_endpoint, $request_data));
            if ($response) {
                echo json_encode($response);
            } else {
                echo json_encode(false);
            }
        }
    }

    public function exportExcelEVA(){
        try {
            $data = [];
            $get_endpoint = '/api/listEvaluacionRiesgos/';
            $file_name = 'evaluacion_riesgo.xlsx';
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                $data = $response;
            }

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Id');
            $sheet->setCellValue('B1', 'Riesgo');
            $sheet->setCellValue('C1', 'Riesgo Absoluto Probabilidad');
            $sheet->setCellValue('D1', 'Riesgo Absoluto Impacto');
            $sheet->setCellValue('E1', 'Riesgo Absoluto Valor');
            $sheet->setCellValue('F1', 'Riesgo Controlado Probabilidad');
            $sheet->setCellValue('G1', 'Riesgo Controlado Impacto');
            $sheet->setCellValue('H1', 'Riesgo Controlado Valor');
            $sheet->setCellValue('I1', 'Estado');
            $rows = 2;
            // var_dump($data->data);die();
            foreach ($data->data as $item){
                // var_dump($item);die();
                $sheet->setCellValue('A' . $rows, $item->id);
                $sheet->setCellValue('B' . $rows, $item->riesgo);
                $sheet->setCellValue('C' . $rows, $item->probabilidad);
                $sheet->setCellValue('D' . $rows, $item->impacto);
                $sheet->setCellValue('E' . $rows, $item->valor);
                $sheet->setCellValue('F' . $rows, $item->riesgo_controlado_probabilidad);
                $sheet->setCellValue('G' . $rows, $item->riesgo_controlado_impacto);
                $sheet->setCellValue('H' . $rows, $item->riesgo_controlado_valor);
                $sheet->setCellValue('I' . $rows, $item->estado == '1' ? 'Activo' : 'Inactivo');
                $rows++;
            }
    
            $writer = new Xlsx($spreadsheet);
            $writer->save($file_name);
            return $this->response->download($file_name, null)->setFileName($file_name);

        } catch (\Throwable $th) {
            log_message('error','Error: '.$th->getMessage()." file ".$th->getFile()." Line ".$th->getLine());
            //throw $th;
        }
    }
}
