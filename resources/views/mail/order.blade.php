<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        Ciao {{ $_newOrder->customer_name }}!
    </h1>

    <p>
        Prepara la tavola! <br>
        Il tuo ordine di Deliveboo sta arrivando! <br>
        Ecco un riepilogo dei dati che hai inserito: <br>
        Nome e cognome: {{ $_newOrder->customer_name }} <br>
        Email: {{ $_newOrder->email }} <br>
        Telefono: {{ $_newOrder->phone }}
    </p>

    <br>

    <p>
        Il cibo da spedire a: <br>
        Indirizzo: {{ $_newOrder->address }} <br>
    </p>
</body>

</html>
