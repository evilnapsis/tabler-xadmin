<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>.: TABLER XADMIN - Evilnapsis :.</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1759774806" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1759774806" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/bootstrap-icons/bootstrap-icons.css">
    <script src="assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
    <script src="assets/datatables/datatables.min.js"></script>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
        font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body>
    <script src="./dist/js/tabler-theme.min.js?1759774806"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="./">
              TABLER XADMIN
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <i class="bi bi-moon" style="font-size: 1.25rem;"></i>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                <i class="bi bi-sun" style="font-size: 1.25rem;"></i>
              </a>
            </div>
            <?php if(isset($_SESSION["user_id"]) && Core::$user!=null): ?>
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show app menu" data-bs-auto-close="outside" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                  <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                  <path d="M14 7l6 0" />
                  <path d="M17 4l0 6" />
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">My Apps</h3>
                  </div>
                  <div class="card-body scroll-y p-2" style="max-height: 50vh; width: 300px;">
                    <div class="row g-0">
                      <div class="col-6">
                        <a href="./?view=persons&opt=all" class="d-flex flex-column flex-center text-center text-secondary py-3 px-2 link-hoverable">
                          <i class="bi bi-people text-primary mb-2" style="font-size: 2rem;"></i>
                          <span class="h5">Contactos</span>
                        </a>
                      </div>
                      <div class="col-6">
                        <a href="./?view=categories&opt=all" class="d-flex flex-column flex-center text-center text-secondary py-3 px-2 link-hoverable">
                          <i class="bi bi-tags text-success mb-2" style="font-size: 2rem;"></i>
                          <span class="h5">Categorías</span>
                        </a>
                      </div>
                      <div class="col-6">
                        <a href="./?view=spends&opt=all" class="d-flex flex-column flex-center text-center text-secondary py-3 px-2 link-hoverable">
                          <i class="bi bi-wallet text-info mb-2" style="font-size: 2rem;"></i>
                          <span class="h5">Gastos</span>
                        </a>
                      </div>
                      <div class="col-6">
                        <a href="./?view=users&opt=all" class="d-flex flex-column flex-center text-center text-secondary py-3 px-2 link-hoverable">
                          <i class="bi bi-person-badge text-danger mb-2" style="font-size: 2rem;"></i>
                          <span class="h5">Usuarios</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $u = Core::$user; ?>
            <div class="nav-item dropdown ps-3">
              <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
                <span class="avatar avatar-sm bg-primary text-white">
                  <i class="bi bi-person ms-1"></i>
                </span>
                <div class="d-none d-xl-block ps-2">
                  <div><?php echo htmlspecialchars($u->name." ".$u->lastname); ?></div>
                  <div class="mt-1 small text-muted">
                    <?php if($u->kind==1){ echo "Administrador"; }else{ echo "Usuario"; } ?>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="./?view=settings&opt=all" class="dropdown-item">Configuración</a>
                <div class="dropdown-divider"></div>
                <a href="./?action=access&opt=logout" class="dropdown-item text-danger">Salir</a>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </header>
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="./" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-house"></i>
                    </span>
                    <span class="nav-link-title">Inicio</span>
                  </a>
                </li>
                <?php if(!isset($_SESSION["user_id"])):?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-grid"></i>
                    </span>
                    <span class="nav-link-title">Mas</span>
                  </a>
                  <div class="dropdown-menu">
<!--                    <a class="dropdown-item" href="./?view=register" >Registro</a> -->
                    <a class="dropdown-item" href="./?view=login" >Login</a>
                    <a class="dropdown-item" href="./?view=help" >Ayuda</a>
                  </div>
                </li>
                <?php endif; ?>
                <?php if(isset($_SESSION["user_id"])):?>
                <li class="nav-item">
                  <a class="nav-link" href="./?view=home" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-speedometer2"></i>
                    </span>
                    <span class="nav-link-title">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-contacts" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                       <i class="bi bi-people"></i>
                    </span>
                    <span class="nav-link-title">Contactos</span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="./?view=persons&opt=all" >Contactos</a>
                    <a class="dropdown-item" href="./?view=personsmod&opt=all" >Contactos (v2)</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./?view=categories&opt=all" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-tags"></i>
                    </span>
                    <span class="nav-link-title">Categorías</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./?view=spends&opt=all" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-wallet"></i>
                    </span>
                    <span class="nav-link-title">Gastos</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./?view=users&opt=all" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <i class="bi bi-person-badge"></i>
                    </span>
                    <span class="nav-link-title">Usuarios</span>
                  </a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </header>
      
      <div class="page-wrapper">
        <!-- Page body -->
        <?php View::load("index"); ?>
        
        <!-- Footer -->
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Powered by <a href="http://evilnapsis.com/" target="_blank" class="link-secondary">Evilnapsis</a> &copy; 2026
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    <!-- Scripts -->
    <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1759774806" defer></script>
    <script src="./dist/js/tabler.min.js?1759774806" defer></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable();
      });
    </script>
  </body>
</html>
