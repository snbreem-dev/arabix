<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class TransactionController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        /*
         * Change the active menu at the interface
         */
        parent::$data['activeMenu'] = 'transactions';
    }

    /**
     * * @OA\Get(
     *      path="/dashboard/transactions",
     *      operationId="View transactions",
     *      tags={"Transactions"},
     *      summary="Get transactions",
     *      description="Get transactions",
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
        parent::$data['transactions'] = Transaction::paginate(15);
        return view('transactions.index', parent::$data);
    }

    /**
     * * @OA\Get(
     *      path="dashboard/transactions/transactionId",
     *      operationId="view transaction info edit page",
     *      tags={"Translation"},
     *      summary="View translation",
     *      description="View translation",
     *      @OA\Parameter(
     *          name="transactionId",
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
    public function show(Transaction $transaction)
    {

        /*
         * Check if the current transaction customer stored in Redis to fetch them from Redis to reduce mysql lookup
         */
        if (!Redis::get('user:' . $transaction->customer_id . ':transactions')) {
            Redis::set('user:' . $transaction->customer_id . ':transactions', json_encode($transaction->customer->transactions));
        }

        /*
         * used to get the language code the view using the currency id
         */
        parent::$data['currencies'] = Currency::pluck('code', 'id');

        parent::$data['transaction'] = $transaction;

        /*
         * Get the other user transactions from the redis to reduce mysql lookup
         */
        parent::$data['customer_transactions'] = Redis::get('user:' . $transaction->customer_id . ':transactions');

        return view('transactions.view', parent::$data);
    }

    /**
     * * @OA\Delete(
     *      path="dashboard/transactions/{transactionId}",
     *      operationId="delete transaction",
     *      tags={"Transactions"},
     *      summary="Delete transaction",
     *      description="Delete transaction",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="transaction id to be deleted",
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
     * @param Transaction $transaction
     * @return json
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return array(
            'text' => __('Record deleted successfully'),
            'status' => "success"
        );
    }
}
