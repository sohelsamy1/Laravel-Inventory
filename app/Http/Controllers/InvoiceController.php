<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
// use Illuminate\View\View;
use App\Models\Customer;
use Illuminate\Http\Request;
use PHPUnit\Runner\Exception;
use App\Models\InvoiceProduct;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{

//    public function SalPage():View{
//     return view('pages.dashboard.sale-page');
//    }

   public function InvoiceCreate(Request $request){

    DB::beginTransaction();

    try {
        $user_id = $request->header('user_id');
        $total = $request->input('total');
        $discount = $request->input('discount');
        $vat = $request->input('vat');
        $payable = $request->input('payable');
        $customer_id = $request->input('customer_id');

      $invoice = Invoice::create([
            'total' =>$total,
            'discount' =>$discount,
            'vat' =>$vat,
            'payable' =>$payable,
            'user_id' =>$user_id,
            'customer_id' =>$customer_id,
      ]);

       $invoiceID = $invoice->id;
       $products = $request->input('products');

       foreach ($products as $EachProduct){
        InvoiceProduct::create([
            'invoice_id' => $invoiceID,
            'user_id' => $user_id,
            'product_id' => $EachProduct['product_id'],
            'qty' => $EachProduct['qty'],
            'sale_price' => $EachProduct['sale_price'],
            // 'sale_price' =>$EachProduct['qtsale_price'],
        ]);
       }
       DB::commit();

       return 1;

        }catch (Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
   }

    public function invoiceSelect(Request $request){
       $user_id = $request->header('user_id');
       return Invoice::where('user_id',$user_id)->with('customer')->get();
    }

     public function invoiceDetails(Request $request){
     $user_id = $request->header('user_id');

     $customerDetails = Customer::where('user_id', $user_id)->where('id', $request->input('cus_id'))->first();
     $invoiceTotal = Invoice::where('user_id', $user_id)->where('id', $request->input('inv_id'))->first();
     $invoiceProduct = InvoiceProduct::where('invoice_id', $request->input('inv_id'))
     ->where('user_id', $user_id)->with('product')
     ->get();
     return array(
        'customer' => $customerDetails,
        'invoice' => $invoiceTotal,
        'product' => $invoiceProduct,
     );

    }

     public function invoiceDelete(Request $request){
      DB::beginTransaction();
      try{
        $user_id=$request->header('user_id');
        InvoiceProduct::where('invoice_id',$request->input('inv_id'))
        ->where('user_id', $user_id)
        ->delete();
        Invoice::where('id', $request->input('inv_id'))->delete();
        DB::commit();
        return 1;
      }
        catch(Exception $e){
            DB::rollBack();
            return 0;
        }
    }

}
