<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>

<?php



?>
<div class="container">

<table class="table">
    <tr>
        <th>id</th>
        <th>nome</th>
        <th>cognome</th>
        <th>action</th>
    </tr>

    <?php foreach($users as $user){ ?>
        <tr>
        <td><?= $user->getUserId() ?></td>
        <td><?= $user->getFirstName() ?></td>
        <td><?php echo $user->getLastName() ?></td>
        <td>
            <a href="#" class="btn btn-secondary">edit </a>
            <a href="delete_user.php?user_id=<?= $user->getUserId() ?>" class="btn btn-danger">delete </a>
        </td>
    </tr>
    <?php } ?>
   

</table>


</div>