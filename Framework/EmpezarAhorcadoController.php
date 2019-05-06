<?php
include_once('Controller.php');

class EmpezarAhorcadoController implements Controller {
  
  public function get() {
    $_SESSION['palabra'] = $_GET['palabra'];
    $_SESSION['letras'] = array();

    $ahorcado = new Ahorcado($_GET['palabra'], 5);
    echo $ahorcado->mostrar();
    echo "<br>";
    echo "<a href='/index.php?path=jugar&letra=a'>a</a> - ";
    echo "<a href='/index.php?path=jugar&letra=b'>b</a> - ";
    echo "<a href='/index.php?path=jugar&letra=c'>c</a> - ";
    echo "<a href='/index.php?path=jugar&letra=d'>d</a> - ";
    echo "<a href='/index.php?path=jugar&letra=e'>e</a> - ";
    echo "<a href='/index.php?path=jugar&letra=f'>f</a> - ";
    echo "<a href='/index.php?path=jugar&letra=g'>g</a> - ";
    echo "<a href='/index.php?path=jugar&letra=h'>h</a> - ";
    echo "<a href='/index.php?path=jugar&letra=i'>i</a> - ";
    echo "<a href='/index.php?path=jugar&letra=j'>j</a> - ";
    echo "<a href='/index.php?path=jugar&letra=k'>k</a> - ";
    echo "<a href='/index.php?path=jugar&letra=l'>l</a> - ";
    echo "<a href='/index.php?path=jugar&letra=m'>m</a> - ";
    echo "<a href='/index.php?path=jugar&letra=n'>n</a> - ";
    echo "<a href='/index.php?path=jugar&letra=o'>o</a> - ";
    echo "<a href='/index.php?path=jugar&letra=p'>p</a> - ";
    echo "<a href='/index.php?path=jugar&letra=q'>q</a> - ";
    echo "<a href='/index.php?path=jugar&letra=r'>r</a> - ";
    echo "<a href='/index.php?path=jugar&letra=s'>s</a> - ";
    echo "<a href='/index.php?path=jugar&letra=t'>t</a> - ";
    echo "<a href='/index.php?path=jugar&letra=u'>u</a> - ";
    echo "<a href='/index.php?path=jugar&letra=v'>v</a> - ";
    echo "<a href='/index.php?path=jugar&letra=w'>w</a> - ";
    echo "<a href='/index.php?path=jugar&letra=x'>x</a> - ";
    echo "<a href='/index.php?path=jugar&letra=y'>y</a> - ";
    echo "<a href='/index.php?path=jugar&letra=z'>z</a> - ";
  }
  
  public function post() {

  }

}