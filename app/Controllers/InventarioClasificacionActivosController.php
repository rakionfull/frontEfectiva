<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class InventarioClasificacionActivosController extends BaseController
{
    public function index()
    {
        $is_user_negocio = $this->session->is_user_negocio;
        return view('inventarioclasificacionactivos/inventario_clasificacion_activo',[
            'is_user_negocio' => $is_user_negocio
        ]);
    }

    public function getAll(){
        if ($this->session->logged_in) {
            if($this->session->is_user_negocio){
                $get_endpoint = '/api/getInventarioClasificacionActivoUser/'.$this->session->id;
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    echo json_encode($response);
                }
            }else{
                $get_endpoint = '/api/listInventarioClasificacionActivo';
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    echo json_encode($response);
                }
            }
        }
    }

    public function get($id){
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getInventarioClasificacionActivo/'.$id;
            $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
            if ($response) {
                echo json_encode($response);
            }
        }
    }

    public function getValorByValoraciones(){
        if ($this->session->logged_in) {
            $get_endpoint = '/api/getValorByValoraciones/';
            $request_data = $this->request->getPost();
            $response = perform_http_request('POST', REST_API_URL . $get_endpoint, $request_data);
            if ($response) {
                echo json_encode($response);
            }
        }
    }
    public function store(){
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/inventario-clasificacion-activos'));
            } else {
                $currentDate = date("Y-m-d H:i:s");
                $post_endpoint = '/api/addInventarioClasificacionActivo';
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
                return redirect()->to(base_url('/inventario-clasificacion-activos'));
            } else {
                $currentDate = date("Y-m-d H:i:s");
                $post_endpoint = '/api/updateInventarioClasificacionActivo/'.$id;
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
    public function updateStatus($id)
    {
        if ($this->session->logged_in) {
            if (!$this->request->getPost()) {
                return redirect()->to(base_url('/inventario-clasificacion-activos'));
            } else {
                $currentDate = date("Y-m-d H:i:s");
                $post_endpoint = '/api/updateStatus/'.$id;
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
            $post_endpoint = '/api/deleteInventarioClasificacionActivo/' . $id;
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
    public function exportExcelICA(){
        try {
            $data = [];
            if($this->session->is_user_negocio){
                $get_endpoint = '/api/getInventarioClasificacionActivoUser/'.$this->session->id;
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    $data = $response;
                }
            }else{
                $get_endpoint = '/api/listInventarioClasificacionActivo';
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    $data = $response;
                }
            }

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Id');
            $sheet->setCellValue('B1', 'Empresa');
            $sheet->setCellValue('C1', 'Area');
            $sheet->setCellValue('D1', 'Unidad');
            $sheet->setCellValue('E1', 'Macroproceso');
            $sheet->setCellValue('F1', 'Proceso');
            $sheet->setCellValue('G1', 'Nombre de Activo');
            $sheet->setCellValue('H1', 'Descripci??n de Activo');
            $sheet->setCellValue('I1', 'Tipo de Activo');
            $sheet->setCellValue('J1', 'Categor??a de Activo');
            $sheet->setCellValue('K1', 'Ubicaci??n');
            $sheet->setCellValue('L1', 'Propietario');
            $sheet->setCellValue('M1', 'Custodio');
            $sheet->setCellValue('N1', 'Valoracion Confidencialidad');
            $sheet->setCellValue('O1', 'Valoracion Integridad');
            $sheet->setCellValue('P1', 'Valoracion Disponibilidad');
            $sheet->setCellValue('Q1', 'Valor');
            $sheet->setCellValue('R1', 'Comentario');
            $rows = 2;
            // var_dump($data->data);die();
            foreach ($data->data as $item){
                // var_dump($item);die();
                $sheet->setCellValue('A' . $rows, $item->ica_id);
                $sheet->setCellValue('B' . $rows, $item->empresa);
                $sheet->setCellValue('C' . $rows, $item->area);
                $sheet->setCellValue('D' . $rows, $item->unidad);
                $sheet->setCellValue('E' . $rows, $item->macroproceso);
                $sheet->setCellValue('F' . $rows, $item->proceso);
                $sheet->setCellValue('G' . $rows, $item->activo);
                $sheet->setCellValue('H' . $rows, $item->desc_activo);
                $sheet->setCellValue('I' . $rows, $item->tipo_activo);
                $sheet->setCellValue('J' . $rows, $item->categoria_activo);
                $sheet->setCellValue('K' . $rows, $item->ubicacion_direccion);
                $sheet->setCellValue('L' . $rows, $item->des_propietario);
                $sheet->setCellValue('M' . $rows, $item->des_custodio);
                $sheet->setCellValue('N' . $rows, $item->val_c);
                $sheet->setCellValue('O' . $rows, $item->val_i);
                $sheet->setCellValue('P' . $rows, $item->val_d);
                $sheet->setCellValue('Q' . $rows, $item->valor);
                $sheet->setCellValue('R' . $rows, $item->ica_comentario);
                $rows++;
            }
    
            $writer = new Xlsx($spreadsheet);
            $writer->save('inventario_clasificacion_activo.xlsx');
            return $this->response->download('inventario_clasificacion_activo.xlsx', null)->setFileName('inventario_clasificacion_activo.xlsx');

        } catch (\Throwable $th) {
            log_message('error','Error: '.$th->getMessage()." file ".$th->getFile()." Line ".$th->getLine());
            //throw $th;
        }
    }
    public function exportExcelICAHistoricos(){
        try {
            $data = [];
            if($this->session->is_user_negocio){
                $get_endpoint = '/api/getAllHistoricosByUser/'.$this->session->id;
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    $data = $response;
                }
            }else{
                $get_endpoint = '/api/getAllHistoricos';
                $response = perform_http_request('GET', REST_API_URL . $get_endpoint, []);
                if ($response) {
                    $data = $response;
                }
            }

            $spreadsheet = new Spreadsheet();

            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'ID Inventario Clasificacion Activo');
            $sheet->setCellValue('B1', 'Empresa');
            $sheet->setCellValue('C1', 'Area');
            $sheet->setCellValue('D1', 'Unidad');
            $sheet->setCellValue('E1', 'Macroproceso');
            $sheet->setCellValue('F1', 'Proceso');
            $sheet->setCellValue('G1', 'Nombre de Activo');
            $sheet->setCellValue('H1', 'Descripci??n de Activo');
            $sheet->setCellValue('I1', 'Tipo de Activo');
            $sheet->setCellValue('J1', 'Categor??a de Activo');
            $sheet->setCellValue('K1', 'Ubicaci??n');
            $sheet->setCellValue('L1', 'Propietario');
            $sheet->setCellValue('M1', 'Custodio');
            $sheet->setCellValue('N1', 'Valoracion Confidencialidad');
            $sheet->setCellValue('O1', 'Valoracion Integridad');
            $sheet->setCellValue('P1', 'Valoracion Disponibilidad');
            $sheet->setCellValue('Q1', 'Valor');
            $sheet->setCellValue('R1', 'Comentario');
            $sheet->setCellValue('S1', 'Estado');
            $sheet->setCellValue('T1', 'Fecha');
            $rows = 2;
            // var_dump($data->data);die();
            foreach ($data->data as $item){
                // var_dump($item);die();
                switch ($item->ica_estado) {
                    case 1:
                        $estado = 'Borrador';
                        break;
                    case 2:
                        $estado = 'Registrado';
                        break;
                    case 3:
                        $estado = 'Observado';
                        break;
                    case 4:
                        $estado = 'Aprobado';
                        break;
                    case 5:
                        $estado = 'Por Actualizar';
                        break;
                    default:
                        break;
                }
                $sheet->setCellValue('A' . $rows, $item->ica_id);
                $sheet->setCellValue('B' . $rows, $item->empresa);
                $sheet->setCellValue('C' . $rows, $item->area);
                $sheet->setCellValue('D' . $rows, $item->unidad);
                $sheet->setCellValue('E' . $rows, $item->macroproceso);
                $sheet->setCellValue('F' . $rows, $item->proceso);
                $sheet->setCellValue('G' . $rows, $item->activo);
                $sheet->setCellValue('H' . $rows, $item->desc_activo);
                $sheet->setCellValue('I' . $rows, $item->tipo_activo);
                $sheet->setCellValue('J' . $rows, $item->categoria_activo);
                $sheet->setCellValue('K' . $rows, $item->ubicacion_direccion);
                $sheet->setCellValue('L' . $rows, $item->des_propietario);
                $sheet->setCellValue('M' . $rows, $item->des_custodio);
                $sheet->setCellValue('N' . $rows, $item->val_c);
                $sheet->setCellValue('O' . $rows, $item->val_i);
                $sheet->setCellValue('P' . $rows, $item->val_d);
                $sheet->setCellValue('Q' . $rows, $item->valor);
                $sheet->setCellValue('R' . $rows, $item->ica_comentario);
                $sheet->setCellValue('S' . $rows, $estado);
                $sheet->setCellValue('T' . $rows, $item->date_created);
                $rows++;
            }
    
            $writer = new Xlsx($spreadsheet);
            $writer->save('inventario_clasificacion_activo_historial.xlsx');
            return $this->response->download('inventario_clasificacion_activo_historial.xlsx', null)->setFileName('inventario_clasificacion_activo_historial.xlsx');

        } catch (\Throwable $th) {
            log_message('error','Error: '.$th->getMessage()." file ".$th->getFile()." Line ".$th->getLine());
            //throw $th;
        }
    }
}
