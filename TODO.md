
  # Validazine TASK-1
  - [ ] completare la validazione del **User**
      - [ ] lastName
      - [ ] email 
      - [ ] valore predefinito per la data   
  
  # Model TASK-2
  - [ ] Finire il Model
    - a.[x] **UserModel::readAll()** (elenco di tutti gli utenti)
    $result = $stm->fetchAll(PDO::FETCH_CLASS,User::class); // UserFactory
      NOTA: 
    - [ ] **User::delete($user_id)** (cancellazione di un utente)
    - [ ] **UserModel::readOne($user_id)** (dati di un solo utente) 
    - [ ] **User::update(User $user)**update (modifica)

 # Pagina con elenco utenti TASK-3
  PAGINE (controller)
  - a.[x] Elenco degli utenti **list_user.php**
  
  
  
  
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