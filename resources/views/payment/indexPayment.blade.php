<x-layout title="Payment Index">

<h1>Sei nella pagina dei pagamenti</h1>

<div class="container py-4">

    {{-- ✅ VERSIONE MOBILE – Card --}}
    <div class="row d-md-none">
        @forelse ($payments as $payment)
            <div class="col-12 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pagamento #{{ $payment->id }}</h5>
                        <p class="mb-1"><strong>Email PayPal:</strong> {{ $payment->payer_email }}</p>
                        <p class="mb-1"><strong>Importo:</strong> {{ $payment->amount }} {{ $payment->currency }}</p>
                        <p class="mb-0"><strong>Data Transazione:</strong> {{ $payment->created_at }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Nessun pagamento trovato.</div>
            </div>
        @endforelse
    </div>

    {{-- ✅ VERSIONE DESKTOP/TABLET – Tabella --}}
    <div class="table-responsive d-none d-md-block">
        <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Email PayPal</th>
                    <th>Importo</th>
                    <th>Data Transazione</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->payer_email }}</td>
                        <td>{{ $payment->amount }} {{ $payment->currency }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nessun pagamento trovato.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>




</x-layout>
<x-footer />