<x-mail::message>
    # Ciao {{$owner_name}}
    Nuovo ordine aggiunto nel DB

    Nome: {{ $order['customer_name'] }}
    Email: {{ $order['email'] }}
    Numero: {{ $order['phone'] }}
    Via: {{ $order['address'] }}
    Totale: {{ $order['price'] }} €
</x-mail::message>
