
  # Validazine
  - [ ] completare la validazione del **User**
      - [ ] lastName
      - [ ] email 
      - [ ] valore predefinito per la data   
  
  # Model
  - [ ] Finire il Model
    - [ ] update (modifica)
    - [ ] readAll (elenco di tutti gli utenti)
    - [ ] readOne (dati di un solo utente) 
    - [ ] delete (cancellazione di un utente)

 # Pagina con elenco utenti
  PAGINE (controller)
  - Elenco degli utenti **list_user.php**
  
  
  
  
  --------------------------------------------------
  
  qualcuno a premuto aggiungi
     - [ ] creo un istanza User
     - [ ] Effettuo la validazione è sanificazione dei valori dell'istanza di User
     - [ ] se tutto è ok salvo l'utente --> si va a una pagina di conferma
                 [ ] Istanza del model uso il metodo create 
     - [ ] se non è tutto ok rimango sul form e segnalo gli errori

     per ogni errore / campo
     *firstName "Mario" *lastName vuoto
     rimango nel form
     *firstName "MArio" *lasName 
      Risultato della validazione
                           - messaggio "campo obbligatorio"
      isValid = true       - isValid = false 
                           - code
      valore 
      ''
      "Mario"              - ''