<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Admin;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin=Admin::where('admin_id',session('username'))->first();
        return view('Admin.create_expense')->with('admin',$admin);
    }

    public function addExpenseAPI(Request $req){

        $expense=new Expense();
        $expense->expense_id=$this->generateID();
        $expense->amount=$req->amount;
        $expense->purpose=$req->purpose;
        $expense->created=date('Y-m-d');
        $expense->save();

        return "Saved";

    }

    public function fetchExpensesAPI(){

        return Expense::all();
    }

    public function deleteExpenseAPI(Request $req){

        $exp=Expense::where('expense_id',$req->id)->first();
        $exp->delete();

        return "Deleted";
    }

    public function fetchExpense(Request $req){

        return Expense::where('expense_id',$req->id)->first();
    }

    public function updateExpenseAPI(Request $req){

        $expense=Expense::where('expense_id',$req->id)->first();
        $expense->purpose=$req->purpose;
        $expense->amount=$req->amount;
        $expense->save();

        return "Updated";
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
            'purpose'=>'required|alpha',
            'amount'=>'required|numeric'
        ]);

        $expense=new Expense();
        $expense->expense_id=$this->generateID();
        $expense->amount=$req->amount;
        $expense->purpose=$req->purpose;
        $expense->created=date('Y-m-d');
        $expense->save();

        return back()->withErrors(['Expense Added Successfully!','']);
    }

    public function generateID(){
        $expense=Expense::orderBy('expense_id','desc')->first();

        if(empty($expense)){

            return "EXP-1";
        }
        else{

            $rec=explode('-',$expense->expense_id);
            $new_id=(int)$rec[1];
            $updated_id=$new_id+1;

            return "EXP-".str($updated_id);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
        $admin=Admin::where('admin_id',session('username'))->first();
        $expenses=Expense::all();
        $total=Expense::sum('amount');
        return view('Admin.manage_expenses')->with('admin',$admin)->with('expenses',$expenses)->with('total',$total);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        //
        $expense=Expense::where('expense_id',$req->c_id)->first();
        $admin=Admin::where('admin_id',session('username'))->first();
        return view('Admin.edit_expense')->with('admin',$admin)->with('expense',$expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
        $expense=Expense::where('expense_id',$req->e_id)->first();
        $expense->purpose=$req->purpose;
        $expense->amount=$req->amount;
        $expense->save();

        return redirect()->route('manage_expenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        //
        $expense=Expense::where('expense_id',$req->e_id)->first();
        $expense->delete();
        return redirect()->route('manage_expenses');

    }
}
