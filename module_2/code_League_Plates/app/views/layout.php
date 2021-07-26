<html>
  <head>
    <title><?=$this->e($title)?></title>
  </head>
  <body>
      <nav>
          <ul>
              <li><a href="/">homepage</a></li>
              <li><a href="/about">about</a></li>
              <li><a href="/contacts">contacts</a></li>
          </ul>
      </nav>
    <?=$this->section('content')?>
  </body>
</html>