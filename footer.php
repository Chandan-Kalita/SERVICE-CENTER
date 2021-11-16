
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.facebook.com/chandan.kalita.16121" target="_blank">Chandan</a>. All rights reserved.</span>
  </div>
</footer>
<!-- Custom Script -->
<script>
  //Adding (....) after a specific length of title and description
  const problem = document.querySelectorAll("td.problem");
    const problem_length = 30;
    problem.forEach((e) => {
        if (e.innerHTML.length > problem_length) {
            e.innerText = `${e.innerText.substr(0, problem_length)}...`;
        }
    })
    //Adding (,) traditionally
    const distance_traveled = document.querySelectorAll(".distance_traveled");
    distance_traveled.forEach((e) => {
        n = e.innerHTML; //storing the string value of s_from
        x = Number(n); // converting the s_from string to Int
        e.innerHTML = x.toLocaleString('en-IN');

    })
</script>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="assets/js/vendor.bundle.base.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.min.js"></script>
<script src="assets/js/hoverable-collapse.min.js"></script>
<script src="assets/js/template.min.js"></script>
<script src="assets/js/settings.min.js"></script>
<script src="assets/js/todolist.min.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/js/dashboard.min.js"></script>
<script src="assets/js/data-table.min.js"></script>
<!-- End custom js for this page-->
</body>

</html>
