<?php

namespace App\Http\Controllers;

use App\Models\module;
use Illuminate\Http\Request;

class moduleController extends Controller
{
    public function index()
    {
        $module = module::orderBy('order','ASC')->get();
        return view('module.index',compact('module'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:modules',

        ]);
        $module = new module();
            $module->name = $request->name;
            $module->slug = strtolower(str_replace(' ', '', $request->name));
            $module->save();

            $module->order = count(module::all());
            $module->save();
//for all data get from table .......
        $module=module::find($module->id);

        return response()->json($module);
    }

    public function edit(Module $moduleId)
     {
        return response()->json($moduleId);
     }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|string|unique:modules,name,' . $request->id,
        ]);
            $module=module::find($request->id);
            $module->name=$request->name;
            $module->slug=strtolower(str_replace(' ', '',$request->name)); 
            $module->status=$request->status;
            $module->save();
            return response()->json($module);
    }
    public function destroy($moduleId)
    {
        //write some query module has any user 

        module::findOrFail($moduleId)->delete();
        return response()->json(['message' => 'Module deleted successfully.']);

        
    }

    public function updateorder(Request $request)
    {
        $moduleId = $request->input('module_id');
        $direction = $request->input('direction');
    
        $module = module::find($moduleId);
    
        
        if ($module) {
            
            $currentOrder = $module->order;

            $newOrder = $direction == 'up' ? $currentOrder - 1 : $currentOrder + 1;
    
            // Find the module with the new order number
            $newModule = module::where('order', $newOrder)->first();
            if ($newModule) {
                // Swap the order numbers of the current module and the new module
                $module->order = $newOrder;
                $newModule->order = $currentOrder;
               

                $module->save();
                $newModule->save();
    
                return response()->json(['success' => true]);
            }
        }
    
        return response()->json(['success' => false]);
    }


    public function updateIsDashboard(Request $request)
    {

        $moduleId = $request->moduleId;
        $isChecked = $request-> isChecked;
           if($isChecked == 'false')
           {
            $status=1;
           }
           else
           {
            $status=0;
           }
        $module=module::find($moduleId);

        $module->is_dashboard=$status;
        $module->save();
      
        // Update the "is_dashboard" status in the database based on $moduleId and $isChecked
      
        return response()->json($module);

    }
}
