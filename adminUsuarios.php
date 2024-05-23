<?php
session_start();
include_once('config.php');
if ((!isset($_SESSION['senhaadm']) == true)) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: adminlogin.php');
  exit;
}

$sql = 'SELECT * FROM  usuarios;';
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-flow: column;
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <a href="adminMensagens.php">Ver mensagens dos usuarios</a>
  <div>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nome</th>
          <th scope="col">email</th>
          <th scope="col">senha</th>
          <th scope="col">Criação da conta</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($rows = $result->fetch_assoc()) { ?>
          <tr>
            <th scope="row"><?php echo $rows['id'] ?></th>
            <td><?php echo $rows['nome'] ?></td>
            <td><?php echo $rows['email'] ?></td>
            <td><?php echo $rows['senha'] ?></td>
            <td><?php echo $rows['data'] . ' às ' . $rows['hora']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>