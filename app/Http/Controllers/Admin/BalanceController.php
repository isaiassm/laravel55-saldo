<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Historic;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

class BalanceController extends Controller
{
    private $totalPage = 5;

    public function index(){
        //dd(auth()->user());
        //debug
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }
    public function depositStore(MoneyValidationFormRequest $request)
    {
    
       $balance = auth()->user()->balance()->firstOrCreate([]);
       $response = $balance->deposit($request->value);

       if($response	['success'])
       return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

       return redirect()
                        ->back()
                        ->with('error',  $response['message']);                 
    }

    public function withdraw(){
            return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
       
       $balance = auth()->user()->balance()->firstOrCreate([]);
       $response = $balance->withdraw($request->value);

       if($response	['success'])
       return redirect()
                        ->route('admin.balance')
                        ->with('success', $response['message']);

       return redirect()
                        ->back()
                        ->with('error',  $response['message']);                 
    }

    public function transfer(){
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
     
      if (!$sender = $user->getSender($request->sender))
        return redirect()
            ->back()
            ->with('error', 'Usuario informado não foi encontrado');  
        
      if($sender->id === auth()->user()->id)
        return redirect()      
        ->back()
        ->with('error', 'Não pode transferir para você mesmo!');

        $balance = auth()->user()->balance;

        
        return view('admin.balance.transfer-confirm', compact('sender'));
    
    }   
    
    public function transferStore(MoneyValidationFormRequest $request, User $user){

       if(!$sender = $user->find($request->sender_id))
       return redirect()
                        ->route('balance.transfer')
                        ->with('success', 'Recebedor não encontrado!');

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);
 
        if($response	['success'])
        return redirect()
                         ->route('admin.balance')
                         ->with('success', $response['message']);
 
        return redirect()
                         ->route('balance.transfer')
                         ->with('error',  $response['message']);          
    }
   
    public function historic(Historic $historic)
    {
        $historics = auth()->user()
                                ->historics()
                                ->with(['userSender'])
                                ->paginate($this->totalPage);

        $types = $historic->type();                        

        return view('admin.balance.historics', compact('historics', 'types'));
    }

    public function SearchHistoric(Request $request, Historic $historic)
    {
       $dataForm = $request->all();

      $historics = $historic->search($dataForm, $this->totalPage);

      $types = $historic->type();

      return view('admin.balance.historics', compact('historics', 'types'));

    }


}
