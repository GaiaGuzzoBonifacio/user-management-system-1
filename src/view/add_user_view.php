
    <?php include './src/view/head.php' ?> 
    <?php include './src/view/header.php' ?>
    
    <div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input value="<?= $firstName ?>" 
                      class="form-control <?= $firstNameClass ?>"  
                      name="firstName"  
                      type="text">

               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>

            <div class="form-group">
               <label for="">Cognome</label>
               <!-- is-invalid  -->
               <input
                value="<?= $lastName ?>" 
                class="form-control <?= $lastNameClass ?>"  
                name="lastName"  
                type="text">
               <div class="<?= $lastNameClassMessage ?>">
                  <?= $lastNameMessage ?>
               </div> 
            </div>


            <div class="form-group">
               <label for="">email</label>
               <!-- is-invalid  -->
               <input
                value="<?= $email ?>" 
                class="form-control <?= $emailClass ?>"  
                name="email"  
                type="text">
               <div class="<?= $emailClassMessage ?>">
                  <?= $emailMessage ?>
               </div> 
            </div>


             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control <?= $birthdayClass ?>" value="<?= $birthday ?>" name="birthday" type="date">
                <div class="<?= $birthdayClassMessage ?>">
                  <?= $birthdayMessage ?>
               </div> 
             </div>
             <?php if(isset($userid)) { ?>

               <div class="form-group mt-4 p-4 border border-danger">
               <label for="">
                  Questo campo è visibile per spiegare il sistema <br> 
                  serve a inviare via post, <b>User::userId</b> da aggiornare.
               </label>
               <input type="text" class="form-control">
             </div>

             <?php } ?>
             
             <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
    
</body>
</html>