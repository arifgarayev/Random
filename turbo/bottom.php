<p></p>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark footer">
      <div class="container">
        <p class="m-0 text-center text-white">&copy; Turbo Cars 2022</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
$('#foto').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#foto')[0].files[0].name;
  $(this).prev('label').text(file);
});
</script>
  </body>

</html>