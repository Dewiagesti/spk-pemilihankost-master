<nav class="site-nav">
    <div class="container">
      <div class="site-navigation">
        <a href="index.html" class="logo m-0">Homespace <span class="text-primary">.</span></a>

        <ul class="js-clone-nav d-none d-lg-inline-block text-left float-right site-menu">
          <li class="active"><a href="/">Home</a></li>
          <li class="has-children">
            <a href="#">Dropdown</a>
            <ul class="dropdown">
              <li><a href="elements.html">Elements</a></li>
              <li class="has-children">
                <a href="#">Menu Two</a>
                <ul class="dropdown">
                  <li><a href="#">Sub Menu One</a></li>
                  <li><a href="#">Sub Menu Two</a></li>
                  <li><a href="#">Sub Menu Three</a></li>
                </ul>
              </li>
              <li><a href="#">Menu Three</a></li>
            </ul>
          </li>
          <li><a href="{{ route('recomendation') }}">Rekomendasi</a></li>
          <li><a href="rent.html">Rent</a></li>
          <li><a href="{{ route('about') }}">About</a></li>
          <li><a href="contact.html">Contact Us</a></li>

          <li><a href="signup.html">Sign up</a></li> 
          <li class="cta-button active"><a href="login.html">Login</a></li>

        </ul>

        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>

      </div>
    </div>
  </nav>