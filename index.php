<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pakote</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">PK<i class="fa-solid fa-box-open"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<!-- FUNCIONÁRIOS -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Funcionários</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-funcionario">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-funcionario">Listar</a></li>
            </ul>
          </li>
<!-- REMETENTES -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Remetentes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-remetente">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-remetente">Listar</a></li>
            </ul>
          </li>
<!-- DESTINATÁRIOS -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Destinatários</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-destinatario">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-destinatario">Listar</a></li>
            </ul>
          </li>
<!-- SERVIÇOS -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Serviços</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-servico">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-servico">Listar</a></li>
            </ul>
          </li>
<!-- ENCOMENDAS -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Encomendas</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="?page=cadastrar-encomenda">Cadastrar</a></li>
              <li><a class="dropdown-item" href="?page=listar-encomenda">Listar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <nav>
    <div class="conteiner mb-3">
      <div class="row">
        <div class="col">
          <?php 
          include('config.php');
          switch (@$_REQUEST['page']) {
// FUNCIONÁRIOS
            case 'cadastrar-funcionario':
              include('cadastrar-funcionario.php');
              break;
            case 'listar-funcionario':
              include('listar-funcionario.php');
              break;
            case 'editar-funcionario':
              include('editar-funcionario.php');
              break;
            case 'salvar-funcionario':
              include('salvar-funcionario.php');
              break;
// REMETENTES
            case 'cadastrar-remetente':
              include('cadastrar-remetente.php');
              break;
            case 'listar-remetente':
              include('listar-remetente.php');
              break;
            case 'editar-remetente':
              include('editar-remetente.php');
              break;
            case 'salvar-remetente':
              include('salvar-remetente.php');
              break;
// DESTINATÁRIOS
            case 'cadastrar-destinatario':
              include('cadastrar-destinatario.php');
              break;
            case 'listar-destinatario':
              include('listar-destinatario.php');
              break;
            case 'editar-destinatario':
              include('editar-destinatario.php');
              break;
            case 'salvar-destinatario':
              include('salvar-destinatario.php');
              break;
// SERVIÇOS
            case 'cadastrar-servico':
                include('cadastrar-servico.php');
                break;
              case 'listar-servico':
                include('listar-servico.php');
                break;
              case 'editar-servico':
                include('editar-servico.php');
                break;
              case 'salvar-servico':
                include('salvar-servico.php');
                break;
// ENCOMENDAS
              case 'cadastrar-encomenda':
                include('cadastrar-encomenda.php');
                break;
              case 'listar-encomenda':
                include('listar-encomenda.php');
                break;
              case 'editar-encomenda':
                include('editar-encomenda.php');
                break;
              case 'salvar-encomenda':
                include('salvar-encomenda.php');
                break;
              
              default:
              echo '<div class="container mb-3">
                  <div class="row justify-content-center">
                      <div class="col-12 col-md-8 text-center">
                          <h1 class="display-4 fw-bold">Seja bem vindo ao sistema da <br><i class="fa-solid fa-boxes-stacked"></i> Pakote <i class="fa-solid fa-boxes-stacked"></i></h1>
                      </div></div></div>';
              break;
          }
           ?>
        </div>
      </div>
    </div>
  </nav>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>