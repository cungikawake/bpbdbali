<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Carbon\Carbon;
use Response;
use Input;
use DB;
use Excel;
class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin-manager')->except('store');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = view('dashboard.menubar');
        $subscribers = Subscriber::orderBy('created_at', 'desc')->get();
        $content = view('dashboard.subscribers.index',compact('subscribers'));
        return view('dashboard', compact('menu','content'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'email' => 'unique:subscribers,email'
            ]);
        $subscriber = $request->all();
       $success = Subscriber::create($subscriber);

        if(!$success){
          alert()->overlay('Opps!!', 'Email Already Taken');
        }else{
          alert()->overlay('Good Job', 'Thanks For Subscribe');
        }

        return redirect()->back();
    }
/*
    public function csv()
    {
        $table = Subscriber::orderBy('created_at', 'desc')->get();
          $output='';
          foreach ($table as $row) {
              $output.=  implode(",",$row->toArray());
          }
          $headers = array(
              'Content-Type' => 'text/csv',
              'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
          );

          return Response::make(rtrim($output, "\n"), 200, $headers);
    }
    */

    public function downloadExcel($type)
    {
        $data = Subscriber::get()->toArray();
        return Excel::create('download', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['email' => $value->email, 'created_at' => $value->created_at];
                }
                if(!empty($insert)){
                    DB::table('subscribers')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }

}
