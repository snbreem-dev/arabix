<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
     *           name="currency_id",
     *           description="currenct of customer",
     *           required=true,
     *           in="query",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *       @OA\Parameter(
     *            name="communications",
     *            description="communication methods of the customer to rnable/disable them",
     *            required=no,
     *            in="query",
     *            @OA\Schema(
     *                type="json",
     *                description="{"1":0,"2":0} where the keys is the communication id and the value 1 enable 0 disable"
     *            )
     *        ),
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
            'data' => $customer,
            'text' => __('Record updated successfully'),
            'status' => "success"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
