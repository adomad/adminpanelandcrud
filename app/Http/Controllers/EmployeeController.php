<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;


use Illuminate\Support\Facades\View;
use PDF;

use Psy\Command\EditCommand;



class EmployeeController extends Controller
{
    public function index(){
        $employees=Employee::orderBy('id','DESC')->paginate(10);

       return view('employee.list',['employees'=>$employees]);
    }
    public function create(){
        return view('employee.create');
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'image' => 'sometimes|image:gif,png,jpeg,jpg'
    ]);

    if ($validator->passes()) {
        // Save data here
        $employee=new Employee();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->address=$request->address;
        $employee->save();
        // Upload image here
        if ($request->image) {
            $oldImage = $employee->image;

            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName); // This will save file in a folder
            
            $employee->image = $newFileName;
            $employee->save();
        }
        
        $request->session()->flash('sucess','Ticket added sucessfully.');
        return redirect()->route('employees.index');
    } else {
        // Return with errors
        return redirect()->route('employees.create')->withErrors($validator)->withInput();
    }
}
public function edit($id){
    $employee= Employee::findOrFail($id);
    
    return view('employee.edit',['employee'=> $employee]);

}
public function update($id,Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        'image' => 'sometimes|image:gif,png,jpeg,jpg'
    ]);

    if ($validator->passes()) {
        // Save data here
        $employee=Employee::find($id);
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->address=$request->address;
        $employee->save();
        // Upload image here
        if ($request->image) {
            $oldImage = $employee->image;

            $ext = $request->image->getClientOriginalExtension();
            $newFileName = time().'.'.$ext;
            $request->image->move(public_path().'/uploads/employees/',$newFileName); // This will save file in a folder
            
            $employee->image = $newFileName;
            $employee->save();
            File::delete(public_path().'/uploads/employees/'.$oldImage);
        }
        
        
        return redirect()->route('employees.index')->with('sucess','Ticket added sucessfully.');
    } else {
        // Return with errors
        return redirect()->route('employees.edit',$id)->withErrors($validator)->withInput();
    }
    

}
public function destroy($id,Request $request){
    $employee= Employee::findOrFail($id);
    File::delete(public_path().'/uploads/employees/'.$employee->image);

    $employee->delete();
    return redirect()->route('employees.index')->with('sucess','Ticket deleted sucessfully.');
}
public function downloadPDF($id)
    {
        // Get the employees data
        $employees = Employee::whereIn('id', [1, 2, 3])->get();;

        // Create a new instance of Dompdf
        $pdf = new Dompdf();

        // Load the HTML view with the employees data
        $html = View::make('pdf.invoice', ['employees' => $employees])->render();

        // Load the HTML content into Dompdf
        $pdf->loadHtml($html);

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $pdf->render();

        // Output the PDF content
        return $pdf->stream('invoice.pdf');
    }
    public function format($id){
        $employee= Employee::findOrFail($id);
    
    return view('employee.format',['employee'=> $employee]);

    }
}
