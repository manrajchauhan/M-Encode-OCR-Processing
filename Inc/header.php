<div data-animation="default" class="navbar w-nav" data-easing2="ease" data-easing="ease" data-collapse="medium" data-w-id="479e09bf-2712-51a4-b256-2a7a8ae86fea" role="banner" data-duration="400" data-doc-height="1">
                <div class="page-padding">
                    <div class="container-large navbar-container">
                        <a href="index.php">
                       <img src="inc/Encode.png" alt="logo" aria-current="page" class="logo w-nav-brand w--current">
                        </a>
                        <nav role="navigation" class="nav-menu w-nav-menu">
                            <a href="about.php" class="nav-link w-nav-link">About us</a>
                            <a href="docs.php" class="nav-link w-nav-link">Documentation</a>
                            <?php if (strlen($_SESSION['m-encode']==0)) {?>
                                <a href="Test.php" class="nav-link w-nav-link">Test</a>
                            <a href="sign-up.php" class="nav-link w-nav-link btn-dark ">Sign Up</a>
                            <a href="login.php" class="ml-3"><button type="button" class="btn btn-dark ">Sign In
                                </button>
                            </a>
                            </li><?php }?>
          <?php 
if (isset($_SESSION['m-encode']))
          {?>
                            <a href="History.php" class="nav-link w-nav-link btn-dark ">History</a>
                            <a href="logout.php" class="ml-3"><button type="button" class="btn btn-dark ">Log Out
                                </button>
                            </a>
                            <div style="margin-left: 15px;">
                            </div>
                            <?php }?>
                        </div>
                        </nav>
                        <div class="menu-button w-nav-button">
                            <div class="w-icon-nav-menu"></div>
                        </div>
                    </div>
                </div>
            </div>