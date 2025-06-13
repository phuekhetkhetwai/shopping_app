<footer>
        <div class="container-fluid">
            <div class="row">
                <div class="fixed-bottom col-lg-10 col-md-9 ms-auto" style="z-index: -1;">
                    <div class="row border-top pt-3">
                        <div class="col-md-6 text-center">
                            <ul class="list-inline">
                                <li class="list-inline-item me-2">
                                    <a href="javascript:void(0);">Example Technology Co.,Ltd</a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="javascript:void(0);">About</a>
                                </li>
                                <li class="list-inline-item me-2">
                                    <a href="javascript:void(0);">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-center">
                            <p>&copy; 2025 Copyright. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- bootstrap css1 js1 -->
    <script src="dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const getsidebars = document.querySelectorAll(".sidebarlinks");
            const currentPath = window.location.pathname;
            
            getsidebars.forEach(sidebar => {
                const sidebarHref = sidebar.getAttribute("href");
                if (currentPath.includes(sidebarHref)) {
                    sidebar.classList.add("currents");
                } else {
                    sidebar.classList.remove("currents");
                }
            });
        </script>

    <!-- custom js -->
</body>

</html>