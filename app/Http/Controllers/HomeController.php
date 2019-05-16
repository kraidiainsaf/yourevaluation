<?php

namespace App\Http\Controllers;
use App\Quetion;
use App\User;
use App\Respons;
use DateTime;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $qsts =Quetion::all();
        
        return view('home',['qsts'=>$qsts]);
    }
    public function add(Request  $request)
    { 
        $question =new Quetion();
        $question->quetion=$request->question;      
        $question->date=new DateTime();
       
        $test1 =Quetion::where('quetion', '=',$request->question )
        ->get();

        $qst_exist=false;
       
        if(!$test1->isEmpty()){
            $qst_exist=true;
            }
         
         $my_errors=null;
         $my_errors="";
         if($qst_exist){
           
              $my_errors='question is exist !,Change question Please.';
         
          return view('add')->withErrors($my_errors);
         
         
               }else{
                 
                  $question->save(); 
                  Session::flash('success', 'qst successfully added .'); 
                  $qsts =Quetion::all();
        
                  return view('home',['qsts'=>$qsts]);

          
       }

    } 
    public function show()
    { 
        $qst =Quetion::first();
        
          return view('respons',['qst'=>$qst]);
         

    } 
   
    public function show_rslt(Request  $request)
    {         $rslt =Respons::all();

        $terrible =Respons::where('respons','=','0')->get();
        $bad =Respons::where('respons','=','1')->get();
        $okay =Respons::where('respons','=','2')->get();
        $good =Respons::where('respons','=','3')->get();
        $great =Respons::where('respons','=','4')->get();

          return view('show',['terrible'=>count($terrible),'bad'=>count($bad)
          ,'okay'=>count($okay),'good'=>count($good),'great'=>count($great),'rslt'=>$rslt]);
         

    } 
    public function add2(Request  $request)
    { 
        
        $respons =new Respons();
        $respons->respons=$request->respons; 
        
        $respons->note=$request->note;   
        $respons->question_id=$request->question_id;  
       

        $respons->save(); 
       
       

                  Session::flash('success', 'respons  successfully added .'); 
                      return view('finale');
                 
          
       }

    
}
