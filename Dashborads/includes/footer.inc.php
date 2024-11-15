</div>
<!-- Content End -->

    

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/chart/chart.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="sweetalert2.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
</body>

</html>

<!--  Function to update live time -->
<script>
    function updateLiveTime() {
        const liveTimeElement = document.getElementById('liveTime');
        const currentTime = new Date();
        const hours = currentTime.getHours();
        const minutes = currentTime.getMinutes();
        const seconds = currentTime.getSeconds();
        liveTimeElement.textContent = 'Live time: ' + hours + ':' + minutes + ':' + seconds;
    }

    // Update live time every second
    setInterval(updateLiveTime, 1000);

    // Initial call to update live time
    updateLiveTime();

    function LiveTime() {
        const liveTimeElement = document.getElementById('liveTime1');
        const currentTime = new Date();
        const hours = currentTime.getHours();
        const minutes = currentTime.getMinutes();
        const seconds = currentTime.getSeconds();
        liveTimeElement.textContent = 'Live time: ' + hours + ':' + minutes + ':' + seconds;
    }

    // Update live time every second
    setInterval(LiveTime, 1000);

    // Initial call to update live time
    LiveTime();
</script>

