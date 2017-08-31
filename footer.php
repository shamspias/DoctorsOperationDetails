  <footer class="page-footer blue-grey darken-2">
    <div class="container hide-on-small-only">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">National Institute of ENT</h5>
          <p class="grey-text text-lighten-4"></p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">&copy; 2017
      <a class="grey-text text-lighten-4 right" href="http://pias.me">Developed by Shamsuddin Ahmed Pias</a>
      <a class="" href="http://alamin.me/" style="display: none;">Al-Amin Firdows(ALU)</a>
      </div>
    </div>
  </footer>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('select').material_select();
      $(".button-collapse").sideNav();
      $('.modal-trigger').leanModal();
      $('#push,secton').pushpin({ top:$('#push').height() });
      $(".button-collapse").sideNav();
    });

    $('.datepicker').pickadate({
      selectMonths: true, 
      selectYears: 15 
    });
  </script>

</body>
</html>