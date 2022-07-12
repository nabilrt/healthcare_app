<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Seller;
use App\Models\Patient;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seller=Seller::where('seller_id',session('username'))->first();
        $medicines=Medicine::paginate(5);
        return view('Seller.manage_medicines')->with('seller',$seller)->with('medicines',$medicines);

    }

    public function ind(){

        $medicines=Medicine::paginate(5);
        $patient=Patient::where('patient_id',session('username'))->first();
         return view('Patient.products')->with('patient',$patient)->with('medicines',$medicines);

    }

    public function showMed(Request $req){

        $med=Medicine::where('medicine_id',$req->m_id)->first();

        $seller=Seller::where('seller_id',session('username'))->first();

        return view('Seller.update_medicine')->with('medicine',$med)->with('seller',$seller);

    }

    public function updateMed(Request $req){

        $med=Medicine::where('medicine_id',$req->m_id)->first();
        $med->quantity=$req->quantity;
        $med->medicine_price=$req->unit_price;
        $med->save();

        return redirect()->route('manage_med');


    }

    public function deleteMed(Request $req){

        $med=Medicine::where('medicine_id',$req->m_id)->first();
        $med->delete();
        return back()->withErrors(['Medicine Deleted Successfully', 'Cart is Empty!!']);


    }

    public function add(){

        $seller=Seller::where('seller_id',session('username'))->first();

        return view('Seller.add_medicine')->with('seller',$seller);
    }

    public function generateID(){

        $medicine=Medicine::orderBy('medicine_id','desc')->first();

        if(!$medicine){
            $Medicine_ID="M-1";
            return $Medicine_ID;
        }else{

        $rec=explode('-',$medicine->medicine_id);
        $new_id=(int)$rec[1];
        $updated_id=$new_id+1;

        $Medicine_ID="M-".str($updated_id);

        return $Medicine_ID;

        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        $req->validate([
            'med_name'=>'required',
            'med_type'=>'required|alpha',
            'quantity'=>'required|numeric',
            'unit_price'=>'required|numeric'
        ]);

        $med=new Medicine();
        $med->medicine_id=$this->generateID();
        $med->medicine_name=$req->med_name;
        $med->medicine_type=$req->med_type;
        $med->quantity=$req->quantity;
        $med->medicine_price=$req->unit_price;
        $med->save();

        return back()->withErrors(['Medicine Added Successfully', 'Cart is Empty!!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $seller=Seller::where('seller_id',session('username'))->first();
        $medicines=Medicine::all();

        if($req->med_type !='' && $req->name!=""){

            $medicines=Medicine::where('medicine_name','LIKE','%'.$req->search.'%')->where('medicine_type',$req->med_type)->get();

            return view('Seller.search_medicine')->with('medicines',$medicines)->with('seller',$seller);

        }

        else if($req->med_type =='' && $req->name!=""){

            $medicines=Medicine::where('medicine_name','LIKE','%'.$req->search.'%')->get();

            return view('Seller.search_medicine')->with('medicines',$medicines)->with('seller',$seller);

        }

        else if($req->med_type !='' && $req->name==""){

            $medicines=Medicine::where('medicine_type',$req->med_type)->get();

            return view('Seller.search_medicine')->with('medicines',$medicines)->with('seller',$seller);

        }

        return view('Seller.search_medicine')->with('medicines',$medicines)->with('seller',$seller);



    }

    public function p_store(Request $req){

        $patient=Patient::where('patient_id',session('username'))->first();
        $medicines=Medicine::all();

        if($req->med_type !='' && $req->name!=""){

            $medicines=Medicine::where('medicine_name','LIKE','%'.$req->search.'%')->where('medicine_type',$req->med_type)->get();

            return view('Patient.search_medicines')->with('medicines',$medicines)->with('patient',$patient);

        }

        else if($req->med_type =='' && $req->name!=""){

            $medicines=Medicine::where('medicine_name','LIKE','%'.$req->search.'%')->get();

            return view('Patient.search_medicines')->with('medicines',$medicines)->with('patient',$patient);

        }

        else if($req->med_type !='' && $req->name==""){

            $medicines=Medicine::where('medicine_type',$req->med_type)->get();

            return view('Patient.search_medicines')->with('medicines',$medicines)->with('patient',$patient);

        }

        return view('Patient.search_medicines')->with('medicines',$medicines)->with('patient',$patient);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineRequest  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
