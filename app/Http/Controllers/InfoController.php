<?php

namespace App\Http\Controllers;

use App\Models\Medic;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

/**
 * Class InfoController
 * @package App\Http\Controllers
 *
 */
class InfoController extends Controller
{
    public function getCallsToday(){
        return view('pages.calls_by_day')->with([
            'reports' => Report::query()->whereBetween('created_at', [date("Y-m-d"), date("Y-m-d H:i:s")])->get()
        ]);
    }

    public function getIlls(Request $request){
        $this->response['status'] = 'OK';
        $this->response['data'] =
            Report::query()->where('diagnosis', $request['ill'])->
            join('doctors','doctors.id', '=', 'reports.doctor_id')->
            join('patients', 'patients.id', '=', 'reports.patient_id')->
            select('patients.name', 'doctors.first_name', 'doctors.last_name')->get();

        return response()->json($this->response);
    }

    public function getMedicInfoPrepare(){
        return view('pages.medic_info')->with([
            'medics' => Medic::all()
        ]);
    }

    public function getMedicInfo(Request $request){

        $validator = Validator::make($request->all(), [
            'medic_id' => 'required|exists:medics,id'
        ], [
            'required' => 'Не все поля заполнены!',
            'exists' => 'Такого лекарства не сущетсвует'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            return response()->json($this->response);
        }

        $this->response['status'] = 'OK';
        $this->response['data'] = Medic::query()->where('id', $request['medic_id'])->get()->first();
        return response()->json($this->response);
    }

    public function patientReportPrepare(){
        return view('pages.report')->with([
            'reports' => Report::all()
        ]);
    }

    public function getReport(Request $request){
        $validator = Validator::make($request->all(), [
            'report_id' => 'required|exists:reports,id'
        ]);

        if($validator->fails()){
            return response("<script>alert('Отчет не найден');document.location.replace('/')</script>")->setStatusCode(404);
        }

        return view('pages.pdf.patient_report',[
            'report' => Report::query()->where('id', $request['report_id'])->get()->first()
        ]);
    }

    public function newReportPrepare(){
        return view('pages.new_report')->with([
            'medics' => Medic::all(),
            'patients' => Patient::all()
        ]);
    }

    public function newReport(Request $request){
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
        ], [
            'required' => 'Не все поля заполнены!',
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            return response()->json($this->response);
        }

        if(@$request['need_medic'] && !Medic::query()->where('id', @$request['medic_id'])->count()){
            $this->response['message'] = 'Такого лекарства не найдено!';
            return response()->json($this->response);
        }


        $report = new Report();
        $report->medic_name = @$request['need_medic'] ?
            Medic::query()->where('id', @$request['medic_id'])->get()->first()->name :
            null;

        $report->to_home = @$request['to_home'] ? 1 : 0;
        $report->patient_id = @$request['patient_id'];
        $report->doctor_id = Patient::query()->where('id', @$request['patient_id'])->get()->first()->doctor_id;
        $report->diagnosis = @$request['diagnosis'];
        $report->save();

        $this->response['status'] = 'OK';
        return response()->json($this->response);
    }

    public function newMedic(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:medics,name|max:100|regex:/^[\pL\s\-]+$/u',
            'use_type' => 'required|max:100',
            'action' => 'required|max:100',
            'post_effect' => 'required|max:100',
        ], [
            'required' => 'Не все поля заполнены!',
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            return response()->json($this->response);
        }

        $medic = new Medic();
        $medic->name = $request['name'];
        $medic->use_type = $request['use_type'];
        $medic->action = $request['action'];
        $medic->post_effect = $request['post_effect'];
        $medic->save();

        $this->response['status'] = 'OK';
        return response()->json($this->response);
    }
}
