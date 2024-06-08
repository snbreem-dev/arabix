<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Communication;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Language;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        parent::__construct();

        /*
         * Change the active menu at the interface
        */
        parent::$data['activeMenu'] = 'customers';
    }

    /**
     * * @OA\Get(
     *      path="/dashboard/customers",
     *      operationId="View customers",
     *      tags={"Customers"},
     *      summary="Get customers",
     *      description="Get customers",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       )
     * )
     *
     * @return View
     *
     */
    public function index()
    {
        /*
         * Return the customers in pagination with count transactions for each customer
         */
        parent::$data['customers'] = Customer::withCount('transactions')->paginate(15);
        return view('customers.index', parent::$data);
    }

    /**
     * * @OA\Get(
     *      path="dashboard/customers/{customerId}/edit",
     *      operationId="view cusmter info edit page",
     *      tags={"Customers"},
     *      summary="Edit customer",
     *      description="Edit customer",
     *      @OA\Parameter(
     *          name="customerId",
     *          in="query",
     *          required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     * )
     *
     * @return View
     *
     */
    public function edit(Customer $customer)
    {
        parent::$data['customer'] = $customer;
        parent::$data['languages'] = Language::all();
        parent::$data['currencies'] = Currency::all();
        parent::$data['communications'] = Communication::all();

        return view('customers.edit', parent::$data);
    }


    /**
     * * @OA\Put(
     *      path="dashboard/customers/{customerId}",
     *      operationId="updage customer data",
     *      tags={"Customers"},
     *      summary="Save edit customer",
     *      description="Save edit customer",
     *      @OA\Parameter(
     *          name="customerId",
     *          in="path",
     *          required=true,
     *      ),
     *       @OA\Parameter(
     *           name="name",
     *           description="name of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *       @OA\Parameter(
     *           name="email",
     *           description="email of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       )
     *       @OA\Parameter(
     *           name="phone",
     *           description="phone of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *        @OA\Parameter(
     *           name="language_id",
     *           description="language of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *       @OA\Parameter(
     *           name="currenct_id",
     *           description="currenct of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     * )
     *
     * @return array
     *
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        $customer->update([
            'communications' => $request->communications,
        ]);

        return array(
            'text' => __('Record updated successfully'),
            'status' => "success"
        );
    }

    /**
     * * @OA\Delete(
     *      path="dashboard/customers/{customerId}",
     *      operationId="delete customer",
     *      tags={"Customers"},
     *      summary="Delete customer",
     *      description="Delete customer",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="customer id to be deleted",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=404, description="Center not found"),
     *      @OA\Response(response=422, description="Center could not deleted"
     *
     * @param Customer $customer
     * @return json
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        Redis::del('user:' . $customer->id . ':transactions');

        return array(
            'text' => __('Record deleted successfully'),
            'status' => "success"
        );
    }
}
