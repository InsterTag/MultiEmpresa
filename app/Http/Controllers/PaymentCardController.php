<?php

namespace App\Http\Controllers;

use App\Models\PaymentCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaymentCardController extends Controller
{
     use AuthorizesRequests;
    public function index()
    {
        $cards = Auth::user()->paymentCards()
            ->latest()
            ->get();

        return view('profiles.user.items.payments', compact('cards'));
    }

    /**
     * Store a newly created payment card.
     */
    public function store(Request $request)
{
    try {
        $validated = $this->validateCardData($request);
        
        // El modelo se encargará de la encriptación automáticamente
        PaymentCard::create([
            'user_id' => Auth::id(),
            'card_number' => $validated['card_number'],
            'holder_name' => $validated['holder_name'],
            'expiry' => $validated['expiry'],
            'cvv' => $validated['cvv'],
            'card_type' => $this->detectCardType($validated['card_number']),
            'balance' => $validated['balance'],
        ]);

        return back()->with('success', '💳 Tarjeta agregada correctamente');
    } catch (\Exception $e) {
        return back()->with('error', '❌ Error: ' . $e->getMessage())
                    ->withInput();
    }
}

    /**
     * Remove the specified payment card.
     */
    public function destroy(PaymentCard $card)
{
    // Verificación manual de autorización
    if ($card->user_id !== Auth::id()) {
        return back()->with('error', '⚠️ No tienes permisos para eliminar esta tarjeta');
    }
    
    try {
        $card->delete();
        
        return back()->with('success', '🗑️ Tarjeta eliminada correctamente');
    } catch (\Exception $e) {
        Log::error('Error deleting payment card: ' . $e->getMessage());
        
        return back()->with('error', '❌ Error al eliminar la tarjeta');
    }
}

    /**
     * Validate card data with custom rules.
     */
    protected function validateCardData(Request $request): array
{
    return $request->validate([
        'card_number' => [
            'required',
            'digits_between:13,19',
            Rule::unique('payment_cards')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            })
        ],
        'holder_name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
        'expiry' => [
            'required',
            'regex:/^(0[1-9]|1[0-2])\/([0-9]{2})$/',
            function ($attribute, $value, $fail) {
                if ($this->isCardExpired($value)) {
                    $fail('La tarjeta está expirada.');
                }
            }
        ],
        'cvv' => 'required|digits_between:3,4',
        'balance' => 'required|numeric|min:0|max:1000000'
        // NOTA: card_type NO se valida aquí porque se detecta automáticamente
    ], [
        'card_number.unique' => 'Esta tarjeta ya está registrada en tu cuenta.',
        'holder_name.regex' => 'El nombre del titular solo puede contener letras y espacios.',
        'balance.max' => 'El saldo no puede exceder $1,000,000.00'
    ]);
}

    /**
     * Create a new payment card with validated data.
     */
    protected function createPaymentCard(array $validatedData): PaymentCard
    {
        return PaymentCard::create([
            'user_id' => Auth::id(),
            'card_number' => $validatedData['card_number'],
            'holder_name' => $validatedData['holder_name'],
            'expiry' => $validatedData['expiry'],
            'cvv' => $validatedData['cvv'],
            'card_type' => $this->detectCardType($validatedData['card_number']),
            'balance' => $validatedData['balance'],
        ]);
    }

    /**
     * Detect card type based on number patterns.
     */
    protected function detectCardType(string $number): string
    {
        $number = preg_replace('/\D/', '', $number);
        
        $cardPatterns = [
            'Visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
            'MasterCard' => '/^5[1-5][0-9]{14}$/',
            'Amex' => '/^3[47][0-9]{13}$/',
            'Discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
        ];

        foreach ($cardPatterns as $type => $pattern) {
            if (preg_match($pattern, $number)) {
                return $type;
            }
        }

        return 'Otra';
    }

    /**
     * Check if card is expired.
     */
    protected function isCardExpired(string $expiry): bool
    {
        [$month, $year] = explode('/', $expiry);
        
        $expiryDate = \Carbon\Carbon::createFromDate(2000 + $year, $month, 1)
            ->endOfMonth();
            
        return $expiryDate->isPast();
    }
}