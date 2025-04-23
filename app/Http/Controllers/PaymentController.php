<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\User;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success') . '?article_id=' . $request->article_id,
                'cancelUrl' => url('error')
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ]);

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $arr = $response->getData();

                // Salvataggio del pagamento nel database
                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->user_id = auth()->user()->id; //Serve per prendere l'utente in sessione ed "Agganciarlo" al database
                $payment->save();
                // Ottieni l'ID dell'articolo dal parametro 'article_id'. Funzione in sviluppo (manca il model e la migration)
                $articleId = $request->input('article_id');
                

                // Correzione: passare 'article' come parametro nella rotta
                return redirect()
                    ->route('article.show', ['article' => $articleId])  // Corretto il parametro qui
                    ->with('success', 'Pagamento effettuato con successo!');
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Pagamento rifiutato!';
        }
    }

    public function error()
    {
        return 'L\'utente ha rifiutato il pagamento!';
    }

    public function paymentIndex()
    {
        $payments= Payment::where('user_id', auth()->id())->get();
        return view("payment.indexPayment", compact('payments'));
    }
}

