<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/mainpage.css">
<script src="scripts/mainPage.js"></script>
<meta charset="utf-8">
<title>Title of the document</title>
</head>

<body>
<!-- Pictre on the up sight of header -->
<div class="header">
  <h1>OBSIMO, or whatever you may want to read here</h1>
</div>
<!-- Menu on the downside of header -->
<div class="headerMenu"></div>
<!-- Menu/navigation bar on the left -->
<div class="leftmenu">
    <span class="menuHeading">Home</span>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
    <span class="menuHeading">Opiskelija</span>
    <p>
    <a href>Opiskelusuunnitelma</a> <br/>
    <a href>Suositut polut</a>
    </p>
    <span class="menuHeading">Henkilökunta</span>
    <p>
    <a href>Opiskelusuunnitelma</a> <br/>
    <a href>Suositut polut</a>
    </p>
    <span class="menuHeading">Yritysten Edustajat</span>
    <p>
    <a href>Opiskelusuunnitelma</a> <br/>
    <a href>Suositut polut</a>
    </p>
    <span class="menuHeading">Jotain muuta ;)</span>
    <p>
    <a href>Opiskelusuunnitelma</a> <br/>
    <a href>Suositut polut</a>
    </p>

</div>

<div id="id01" class="modal">

  <form class="modal-content animate" action="/action_page.php">

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!-- Content in the middle of the web page -->
<div class="content">

<h1>Maybe here will be text later XD</h1>
<p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fermentum sapien nec finibus dictum. Vivamus odio augue, aliquam et risus eu, tincidunt laoreet risus. Nam pharetra, felis in interdum malesuada, ante nunc mattis justo, nec rutrum eros velit at urna. Nullam ac magna scelerisque, dapibus lorem id, porta dui. Donec a tempor nulla. Nam vel sodales ipsum. Cras mattis magna nec erat egestas, in luctus erat interdum. Pellentesque eget faucibus ante. Proin sed arcu commodo, ultricies lectus sit amet, mattis ante.
</p>

<p>
Aliquam blandit molestie neque, eu lacinia ex ultricies eu. Quisque et velit et metus commodo sollicitudin. Nam arcu tortor, blandit vitae nibh at, accumsan efficitur enim. Mauris luctus faucibus diam quis sagittis. Proin in bibendum quam, quis varius turpis. Pellentesque erat nisl, efficitur ac augue quis, bibendum consectetur elit. Donec vitae velit suscipit, mollis metus eget, pharetra arcu. Suspendisse purus libero, scelerisque id leo a, pulvinar commodo urna. Aenean dignissim sapien eget magna rhoncus vulputate. Donec lobortis pharetra leo at pellentesque. Pellentesque sit amet facilisis magna. Fusce volutpat tellus tristique ipsum semper, pulvinar sodales orci egestas. Quisque eu erat dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
</p>
<p>
Vestibulum blandit nunc metus, sed tincidunt augue posuere sit amet. Etiam mollis ipsum quis augue vehicula congue nec vitae nisl. Aenean aliquam mauris libero, a faucibus sem tincidunt et. Nunc at ante feugiat, tincidunt justo at, ultricies diam. Suspendisse lorem erat, ornare nec justo quis, gravida eleifend augue. Aenean at auctor felis. Interdum et malesuada fames ac ante ipsum primis in faucibus.
</p>
<p>
Phasellus vitae feugiat sapien. Pellentesque volutpat ornare risus, sit amet luctus mauris semper non. Proin fringilla ipsum risus, mattis convallis urna placerat a. In massa magna, posuere congue lacus sed, placerat vulputate tortor. Praesent dignissim pulvinar enim vel lobortis. Duis vestibulum in lacus non semper. Morbi et odio ultricies, faucibus ex in, rhoncus ex. Morbi fringilla augue elementum accumsan ultricies. Aenean placerat bibendum urna ut volutpat. Donec efficitur, mauris in vestibulum efficitur, purus diam feugiat quam, quis faucibus dolor massa eget velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lobortis dapibus sapien, et facilisis erat mollis vel. Vivamus tincidunt arcu non sapien pretium, eu iaculis eros vehicula. Duis at blandit enim, nec aliquam massa.
</p>
<p>
Aliquam erat volutpat. In tellus est, vestibulum non pretium et, faucibus id lorem. Nullam ut arcu a purus blandit bibendum. Aenean nisl turpis, maximus eu quam vel, tempor pretium dui. Morbi cursus ante vel rhoncus convallis. Donec tempus justo porta tellus accumsan hendrerit. Mauris malesuada augue in velit tincidunt ultricies. Duis scelerisque arcu et orci semper porta. Sed tristique nisl dolor, vitae venenatis elit luctus in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam laoreet lorem nisl, non faucibus ligula congue rhoncus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
</p>
</div>
<div class="footer">
  <p>
    Blablabla, some stuff, nobody ever reads this.
  </p>
</div>
</body>

</html>
