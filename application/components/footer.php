<style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        .footer {
            flex-shrink: 0;
        }

       .foooter {
            padding: 25px;
       }
</style>


<body class="d-flex flex-column h-100">
    <footer class="footer mt-auto bg-dark text-light py-4">
        <div class="foooter">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-title">
                        <h2 class="footer-text mb-0">
                            <a href="<?php echo base_url(); ?>" class="text-light" style="text-decoration: none;">Ecommerce</a>
                        </h2>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="footer-copyright-text">
                        <p class="mb-0 text-light">&copy; All Rights Reserved Lens Cam Enterprise</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
</body>