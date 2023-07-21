<h1>Ciao Amministratore</h1>
<p>
    Hai ricevuto una richiesta di contattato sul tuo sito, ecco i dettagli:<br>
    Nome: {{ $contactData["name"] }}<br>
    Indirizzo mail: {{ $contactData["email"] }}<br>
    Messaggio: {{ $contactData["message"] }}<br>
</p>

<style>
h1, p {
    font-family: sans-serif;
}
</style>